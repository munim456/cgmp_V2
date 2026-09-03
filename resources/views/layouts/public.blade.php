<!DOCTYPE html>
<html lang="en-AU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', setting('clinic_name')) | {{ setting('clinic_name') }}</title>
    <meta name="description" content="@yield('meta_description', setting('tagline'))">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ setting('clinic_name') }}">
    <meta property="og:title" content="@yield('title', setting('clinic_name'))">
    <meta property="og:description" content="@yield('meta_description', setting('tagline'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/hero-team.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', setting('clinic_name'))">
    <meta name="twitter:description" content="@yield('meta_description', setting('tagline'))">
    <meta name="twitter:image" content="{{ asset('images/hero-team.jpg') }}">

    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'MedicalClinic',
        'name' => setting('clinic_name'),
        'url' => url('/'),
        'telephone' => setting('phone'),
        'email' => setting('contact_email'),
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => setting('address_line1'),
            'addressLocality' => setting('address_suburb'),
            'addressCountry' => 'AU',
        ],
    ], JSON_UNESCAPED_SLASHES) !!}
    </script>

    <link rel="icon" href="/icon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-icon.png">

    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/aileron@5/index.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/aileron@5/600.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/aileron@5/700.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/fraunces@5/600.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/fraunces@5/700.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/fraunces@5/800.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {!! setting('analytics_code') !!}
</head>
<body class="bg-white font-sans antialiased" x-data>
    <div class="hidden bg-[#007ba7] text-sm text-white md:block">
        <div class="mx-auto flex max-w-6xl justify-between px-6 py-2">
            <span>
                <a href="tel:{{ preg_replace('/\s+/', '', setting('phone', '')) }}" class="mr-5 hover:underline">{{ setting('phone') }}</a>
                <span class="text-blue-100">{{ setting('clinic_name') }}</span>
            </span>
            <span class="flex items-center gap-4">
                <b class="text-[#ffd7d7]">&#9679; {{ setting('emergency_note', 'In a medical emergency, call 000.') }}</b>
            </span>
        </div>
    </div>

    <div class="sticky top-0 z-30">
        <x-header />

        @foreach(\App\Models\Announcement::live()->get() as $announcement)
            <div
                x-data="{ show: !localStorage.getItem('notice-{{ $announcement->id }}-dismissed') }"
                x-show="show"
                x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                class="relative border-b {{ $announcement->type === 'warning' ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-brand-blue-tint bg-brand-blue-tint text-[#062238]' }}"
            >
                <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-6 py-3">
                    <p class="text-sm">{{ $announcement->message }}</p>
                    <button @click="show = false; localStorage.setItem('notice-{{ $announcement->id }}-dismissed', '1')" aria-label="Dismiss" class="shrink-0 opacity-70 transition-opacity hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <main>
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
