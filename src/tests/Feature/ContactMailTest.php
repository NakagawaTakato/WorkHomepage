<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactMailTest extends TestCase
{
    use DatabaseTransactions;

    private function validInput(): array
    {
        return [
            'consultations' => ['laravel'],
            'name' => '山田 太郎',
            'email' => 'taro@example.com',
            'tel' => '09012345678',
            'prefecture' => '東京都',
            'age' => '',
            'initial_payment' => 'hand',
            'monthly_payment' => 'none',
            'agree' => '1',
        ];
    }

    public function test_送信すると設定したアドレスへ入力内容のメールが届く()
    {
        Setting::put('contact_mail_to', 'owner@example.com');

        $this->post(route('contact.store'), $this->validInput())
            ->assertRedirect(route('contact'));

        // phpunit.xml の MAIL_MAILER=array により、送ったメールはメモリ上に残る
        $messages = app('mailer')->getSwiftMailer()->getTransport()->messages();
        $this->assertCount(1, $messages);

        $message = $messages->first();
        $this->assertSame(['owner@example.com'], array_keys($message->getTo()));
        $this->assertSame(['taro@example.com'], array_keys($message->getReplyTo()));
        $this->assertSame('【お問い合わせ】山田 太郎 様', $message->getSubject());

        foreach (['山田 太郎', 'taro@example.com', '09012345678', '東京都', 'Laravel(PHP)', '手渡し', '保守プランなし', '(未入力)'] as $text) {
            $this->assertStringContainsString($text, $message->getBody());
        }
    }

    public function test_入力エラーのときはメールを送らない()
    {
        Mail::fake();
        Setting::put('contact_mail_to', 'owner@example.com');

        $this->post(route('contact.store'), ['name' => ''])->assertSessionHasErrors();

        Mail::assertNothingSent();
    }

    public function test_送信先が空欄のときはメールを送らない()
    {
        Mail::fake();
        Setting::put('contact_mail_to', null);

        $this->post(route('contact.store'), $this->validInput())
            ->assertRedirect(route('contact'));

        Mail::assertNothingSent();
    }

    public function test_管理画面に送信先の入力欄が表示される()
    {
        Setting::put('contact_mail_to', 'owner@example.com');

        $this->actingAs(User::factory()->create())
            ->get(route('admin.settings.edit'))
            ->assertOk()
            ->assertSee('お問い合わせの送信先メールアドレス')
            ->assertSee('value="owner@example.com"', false);
    }

    public function test_管理画面で送信先を保存できる()
    {
        $this->actingAs(User::factory()->create())
            ->put(route('admin.settings.update'), ['contact_mail_to' => 'new@example.com'])
            ->assertRedirect(route('admin.settings.edit'));

        $this->assertSame('new@example.com', Setting::values()['contact_mail_to']);
    }

    public function test_管理画面で送信先がメール形式でないと保存できない()
    {
        $this->actingAs(User::factory()->create())
            ->put(route('admin.settings.update'), ['contact_mail_to' => 'abc'])
            ->assertSessionHasErrors(['contact_mail_to' => 'お問い合わせの送信先はメール形式で入力してください']);
    }
}
