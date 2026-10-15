<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->only([
            'consultations',
            'name',
            'email',
            'tel',
            'prefecture',
            'age',
            'initial_payment',
            'monthly_payment',
        ]));

        return redirect()->route('contact')->with('sent', true);
    }
}
