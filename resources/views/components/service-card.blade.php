@props(['service'])

<a href="{{ route('services.show', $service) }}" class="rounded-[18px] bg-white p-5 shadow-lg shadow-[#062238]/10 block hover:-translate-y-1 transition-transform" data-reveal>
    <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-brand-blue-tint text-xl">
        <x-service-icon :name="$service->icon" class="h-5 w-5 text-brand-blue" />
    </div>
    <h3 class="font-serif text-lg font-bold">{{ $service->title }}</h3>
    <p class="mt-2 text-sm leading-6 text-[#60758d]">{{ $service->short_description }}</p>
    <span class="mt-4 flex items-center gap-2 text-sm font-semibold text-brand-blue">
        Learn more
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </span>
</a>
