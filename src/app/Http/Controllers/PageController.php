<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class PageController extends Controller
{
    public function home()
    {
        $settings = Setting::values();

        return view('home', compact('settings'));
    }

    public function line()
    {
        $settings = Setting::values();
        $lineUrl = $settings['line_url'];
        $qrCode = null;

        if ($settings['line_qr_image']) {
            $qrCode = asset('storage/' . $settings['line_qr_image']);
        } elseif ($lineUrl) {
            $writer = new Writer(new ImageRenderer(new RendererStyle(400, 1), new SvgImageBackEnd()));
            $qrCode = 'data:image/svg+xml;base64,' . base64_encode($writer->writeString($lineUrl));
        }

        return view('line', compact('lineUrl', 'qrCode'));
    }

    public function tokushoho()
    {
        $settings = Setting::values();

        return view('tokushoho', compact('settings'));
    }
}
