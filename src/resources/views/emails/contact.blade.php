お問い合わせフォームから、新しいお問い合わせが届きました。
このメールに返信すると、お客さまのメールアドレス宛てに送られます。

■ ご相談内容
{{ collect($contact->consultations)->map(fn ($value) => config('site.consultations')[$value] ?? $value)->implode('、') }}

■ お名前
{{ $contact->name }}

■ メールアドレス
{{ $contact->email }}

■ 電話番号
{{ $contact->tel }}

■ お住まい
{{ $contact->prefecture }}

■ ご年齢
{{ $contact->age ?? '(未入力)' }}

■ 初期費用のお支払い方法
{{ config('site.initial_payments')[$contact->initial_payment] ?? $contact->initial_payment }}

■ 月額(保守プラン)のお支払い方法
{{ config('site.monthly_payments')[$contact->monthly_payment] ?? $contact->monthly_payment }}

■ 受付日時
{{ $contact->created_at->format('Y年n月j日 H:i') }}
