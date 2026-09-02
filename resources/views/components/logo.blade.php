@props(['light' => false])

<div {{ $attributes->merge(['class' => 'flex items-center gap-2 ' . ($light ? 'text-white' : 'text-brand-blue')]) }}>
    <div class="relative h-14 w-24 shrink-0">
        <div class="absolute left-2 top-3 h-3 w-20 -rotate-12 rounded-[100%] border-t-[7px] border-brand-blue"></div>
        <div class="absolute left-7 top-1 h-12 w-20 -rotate-[30deg] rounded-[100%] border-t-[8px] border-brand-green"></div>
    </div>
    <div class="whitespace-nowrap text-center font-serif text-[11px] leading-tight">
        <div>{{ strtoupper(setting('clinic_name', 'Cringila General Medical Practice')) }}</div>
        <div class="mt-1 font-sans text-[7px] tracking-[.28em] text-brand-green">{{ strtoupper(setting('tagline', 'Healthcare for Every Generation')) }}</div>
    </div>
</div>
