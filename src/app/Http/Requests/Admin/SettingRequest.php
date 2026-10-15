<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $image = ['nullable', 'image', 'mimes:jpeg,png,webp', 'max:10240'];

        return [
            'award_gold_image' => $image,
            'award_capcom_image' => $image,
            'line_qr_image' => $image,
            'voice_notice_strong' => ['nullable', 'string', 'max:255'],
            'voice_notice_body' => ['nullable', 'string', 'max:1000'],
            'line_url' => ['nullable', 'url', 'max:255'],
            'owner_name' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'tel' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'opened_on' => ['nullable', 'string', 'max:255'],
            'payment_timing' => ['nullable', 'string', 'max:255'],
            'copyright' => ['nullable', 'string', 'max:255'],
            'cancel_deadline' => ['nullable', 'string', 'max:255'],
            'cancel_policy' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages()
    {
        return [
            '*.image' => '画像ファイルを選択してください',
            '*.mimes' => '画像はJPEG・PNG・WebPのいずれかにしてください',
            '*.max' => ':attributeが長すぎます',
            'award_gold_image.max' => '画像は10MB以下にしてください',
            'award_capcom_image.max' => '画像は10MB以下にしてください',
            'line_qr_image.max' => '画像は10MB以下にしてください',
            'line_url.url' => 'LINEのURLは「https://」から始まる形式で入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'uploaded' => '画像のアップロードに失敗しました。ファイルサイズを確認してください',
        ];
    }

    public function attributes()
    {
        return [
            'voice_notice_strong' => '強調する文章',
            'voice_notice_body' => '続きの文章',
            'line_url' => 'LINEのURL',
            'owner_name' => '運営責任者',
            'address' => '所在地',
            'tel' => '電話番号',
            'email' => 'メールアドレス',
            'opened_on' => '開業日',
            'payment_timing' => 'お支払い時期',
            'copyright' => '著作権',
            'cancel_deadline' => '解約の申し出期限',
            'cancel_policy' => 'キャンセルと返金',
        ];
    }
}
