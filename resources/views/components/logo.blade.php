@props(['light' => false])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center gap-1 ' . ($light ? 'text-white' : 'text-brand-blue')]) }}>
    @if(setting('logo_path'))
        <img src="{{ image_url(setting('logo_path')) }}" alt="{{ setting('clinic_name', 'Clinic logo') }}" class="h-11 w-20 shrink-0 object-contain">
    @else
        <div class="relative h-11 w-20 shrink-0">
            <div class="absolute left-1.5 top-2.5 h-2.5 w-16 -rotate-12 rounded-[100%] border-t-[6px] border-brand-blue"></div>
            <div class="absolute left-6 top-1 h-9 w-16 -rotate-[30deg] rounded-[100%] border-t-[7px] border-brand-green"></div>
        </div>
    @endif
    <div class="text-center font-serif text-[10px] leading-[1.4]">
        <div class="whitespace-nowrap">{{ strtoupper(setting('clinic_name', 'Cringila General Medical Practice')) }}</div>
        <div class="mt-1 whitespace-nowrap font-sans text-[6.5px] tracking-[.24em] text-brand-green">{{ strtoupper(setting('tagline', 'Healthcare for Every Generation')) }}</div>
    </div>
</div>
