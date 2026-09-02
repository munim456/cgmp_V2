@php
    $navItems = [
        ['Home', route('home')],
        ['About', route('about')],
        ['Services', route('services.index')],
        ['Doctors', route('doctors')],
        ['Blog', route('blog.index')],
        ['Contact', route('contact')],
    ];
@endphp

<div x-data="{ open: false }">
    <header id="site-header" class="border-b border-slate-200 bg-white/95 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4 site-header__inner">
            <a href="{{ route('home') }}"><x-logo /></a>

            <nav class="hidden items-center gap-1 lg:flex">
                @foreach($navItems as [$label, $href])
                    <a href="{{ $href }}" class="rounded-xl px-3 py-3 text-[16px] text-[#162232] hover:bg-brand-blue-tint">{{ $label }}</a>
                @endforeach
            </nav>

            <a href="{{ route('booking') }}" class="hidden items-center gap-3 rounded-2xl bg-brand-blue px-5 py-4 font-bold text-white shadow-lg hover:bg-brand-blue-dark transition-colors md:flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[19px] w-[19px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                Book Appointment
            </a>

            <button aria-label="Open menu" class="lg:hidden" @click="open = !open">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        </div>

        <nav x-show="open" x-cloak class="flex flex-col gap-1 border-t px-6 py-4 lg:hidden">
            @foreach($navItems as [$label, $href])
                <a href="{{ $href }}" class="rounded-lg px-3 py-3">{{ $label }}</a>
            @endforeach
            <a href="{{ route('booking') }}" class="mt-2 flex items-center justify-center gap-3 rounded-2xl bg-brand-blue px-5 py-4 font-bold text-white">Book Appointment</a>
        </nav>
    </header>
</div>
