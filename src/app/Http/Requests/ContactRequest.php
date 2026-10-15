<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'consultations' => ['required', 'array'],
            'consultations.*' => [Rule::in(array_keys(config('site.consultations')))],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel' => ['required', 'regex:/^0\d{1,4}-?\d{1,4}-?\d{3,4}$/'],
            'prefecture' => ['required', Rule::in(config('site.prefectures'))],
            'age' => ['nullable', 'integer', 'between:0,120'],
            'initial_payment' => ['required', Rule::in(array_keys(config('site.initial_payments')))],
            'monthly_payment' => ['required', Rule::in(array_keys(config('site.monthly_payments')))],
            'agree' => ['accepted'],
        ];
    }

    public function messages()
    {
        return [
            'consultations.required' => 'ご相談内容を選択してください',
            'consultations.array' => 'ご相談内容を選択してください',
            'consultations.*.in' => 'ご相談内容を選択してください',
            'name.required' => 'お名前を入力してください',
            'name.max' => 'お名前は255文字以内で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'email.max' => 'メールアドレスは255文字以内で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.regex' => '電話番号は「09012345678」または「090-1234-5678」の形式で入力してください',
            'prefecture.required' => 'お住まいを選択してください',
            'prefecture.in' => 'お住まいを選択してください',
            'age.integer' => 'ご年齢は数字で入力してください',
            'age.between' => 'ご年齢は0〜120の数字で入力してください',
            'initial_payment.required' => '初期費用のお支払い方法を選択してください',
            'initial_payment.in' => '初期費用のお支払い方法を選択してください',
            'monthly_payment.required' => '月額(保守プラン)のお支払い方法を選択してください',
            'monthly_payment.in' => '月額(保守プラン)のお支払い方法を選択してください',
            'agree.accepted' => '「個人情報の取扱い」への同意が必要です',
        ];
    }
}
