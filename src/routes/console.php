<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('admin:create {email} {--name=管理者} {--password=}', function ($email) {
    $password = $this->option('password') ?: $this->secret('パスワード(8文字以上)');

    if (mb_strlen((string) $password) < 8) {
        $this->error('パスワードは8文字以上にしてください');
        return 1;
    }

    \App\Models\User::updateOrCreate(
        ['email' => $email],
        ['name' => $this->option('name'), 'password' => \Illuminate\Support\Facades\Hash::make($password)]
    );

    $this->info("管理者アカウントを保存しました: {$email}");
})->purpose('管理画面にログインする管理者アカウントを作成・パスワード変更します');
