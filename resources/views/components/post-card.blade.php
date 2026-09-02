@props(['post'])

<article class="rounded-2xl bg-white shadow-lg shadow-[#062238]/10 overflow-hidden flex flex-col" data-reveal>
    <a href="{{ route('blog.show', $post) }}" class="block aspect-[16/9] overflow-hidden bg-brand-blue-tint">
        @if($post->featured_image)
            <img src="{{ image_url($post->featured_image) }}" alt="{{ $post->featured_image_alt ?: $post->title }}" class="h-full w-full object-cover" loading="lazy">
        @else
            <div class="flex h-full w-full items-center justify-center text-brand-blue">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4zM4 9h16M9 4v16"/></svg>
            </div>
        @endif
    </a>
    <div class="flex flex-1 flex-col gap-2 p-4">
        <div class="flex flex-wrap items-center gap-2 text-xs text-[#60758d]">
            @if($post->category)
                <span class="rounded-full bg-brand-blue-tint px-2.5 py-0.5 text-[11px] font-semibold text-[#062238]">{{ $post->category->name }}</span>
            @endif
            <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('j M Y') }}</time>
        </div>
        <h3 class="font-serif text-base font-bold leading-snug"><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h3>
        @if($post->excerpt)
            <p class="flex-1 text-xs leading-5 text-[#60758d]">{{ $post->excerpt }}</p>
        @endif
        <a href="{{ route('blog.show', $post) }}" class="flex items-center gap-1.5 text-sm font-semibold text-brand-blue">
            Read article
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</article>
