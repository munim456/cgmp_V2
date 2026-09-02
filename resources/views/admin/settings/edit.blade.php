@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}" class="max-w-2xl rounded-xl bg-white p-6 shadow-sm">
    @csrf @method('PUT')

    <div class="grid gap-5">
        <h2 class="font-bold text-gray-700">Identity</h2>
        <label class="block">
            <span class="text-sm font-semibold">Clinic name</span>
            <input type="text" name="clinic_name" value="{{ old('clinic_name', $settings['clinic_name'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>
        <label class="block">
            <span class="text-sm font-semibold">Tagline</span>
            <input type="text" name="tagline" value="{{ old('tagline', $settings['tagline'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>

        <h2 class="mt-4 font-bold text-gray-700">Contact</h2>
        <label class="block">
            <span class="text-sm font-semibold">Address line</span>
            <input type="text" name="address_line1" value="{{ old('address_line1', $settings['address_line1'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>
        <label class="block">
            <span class="text-sm font-semibold">Suburb / postcode</span>
            <input type="text" name="address_suburb" value="{{ old('address_suburb', $settings['address_suburb'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>
        <label class="block">
            <span class="text-sm font-semibold">Phone</span>
            <input type="text" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>
        <label class="block">
            <span class="text-sm font-semibold">Email</span>
            <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>
        <label class="block">
            <span class="text-sm font-semibold">Fax <span class="text-gray-400">(leave blank if none)</span></span>
            <input type="text" name="fax" value="{{ old('fax', $settings['fax'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>
        <label class="block">
            <span class="text-sm font-semibold">Opening hours <span class="text-gray-400">(one line per day)</span></span>
            <textarea name="opening_hours" class="mt-1 w-full rounded-lg border-gray-300" rows="3">{{ old('opening_hours', $settings['opening_hours'] ?? '') }}</textarea>
        </label>
        <label class="block">
            <span class="text-sm font-semibold">Emergency note</span>
            <input type="text" name="emergency_note" value="{{ old('emergency_note', $settings['emergency_note'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>

        <h2 class="mt-4 font-bold text-gray-700">Booking</h2>
        <label class="block">
            <span class="text-sm font-semibold">HealthEngine embed URL <span class="text-gray-400">(leave blank to show the phone/walk-in fallback)</span></span>
            <input type="url" name="healthengine_url" value="{{ old('healthengine_url', $settings['healthengine_url'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>

        <h2 class="mt-4 font-bold text-gray-700">Social</h2>
        <label class="block">
            <span class="text-sm font-semibold">Facebook URL</span>
            <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>
        <label class="block">
            <span class="text-sm font-semibold">Instagram URL</span>
            <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>

        <h2 class="mt-4 font-bold text-gray-700">Footer &amp; SEO</h2>
        <label class="block">
            <span class="text-sm font-semibold">Footer text</span>
            <textarea name="footer_text" class="mt-1 w-full rounded-lg border-gray-300" rows="2">{{ old('footer_text', $settings['footer_text'] ?? '') }}</textarea>
        </label>
        <label class="block">
            <span class="text-sm font-semibold">Copyright text <span class="text-gray-400">(leave blank to use clinic name)</span></span>
            <input type="text" name="copyright_text" value="{{ old('copyright_text', $settings['copyright_text'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>
        <label class="block">
            <span class="text-sm font-semibold">Google Map embed URL</span>
            <input type="url" name="google_map_embed" value="{{ old('google_map_embed', $settings['google_map_embed'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>
        <label class="block">
            <span class="text-sm font-semibold">Analytics code <span class="text-gray-400">(raw HTML/JS snippet)</span></span>
            <textarea name="analytics_code" class="mt-1 w-full rounded-lg border-gray-300 font-mono text-sm" rows="3">{{ old('analytics_code', $settings['analytics_code'] ?? '') }}</textarea>
        </label>
    </div>

    <div class="mt-6">
        <button type="submit" class="rounded-lg bg-brand-blue px-5 py-2 font-semibold text-white">Save Settings</button>
    </div>
</form>
@endsection
