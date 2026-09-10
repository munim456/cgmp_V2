<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\ImageUploader;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public const KEYS = [
        'clinic_name', 'tagline', 'address_line1', 'address_suburb', 'phone', 'contact_email', 'fax',
        'opening_hours', 'emergency_note', 'healthengine_url', 'facebook_url', 'instagram_url',
        'google_map_embed', 'footer_text', 'copyright_text', 'analytics_code',
    ];

    public function edit(): View
    {
        $settings = Setting::query()->pluck('value', 'key');

        return view('admin.settings.edit', ['settings' => $settings]);
    }

    public function update(Request $request): RedirectResponse
    {
        foreach (self::KEYS as $key) {
            Setting::query()->updateOrCreate(['key' => $key], ['value' => $request->input($key)]);
        }

        $request->validate([
            'logo' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
        ]);

        if ($request->boolean('remove_logo')) {
            Setting::query()->updateOrCreate(['key' => 'logo_path'], ['value' => null]);
        } elseif ($request->hasFile('logo')) {
            Setting::query()->updateOrCreate(
                ['key' => 'logo_path'],
                ['value' => ImageUploader::storeLogo($request->file('logo'))]
            );
        }

        return redirect()->route('admin.settings.edit')->with('status', 'Settings updated.');
    }
}
