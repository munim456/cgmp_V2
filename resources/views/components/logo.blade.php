@props(['light' => false])

<div {{ $attributes->merge(['class' => 'inline-flex flex-col items-center text-center ' . ($light ? 'text-white' : 'text-brand-blue')]) }}>
    @if(setting('logo_path'))
        <img src="{{ image_url(setting('logo_path')) }}" alt="{{ setting('clinic_name', 'Clinic logo') }}" class="h-9 w-full object-contain">
    @else
        <div class="relative h-9 w-full">
            <div class="absolute inset-x-2 top-2 h-2 -rotate-12 rounded-[100%] border-t-[5px] border-brand-blue"></div>
            <div class="absolute inset-x-4 top-0.5 h-8 -rotate-[30deg] rounded-[100%] border-t-[6px] border-brand-green"></div>
        </div>
    @endif
    <div class="mt-1 whitespace-nowrap font-serif text-xs font-bold uppercase tracking-wider">{{ setting('clinic_name', 'Cringila General Medical Practice') }}</div>
    <div class="mt-0.5 whitespace-nowrap font-sans text-[7px] font-semibold tracking-[.3em] text-brand-green">{{ strtoupper(setting('tagline', 'Healthcare for Every Generation')) }}</div>
</div>
