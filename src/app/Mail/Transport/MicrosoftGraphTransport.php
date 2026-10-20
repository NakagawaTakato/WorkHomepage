<?php

namespace App\Mail\Transport;

use App\Services\MicrosoftOAuth;
use Illuminate\Mail\Transport\Transport;
use Illuminate\Support\Facades\Http;
use RuntimeException;
use Swift_Mime_SimpleMessage;
use Swift_TransportException;

/**
 * Outlook(Microsoft Graph API)を通してメールを送る
 *
 * Outlook.com は SMTP のパスワード認証を廃止しているため、OAuth で認証して Graph API から送る
 */
class MicrosoftGraphTransport extends Transport
{
    private $oauth;

    public function __construct(MicrosoftOAuth $oauth)
    {
        $this->oauth = $oauth;
    }

    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
    {
        $this->beforeSendPerformed($message);

        try {
            $accessToken = $this->oauth->accessToken();
        } catch (RuntimeException $e) {
            throw new Swift_TransportException($e->getMessage(), 0, $e);
        }

        // MIME 形式のまま渡すと、件名・本文・返信先などがそのまま引き継がれる
        $response = Http::withToken($accessToken)
            ->withBody(base64_encode($message->toString()), 'text/plain')
            ->post('https://graph.microsoft.com/v1.0/me/sendMail');

        if ($response->failed()) {
            throw new Swift_TransportException('Outlookでの送信に失敗しました。(' . $response->status() . ' ' . $response->body() . ')');
        }

        $this->sendPerformed($message);

        return $this->numberOfRecipients($message);
    }
}
