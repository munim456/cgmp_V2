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
        <div class="flex items-center justify-between py-4 pl-4 pr-6 site-header__inner">
            <a href="{{ route('home') }}"><x-logo /></a>

            <nav class="hidden items-center gap-1 lg:flex">
                @foreach($navItems as [$label, $href])
                    <a href="{{ $href }}" class="rounded-xl px-3 py-3 text-[16px] text-[#162232] transition-colors duration-200 hover:bg-brand-blue-tint">{{ $label }}</a>
                @endforeach
            </nav>

            <a href="{{ booking_url() }}" @if(booking_is_external()) target="_blank" rel="noopener" @endif class="btn-lift hidden items-center gap-2 rounded-xl bg-brand-blue px-4 py-2.5 text-sm font-bold text-white shadow-lg hover:bg-brand-blue-dark md:flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                Book Appointment
            </a>

            <button aria-label="Open menu" class="lg:hidden" @click="open = !open">
                <svg x-show="!open" x-transition.opacity.duration.150ms xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="open" x-transition.opacity.duration.150ms xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        </div>

        <nav
            x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="flex flex-col gap-1 border-t px-6 py-4 lg:hidden"
        >
            @foreach($navItems as [$label, $href])
                <a href="{{ $href }}" class="rounded-lg px-3 py-3 transition-colors duration-200 hover:bg-brand-blue-tint">{{ $label }}</a>
            @endforeach
            <a href="{{ booking_url() }}" @if(booking_is_external()) target="_blank" rel="noopener" @endif class="btn-lift mt-2 flex items-center justify-center gap-3 rounded-2xl bg-brand-blue px-5 py-4 font-bold text-white">Book Appointment</a>
        </nav>
    </header>
</div>
