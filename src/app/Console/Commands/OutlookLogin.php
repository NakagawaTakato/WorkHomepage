<?php

namespace App\Console\Commands;

use App\Services\MicrosoftOAuth;
use Illuminate\Console\Command;
use RuntimeException;

class OutlookLogin extends Command
{
    protected $signature = 'mail:outlook-login';

    protected $description = 'お問い合わせメールを送るOutlookアカウントにサインインする';

    public function handle(MicrosoftOAuth $oauth)
    {
        try {
            $deviceCode = $oauth->requestDeviceCode();

            $this->line('1. ブラウザで次のページを開いてください: ' . $deviceCode['verification_uri']);
            $this->line('2. 次のコードを入力してください: ' . $deviceCode['user_code']);
            $this->line('3. メールを送るOutlookアカウントでサインインし、アクセスを許可してください。');
            $this->line('(サインインが終わるまで、このまま待ちます)');

            $oauth->waitForDeviceLogin($deviceCode);
        } catch (RuntimeException $e) {
            $this->error($e->getMessage());

            return 1;
        }

        $this->info('サインインしました。お問い合わせメールをOutlookから送れます。');

        return 0;
    }
}
