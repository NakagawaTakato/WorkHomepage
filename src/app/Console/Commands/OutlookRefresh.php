<?php

namespace App\Console\Commands;

use App\Services\MicrosoftOAuth;
use Illuminate\Console\Command;
use RuntimeException;

class OutlookRefresh extends Command
{
    protected $signature = 'mail:outlook-refresh';

    protected $description = 'Outlookの認証を更新する(お問い合わせがしばらくなくても、認証が切れないようにする)';

    public function handle(MicrosoftOAuth $oauth)
    {
        try {
            $oauth->refresh();
        } catch (RuntimeException $e) {
            $this->error($e->getMessage());

            return 1;
        }

        $this->info('Outlookの認証を更新しました。');

        return 0;
    }
}
