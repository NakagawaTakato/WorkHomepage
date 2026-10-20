<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

/**
 * Outlook(Microsoft Graph)でメールを送るための OAuth トークンを管理する
 *
 * トークンは storage/app/microsoft-oauth.json に暗号化して保存する(Git の管理対象外)
 */
class MicrosoftOAuth
{
    public const SCOPE = 'offline_access https://graph.microsoft.com/Mail.Send';

    private const TOKEN_FILE = 'microsoft-oauth.json';

    /**
     * サインイン用のコードを発行する(デバイス コード フロー)
     */
    public function requestDeviceCode(): array
    {
        $response = Http::asForm()->post($this->url('devicecode'), [
            'client_id' => $this->clientId(),
            'scope' => self::SCOPE,
        ]);

        if ($response->failed()) {
            throw new RuntimeException('サインイン用のコードを発行できませんでした。(' . $response->json('error_description', $response->body()) . ')');
        }

        return $response->json();
    }

    /**
     * ブラウザでのサインインが終わるまで待ち、トークンを保存する
     */
    public function waitForDeviceLogin(array $deviceCode): void
    {
        $interval = (int) ($deviceCode['interval'] ?? 5);
        $deadline = time() + (int) $deviceCode['expires_in'];

        while (time() < $deadline) {
            sleep($interval);

            $response = Http::asForm()->post($this->url('token'), [
                'client_id' => $this->clientId(),
                'grant_type' => 'urn:ietf:params:oauth:grant-type:device_code',
                'device_code' => $deviceCode['device_code'],
            ]);

            if ($response->successful()) {
                $this->store($response->json());

                return;
            }

            $error = $response->json('error');

            if ($error === 'authorization_pending') {
                continue;
            }

            if ($error === 'slow_down') {
                $interval += 5;

                continue;
            }

            throw new RuntimeException('サインインできませんでした。(' . $response->json('error_description', $response->body()) . ')');
        }

        throw new RuntimeException('サインインの有効期限が切れました。もう一度やり直してください。');
    }

    /**
     * 「php artisan mail:outlook-login」でサインイン済みかどうか
     */
    public function signedIn(): bool
    {
        return Storage::disk('local')->exists(self::TOKEN_FILE);
    }

    /**
     * 有効なアクセストークンを返す(期限切れなら更新する)
     */
    public function accessToken(): string
    {
        $token = $this->load();

        if ($token['expires_at'] - 60 > time()) {
            return $token['access_token'];
        }

        return $this->refresh()['access_token'];
    }

    /**
     * リフレッシュトークンを使って、トークンを更新する
     */
    public function refresh(): array
    {
        $token = $this->load();

        $response = Http::asForm()->post($this->url('token'), [
            'client_id' => $this->clientId(),
            'grant_type' => 'refresh_token',
            'refresh_token' => $token['refresh_token'],
            'scope' => self::SCOPE,
        ]);

        if ($response->failed()) {
            throw new RuntimeException('Outlookの認証を更新できませんでした。「php artisan mail:outlook-login」でサインインし直してください。(' . $response->json('error_description', $response->body()) . ')');
        }

        // 新しいリフレッシュトークンが返ってこなかったときは、今のものを使い続ける
        return $this->store($response->json() + ['refresh_token' => $token['refresh_token']]);
    }

    private function store(array $response): array
    {
        $token = [
            'access_token' => $response['access_token'],
            'refresh_token' => $response['refresh_token'],
            'expires_at' => time() + (int) $response['expires_in'],
        ];

        Storage::disk('local')->put(self::TOKEN_FILE, Crypt::encryptString(json_encode($token)));

        return $token;
    }

    private function load(): array
    {
        if (! $this->signedIn()) {
            throw new RuntimeException('Outlookにまだサインインしていません。「php artisan mail:outlook-login」を実行してください。');
        }

        return json_decode(Crypt::decryptString(Storage::disk('local')->get(self::TOKEN_FILE)), true);
    }

    private function clientId(): string
    {
        $clientId = config('services.microsoft.client_id');

        if (! $clientId) {
            throw new RuntimeException('.env の MICROSOFT_CLIENT_ID が設定されていません。');
        }

        return $clientId;
    }

    private function url(string $endpoint): string
    {
        return 'https://login.microsoftonline.com/' . config('services.microsoft.tenant') . '/oauth2/v2.0/' . $endpoint;
    }
}
