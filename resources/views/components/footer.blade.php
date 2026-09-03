<footer class="bg-[#061d2d] px-6 py-16 text-blue-100">
    <div class="mx-auto grid max-w-6xl gap-12 md:grid-cols-4">
        <div>
            <x-logo light />
            <p class="mt-7 leading-7">{{ setting('footer_text') }}</p>
            @if(setting('facebook_url'))
                <a href="{{ setting('facebook_url') }}" target="_blank" rel="noopener" class="btn-lift mt-7 flex h-11 w-11 items-center justify-center rounded-lg bg-white/10 font-bold hover:bg-white/20">f</a>
            @endif
        </div>

        <div>
            <h3 class="font-serif text-xl text-white">Quick Links</h3>
            <div class="mt-6 grid gap-3">
                <a href="{{ route('about') }}" class="w-fit transition-colors duration-200 hover:text-white">About</a>
                <a href="{{ route('services.index') }}" class="w-fit transition-colors duration-200 hover:text-white">Services</a>
                <a href="{{ route('doctors') }}" class="w-fit transition-colors duration-200 hover:text-white">Doctors</a>
                <a href="{{ route('blog.index') }}" class="w-fit transition-colors duration-200 hover:text-white">Blog</a>
                <a href="{{ route('faq') }}" class="w-fit transition-colors duration-200 hover:text-white">FAQ</a>
                <a href="{{ route('contact') }}" class="w-fit transition-colors duration-200 hover:text-white">Contact</a>
            </div>
        </div>

        <div>
            <h3 class="font-serif text-xl text-white">Our Services</h3>
            <div class="mt-6 grid gap-3">
                @foreach(\App\Models\Service::active()->get() as $footerService)
                    <a href="{{ route('services.show', $footerService) }}" class="w-fit transition-colors duration-200 hover:text-white">{{ $footerService->title }}</a>
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="font-serif text-xl text-white">Contact &amp; Hours</h3>
            <div class="mt-6 grid gap-4">
                <span>&#8982; {{ setting('address_line1') }}, {{ setting('address_suburb') }}</span>
                <span>&#9742; {{ setting('phone') }}</span>
                <span>&#9993; {{ setting('contact_email') }}</span>
                <span>Opening Hours<br><span class="whitespace-pre-line">{{ setting('opening_hours') }}</span></span>
            </div>
        </div>
    </div>

    <div class="mx-auto mt-14 flex max-w-6xl flex-wrap justify-between gap-4 border-t border-white/10 pt-7 text-sm">
        <span>&copy; {{ now()->year }} {{ setting('clinic_name') }}. All rights reserved.</span>
        <span>
            <a href="{{ route('pages.privacy') }}" class="hover:underline">Privacy Policy</a>
            &nbsp;&nbsp;
            <a href="{{ route('pages.terms') }}" class="hover:underline">Terms of Use</a>
        </span>
    </div>
</footer>

<button
    x-data
    @click="window.scrollTo({top: 0, behavior: 'smooth'})"
    aria-label="Back to top"
    class="btn-lift fixed bottom-6 right-6 z-30 flex h-14 w-14 items-center justify-center rounded-full bg-brand-blue text-white shadow-xl hover:bg-brand-blue-dark"
>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>
