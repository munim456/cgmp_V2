@php
    $configuredNavItems = section_data('navigation')['items'] ?? [];
    $navItems = count($configuredNavItems)
        ? collect($configuredNavItems)->map(fn ($item) => [$item['label'], $item['url']])->all()
        : [
            ['Home', route('home')],
            ['About', route('about')],
            ['Services', route('services.index')],
            ['Doctors', route('doctors')],
            ['Blog', route('blog.index')],
            ['Contact', route('contact')],
        ];
    $bookIcon = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>';
@endphp

<div x-data="{ open: false }">
    <header id="site-header" class="relative z-10 rounded-b-3xl border-b-4 border-brand-blue bg-white shadow-lg">
        <div class="flex items-center justify-between py-3 pl-4 pr-6 site-header__inner">
            <a href="{{ route('home') }}"><x-logo /></a>

            <nav class="hidden items-center gap-1 lg:flex">
                @foreach($navItems as [$label, $href])
                    <a href="{{ $href }}" class="rounded-xl border-b-2 px-3 py-3 text-[16px] transition-colors duration-200 hover:bg-brand-blue-tint {{ url()->current() === $href ? 'border-brand-blue font-semibold text-brand-blue' : 'border-transparent text-[#162232]' }}">{{ $label }}</a>
                @endforeach
            </nav>

            <x-healthengine-button :label="$bookIcon . 'Book Appointment'" class="btn-lift hidden items-center gap-2 rounded-xl bg-brand-blue px-4 py-2.5 text-sm font-bold text-white shadow-lg hover:bg-brand-blue-dark md:flex" />

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
            class="flex flex-col gap-1 rounded-b-3xl border-t bg-white px-6 py-4 lg:hidden"
        >
            @foreach($navItems as [$label, $href])
                <a href="{{ $href }}" class="rounded-lg border-l-4 px-3 py-3 transition-colors duration-200 hover:bg-brand-blue-tint {{ url()->current() === $href ? 'border-brand-blue bg-brand-blue-tint font-semibold text-brand-blue' : 'border-transparent' }}">{{ $label }}</a>
            @endforeach
            <hr class="my-2 border-t border-gray-200">
            <x-healthengine-button :label="$bookIcon . 'Book Appointment'" class="btn-lift mt-2 flex items-center justify-center gap-3 rounded-2xl bg-brand-blue px-5 py-4 font-bold text-white" />
            <a href="{{ route('emergency') }}" class="mt-2 flex items-center gap-2 px-3 py-2 text-sm font-semibold text-red-600">
                <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                Emergency Information
            </a>
        </nav>
    </header>
</div>
