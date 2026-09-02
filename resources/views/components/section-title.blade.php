@props(['eyebrow', 'title', 'copy' => null, 'nowrap' => false, 'eyebrowClass' => 'rounded-full bg-brand-blue-tint px-5 py-3 text-xs font-bold uppercase tracking-[.18em] text-[#062238]'])

<div class="mx-auto text-center {{ $nowrap ? 'max-w-6xl' : 'max-w-4xl' }}">
    <span class="inline-block {{ $eyebrowClass }}">{{ $eyebrow }}</span>
    <h2 class="mt-6 font-serif font-bold text-[#062238] {{ $nowrap ? 'whitespace-nowrap text-2xl sm:text-3xl md:text-4xl lg:text-5xl' : 'text-4xl md:text-6xl' }}">{{ $title }}</h2>
    @if($copy)
        <p class="mt-5 text-lg leading-8 text-[#45627d]">{{ $copy }}</p>
    @endif
</div>
