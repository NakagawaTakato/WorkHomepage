<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->only([
            'consultations',
            'name',
            'email',
            'tel',
            'prefecture',
            'age',
            'initial_payment',
            'monthly_payment',
        ]));

        // 送信に失敗しても、お問い合わせはDBに保存済みなので、エラーを記録して完了画面へ進む
        if ($to = Setting::values()['contact_mail_to']) {
            try {
                Mail::to($to)->send(new ContactMail($contact));
            } catch (Throwable $e) {
                report($e);
            }
        }

        return redirect()->route('contact')->with('sent', true);
    }
}
