<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    private const IMAGE_KEYS = [
        'award_gold_image',
        'award_capcom_image',
        'line_qr_image',
    ];

    private const TEXT_KEYS = [
        'voice_notice_strong',
        'voice_notice_body',
        'line_url',
        'owner_name',
        'address',
        'tel',
        'email',
        'opened_on',
        'payment_timing',
        'copyright',
        'cancel_deadline',
        'cancel_policy',
    ];

    public function edit()
    {
        $settings = Setting::values();

        return view('admin.settings', compact('settings'));
    }

    public function update(SettingRequest $request)
    {
        $settings = Setting::values();

        foreach (self::TEXT_KEYS as $key) {
            Setting::put($key, $request->input($key));
        }

        Setting::put('cancel_policy_confirmed', $request->boolean('cancel_policy_confirmed') ? '1' : null);

        foreach (self::IMAGE_KEYS as $key) {
            $oldPath = $settings[$key];

            if ($request->hasFile($key)) {
                Setting::put($key, $request->file($key)->store('settings', 'public'));
            } elseif ($request->boolean($key . '_delete')) {
                Setting::put($key, null);
            } else {
                continue;
            }

            if ($oldPath) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        return redirect()->route('admin.settings.edit')->with('saved', true);
    }
}
