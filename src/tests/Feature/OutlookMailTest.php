<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Setting;
use App\Services\MicrosoftOAuth;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

/**
 * 本物のOutlook(Microsoft Graph API)に接続して確かめるテスト
 *
 * 実行するたびに、管理画面で設定した送信先へ本物のメールが1通届く。
 * 「php artisan mail:outlook-login」でサインインするまではスキップする。
 */
class OutlookMailTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        if (! app(MicrosoftOAuth::class)->signedIn()) {
            $this->markTestSkipped('Outlookにまだサインインしていないため、スキップしました。「php artisan mail:outlook-login」を実行してください。');
        }
    }

    public function test_本物のOutlookの認証を更新できる()
    {
        $token = app(MicrosoftOAuth::class)->refresh();

        $this->assertNotEmpty($token['access_token']);
    }

    public function test_本物のOutlookからお問い合わせの送信先にメールが届く()
    {
        $contact = new Contact([
            'consultations' => ['laravel'],
            'name' => '自動テスト',
            'email' => config('mail.from.address'),
            'tel' => '09000000000',
            'prefecture' => '東京都',
            'age' => null,
            'initial_payment' => 'hand',
            'monthly_payment' => 'none',
        ]);
        $contact->created_at = now();

        // 送信に失敗すると例外が出て、このテストは失敗する。届いたかどうかは受信箱で確認する
        Mail::mailer('microsoft-graph')
            ->to(Setting::values()['contact_mail_to'])
            ->send(new ContactMail($contact));

        $this->addToAssertionCount(1);
    }
}
