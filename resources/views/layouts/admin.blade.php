<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — {{ setting('clinic_name', 'CGMP') }} Admin</title>

    @if(setting('favicon_path') || setting('logo_path'))
        <link rel="icon" href="{{ image_url(setting('favicon_path') ?: setting('logo_path')) }}">
        <link rel="apple-touch-icon" href="{{ image_url(setting('favicon_path') ?: setting('logo_path')) }}">
    @else
        <link rel="icon" href="/icon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-icon.png">
    @endif

    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/aileron@5/index.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/aileron@5/600.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/aileron@5/700.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/fraunces@5/600.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/fraunces@5/700.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trix@2/dist/trix.css">
    <script src="https://cdn.jsdelivr.net/npm/trix@2/dist/trix.umd.min.js" defer></script>
    <style>
        trix-toolbar .trix-button { font-size: 0.8rem; }
        trix-editor { min-height: 220px; border-radius: 0.5rem; border-color: #d1d5db; }
    </style>
    @stack('scripts')
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-900" x-data="{ sidebarOpen: false }">
    <div class="flex min-h-screen">
        <aside class="hidden w-64 shrink-0 bg-brand-blue-darker text-blue-100 lg:block">
            <div class="border-b border-white/10 p-6">
                <a href="{{ route('admin.dashboard') }}"><x-logo light /></a>
            </div>
            <nav class="mt-4 flex flex-col gap-1 px-4 text-sm">
                @php
                    $links = [
                        ['admin.dashboard', 'Dashboard'],
                        ['admin.services.index', 'Services'],
                        ['admin.doctors.index', 'Doctors'],
                        ['admin.announcements.index', 'Announcements'],
                        ['admin.testimonials.index', 'Testimonials'],
                        ['admin.posts.index', 'Blog Posts'],
                        ['admin.categories.index', 'Categories'],
                        ['admin.faqs.index', 'FAQs'],
                        ['admin.pages.index', 'Pages'],
                        ['admin.sections.edit', 'Homepage Sections'],
                        ['admin.settings.edit', 'Settings'],
                        ['admin.messages.index', 'Messages'],
                    ];
                @endphp
                @foreach($links as [$routeName, $label])
                    <a href="{{ route($routeName) }}" class="rounded-lg border-l-4 px-3 py-2 transition-colors duration-200 {{ request()->routeIs($routeName.'*') ? 'border-brand-green bg-white/10 font-semibold text-white' : 'border-transparent hover:bg-white/5' }}">{{ $label }}</a>
                @endforeach
            </nav>
            <div class="mt-8 border-t border-white/10 px-4 pt-4">
                <a href="{{ route('profile.edit') }}" class="block rounded-lg px-3 py-2 text-sm hover:bg-white/5">My Profile</a>
                <a href="{{ route('home') }}" class="block rounded-lg px-3 py-2 text-sm hover:bg-white/5" target="_blank">View Site &#8599;</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mt-1 w-full rounded-lg px-3 py-2 text-left text-sm hover:bg-white/5">Log Out</button>
                </form>
            </div>
        </aside>

        <div class="flex-1">
            <header class="flex items-center justify-between border-b-2 border-brand-blue bg-white px-6 py-4 shadow-[0_2px_16px_rgba(15,42,67,0.08)]">
                <h1 class="font-serif text-xl font-bold text-[#062238]">@yield('title', 'Dashboard')</h1>
                <span class="text-sm text-gray-500">{{ auth()->user()?->name }}</span>
            </header>

            <main class="p-6">
                @if(session('status'))
                    <div class="mb-6 rounded-xl bg-emerald-50 p-4 text-emerald-800">{{ session('status') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
