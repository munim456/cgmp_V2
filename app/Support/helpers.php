<?php

use App\Models\Section;
use App\Models\Setting;

if (! function_exists('setting')) {
    function setting(string $key, ?string $default = null): ?string
    {
        return Setting::get($key, $default);
    }
}

if (! function_exists('section_data')) {
    function section_data(string $key, array $default = []): array
    {
        return Section::data($key, $default);
    }
}

if (! function_exists('image_url')) {
    function image_url(?string $path, string $fallback = ''): string
    {
        if ($path && str_starts_with($path, 'http')) {
            return $path;
        }

        if ($path && trim($path) !== '') {
            return asset('storage/' . ltrim($path, '/'));
        }

        return $fallback !== '' ? asset($fallback) : '';
    }
}
