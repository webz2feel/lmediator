<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Setting::latest()->first();
        return view('backend.settings.index')->withSetting($setting);
    }

    public function updateBasic(Request $request, Setting $setting)
    {
        if($request->hasFile('favicon')) {
            $setting->update([
                'favicon' => request()->favicon->store('images', 'public'),
            ]);
            $favicon = Image::make(public_path('storage/' . $setting->favicon))->resize(50, 50);
            $favicon->save();
        }
        if($request->hasFile('logo')) {
            $setting->update([
                'logo' => request()->logo->store('images', 'public'),
            ]);
            $logo = Image::make(public_path('storage/' . $setting->logo))->resize(150, 70);
            $logo->save();
        }

        $setting->website_title = $request->website_title;
        $setting->contact_email = $request->contact_email;
        $setting->contact_number = $request->contact_number;
        $setting->save();

        return redirect()->route('admin.settings')->with('success', 'Setting updated successfully');
    }

    public function updateEmail(Request $request, Setting $setting)
    {
        $setting->smtp_protocol = $request->smtp_protocol;
        $setting->smtp_username = $request->smtp_username;
        $setting->smtp_password = $request->smtp_password;
        $setting->smtp_port = $request->smtp_port;
        $setting->smtp_security = $request->smtp_security;

        $setting->save();

        return redirect()->route('admin.settings')->with('success', 'SMTP setting updated successfully');
    }
}
