@extends('layouts.public')

@section('title', $hero['heading'] ?? 'Home')

@section('content')

<section class="relative isolate overflow-hidden bg-brand-blue text-white">
    <div class="relative mx-auto md:aspect-[11/4]">
        <div class="relative z-10 flex items-center overflow-hidden px-6 py-16 md:absolute md:inset-y-0 md:left-0 md:w-1/2 md:px-[3vw] md:py-[1vw]">
            <div class="hero-circle pointer-events-none absolute -right-16 top-1/2 hidden h-72 w-72 -translate-y-1/2 rounded-full border border-white/10 md:block"></div>
            <div class="hero-circle pointer-events-none absolute -right-32 top-1/3 hidden h-56 w-56 -translate-y-1/2 rounded-full border border-white/10 md:block" style="animation-delay: 1.3s"></div>
            <div class="relative max-w-[560px] md:max-w-[42vw]">
                @if(!empty($hero['badge_text']))
                    <p class="font-serif font-bold uppercase leading-tight text-brand-green text-3xl md:text-[clamp(1rem,2.6vw,2.25rem)]">{{ $hero['badge_text'] }}</p>
                @endif
                <h1 class="font-serif font-bold mt-4 text-3xl md:mt-[1vw] md:text-[clamp(1.15rem,3.4vw,3rem)]">{{ $hero['heading'] ?? 'Welcome to ' . setting('clinic_name') }}</h1>
                <p class="leading-7 text-blue-50 mt-4 text-base md:mt-[0.8vw] md:text-[clamp(0.7rem,1.1vw,1.125rem)] md:leading-[1.5]">{{ $hero['subheading'] ?? '' }}</p>
                @php
                    $heroPrimaryIsDefault = empty($hero['primary_button_link']) || $hero['primary_button_link'] === '/book-appointment';
                    $heroPrimaryHref = $heroPrimaryIsDefault ? booking_url() : $hero['primary_button_link'];
                @endphp
                <div class="flex flex-wrap gap-4 mt-6 md:mt-[1.2vw] md:gap-[1vw]">
                    <a href="{{ $heroPrimaryHref }}" @if($heroPrimaryIsDefault && booking_is_external()) target="_blank" rel="noopener" @endif class="btn-lift inline-flex items-center gap-3 rounded-2xl bg-brand-green font-bold text-white shadow-lg hover:bg-brand-green-dark px-7 py-5 md:gap-[0.6vw] md:px-[1.6vw] md:py-[1vw] md:text-[clamp(0.7rem,1.05vw,1rem)]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-[1.4vw] md:w-[1.4vw]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                        {{ $hero['primary_button_text'] ?? 'Book Appointment' }}
                    </a>
                    <a href="tel:{{ preg_replace('/\s+/', '', setting('phone', '')) }}" class="btn-lift inline-flex items-center gap-3 rounded-2xl border border-blue-300/60 hover:bg-white/10 px-7 py-5 md:gap-[0.6vw] md:px-[1.6vw] md:py-[1vw] md:text-[clamp(0.7rem,1.05vw,1rem)]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-[1.4vw] md:w-[1.4vw]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        {{ setting('phone') }}
                    </a>
                </div>
                <div class="flex flex-wrap gap-2 mt-4 text-xs md:mt-[0.8vw] md:gap-[0.5vw] md:text-[clamp(0.6rem,0.85vw,0.875rem)]">
                    @foreach(preg_split('/\r\n|\r|\n/', trim(setting('opening_hours', ''))) as $line)
                        @if(trim($line) !== '')
                            <span class="rounded-full border border-blue-300/40 bg-blue-500/20 px-3 py-1.5 md:px-[0.9vw] md:py-[0.45vw]">{{ trim($line) }}</span>
                        @endif
                    @endforeach
                    <span class="rounded-full border border-blue-300/40 bg-blue-500/20 px-3 py-1.5 md:px-[0.9vw] md:py-[0.45vw]">{{ setting('address_line1') }}, {{ setting('address_suburb') }}</span>
                </div>
            </div>
        </div>
        <div class="relative min-h-[280px] overflow-hidden md:absolute md:inset-y-0 md:right-0 md:min-h-0 md:w-1/2">
            <img src="{{ image_url($hero['image'] ?? null, 'images/hero-team-11x4.jpg') }}" alt="Our clinic team" class="absolute inset-0 h-full w-full object-cover">
            <div class="pointer-events-none absolute inset-y-0 left-0 hidden w-24 bg-gradient-to-r from-brand-blue to-transparent md:block"></div>
            <div class="pointer-events-none absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-brand-blue/40 to-transparent md:hidden"></div>
            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-brand-blue/15 via-transparent to-transparent"></div>
        </div>
    </div>
</section>

@if($doctors->isNotEmpty())
<section class="bg-white px-6 py-16">
    <x-section-title eyebrow="Meet Our Doctors" title="Expert Care from Experienced Practitioners" copy="Our team brings a wealth of experience and compassion to every consultation." :nowrap="true" />
    <div class="reveal-stagger mx-auto mt-10 grid max-w-6xl gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach($doctors as $doctor)
            <div class="flex flex-col rounded-[22px] bg-white p-7 shadow-[0_10px_30px_rgba(0,0,0,0.06)] transition-all duration-300 ease-out hover:-translate-y-1" data-reveal>
                <div class="mb-5 flex items-start gap-4">
                    <div class="flex h-20 w-20 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-br from-blue-400 to-blue-600 text-2xl font-bold text-white">
                        @if($doctor->photo)
                            <img src="{{ image_url($doctor->photo) }}" alt="{{ $doctor->name }}" class="h-full w-full object-cover">
                        @else
                            {{ collect(explode(' ', $doctor->name))->map(fn ($w) => mb_substr($w, 0, 1))->implode('') }}
                        @endif
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-[#002B49]">{{ $doctor->name }}</h3>
                        <p class="text-[13px] font-semibold text-[#4A8B2C]">{{ $doctor->qualifications }}</p>
                        <p class="text-[13px] text-gray-500">{{ $doctor->role }}</p>
                        @if($doctor->years_experience)
                            <div class="mt-1 flex items-center gap-1 text-xs text-gray-500">
                                <svg class="h-3 w-3 fill-amber-400 text-amber-400" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                {{ $doctor->years_experience }}
                            </div>
                        @endif
                    </div>
                </div>

                @if($doctor->bio)
                    <p class="mb-4 line-clamp-2 text-sm leading-relaxed text-gray-500">{{ $doctor->bio }}</p>
                @endif

                @if($doctor->languageList())
                    <div class="mb-4 flex flex-wrap gap-2">
                        @foreach($doctor->languageList() as $language)
                            <span class="flex items-center gap-1 rounded-full bg-purple-100 px-3 py-1 text-xs font-medium text-purple-700">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20"><path d="M7 4a1 1 0 011 1v1h4V5a1 1 0 112 0v1h2a1 1 0 110 2h-1.071l-1.42 5.682A3 3 0 0110.6 17H9.4a3 3 0 01-2.909-2.318L5.071 9H4a1 1 0 110-2h2V5a1 1 0 011-1z"/></svg>
                                {{ $language }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <div class="mb-4">
                    <p class="mb-2 flex items-center gap-1.5 text-[13px] text-gray-500">
                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                        Available Days
                    </p>
                    <div class="flex gap-1.5">
                        @php $activeDays = $doctor->availability_days ?? []; @endphp
                        @foreach(['mon' => 'M', 'tue' => 'T', 'wed' => 'W', 'thu' => 'T', 'fri' => 'F', 'sat' => 'S'] as $value => $label)
                            <span
                                class="flex h-8 w-8 items-center justify-center rounded-lg text-xs font-bold {{ in_array($value, $activeDays) ? 'bg-[#52A336] text-white' : 'bg-gray-100 text-gray-300' }}"
                                title="{{ ucfirst($value) }}"
                            >{{ $label }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="mt-auto">
                    <a href="{{ booking_url() }}" @if(booking_is_external()) target="_blank" rel="noopener" @endif class="btn-lift flex w-full items-center justify-center gap-2 rounded-xl bg-[#52A336] px-8 py-2.5 text-sm font-semibold text-white shadow-lg hover:bg-[#468c2c]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                        Book Appointment
                    </a>
                    <a href="{{ route('doctors') }}" class="mt-1.5 block py-1.5 text-center text-sm font-medium text-[#1E40AF] transition-colors duration-200 hover:text-[#52A336]">
                        View Full Profile &rarr;
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-10 text-center">
        <a href="{{ route('doctors') }}" class="btn-lift inline-flex items-center gap-2 rounded-2xl bg-brand-green px-7 py-4 font-bold text-white shadow-lg hover:bg-brand-green-dark">
            Meet All Our Doctors
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
    </div>
</section>
@endif

@if($testimonials->isNotEmpty())
<section class="px-6 py-24" aria-label="Patient feedback">
    <x-section-title eyebrow="Testimonials" title="What Our Patients Say" />
    <div class="reveal-stagger mx-auto mt-12 grid max-w-5xl gap-7 md:grid-cols-2">
        @foreach($testimonials as $testimonial)
            <figure class="rounded-3xl bg-white p-8 shadow-xl" data-reveal>
                <div class="flex gap-1 text-amber-400">
                    @for($i = 0; $i < $testimonial->rating; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.77 5.82 21 7 14.14l-5-4.87 6.91-1.01z"/></svg>
                    @endfor
                </div>
                <blockquote class="mt-4 text-lg leading-7 text-[#062238]">&ldquo;{{ $testimonial->content }}&rdquo;</blockquote>
                <figcaption class="mt-4 font-semibold text-brand-blue">
                    {{ $testimonial->name }}
                    @if($testimonial->context)
                        <span class="font-normal text-[#60758d]"> &mdash; {{ $testimonial->context }}</span>
                    @endif
                </figcaption>
            </figure>
        @endforeach
    </div>
</section>
@endif

@if($latestPosts->isNotEmpty())
<section class="bg-grain relative isolate overflow-hidden bg-gradient-to-br from-white via-brand-blue-tint to-[#a9d4f5] px-6 py-14">
    <span class="pointer-events-none absolute -left-6 -top-16 select-none font-serif text-[220px] leading-none text-brand-blue-tint md:text-[280px]" aria-hidden="true">&ldquo;</span>
    <div class="relative">
        <x-section-title eyebrow="From the blog" title="Health Articles & Clinic News" copy="Read the latest updates and health advice from our practice." />
        <div class="mx-auto mt-6 h-px w-16 bg-brand-green"></div>
        <div class="reveal-stagger mx-auto mt-8 grid max-w-6xl gap-5 md:grid-cols-3">
            @foreach($latestPosts->take(3) as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
        <div class="mt-6 text-center">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 font-semibold text-brand-blue transition-transform duration-200 hover:translate-x-1">
                View All Posts
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

@if($services->isNotEmpty())
<section class="relative isolate overflow-hidden px-6 py-24" style="background-image: linear-gradient(rgba(255,255,255,.25), rgba(255,255,255,.25)), url('{{ asset('images/faq-consult.jpg') }}'); background-size: cover; background-position: center;">
    <x-section-title eyebrow="Our Services" title="Comprehensive Care for Your Whole Family" copy="From preventive care to specialist referrals, we provide a full spectrum of medical services tailored to meet the diverse needs of our community." :nowrap="true" />
    <div class="reveal-stagger mx-auto mt-10 grid max-w-6xl gap-5 md:grid-cols-3">
        @foreach($services as $service)
            <x-service-card :service="$service" />
        @endforeach
    </div>
    <div class="mt-8 text-center">
        <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 font-semibold text-brand-blue transition-transform duration-200 hover:translate-x-1">
            View All Services
            <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>
@endif

@if($faqs->isNotEmpty())
<section class="px-6 py-24">
    <x-section-title eyebrow="FAQ" title="Frequently Asked Questions" copy="Find answers to the most common questions about our services, booking, and policies." eyebrowClass="px-4 py-1 bg-[#EBF3FC] text-[#002B49] font-bold text-xs rounded-full uppercase tracking-wide" titleStyle="font-family: Georgia, 'Times New Roman', serif;" />
    <div class="mx-auto mt-12 grid max-w-4xl gap-4">
        @foreach($faqs as $index => $faq)
            <x-faq-item :question="$faq->question" :answer="$faq->answer" :open="$index === 0" />
        @endforeach
        <div class="text-center">
            <p class="font-semibold text-[#062238]">Have more questions? We're happy to help.</p>
            <div class="mt-5 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('faq') }}" class="btn-lift inline-flex items-center gap-2 rounded-2xl border border-black px-6 py-3 font-semibold text-black">
                    View All FAQs
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('contact') }}" class="btn-lift inline-flex items-center gap-2 rounded-2xl bg-brand-blue px-6 py-3 font-semibold text-white shadow-lg hover:bg-brand-blue-dark">
                    Contact Us
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<section class="bg-brand-green-tint px-6 py-24">
    <x-section-title eyebrow="Get in Touch" title="Visit Us or Send a Message" copy="We're always happy to hear from you. Reach out with any questions or to find out more about our services." />

    <div class="mx-auto mt-14 grid max-w-6xl gap-8 md:grid-cols-2">
        <div data-reveal>
            <div class="relative overflow-hidden rounded-3xl shadow-xl">
                <iframe
                    src="{{ setting('google_map_embed') ?: 'https://www.google.com/maps?q=' . urlencode(setting('address_suburb', 'Cringila NSW 2502, Australia')) . '&output=embed' }}"
                    class="h-[300px] w-full border-0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Map showing {{ setting('clinic_name') }} location"
                ></iframe>
                <a
                    href="https://www.google.com/maps/search/?api=1&query={{ urlencode(setting('address_suburb', 'Cringila NSW 2502')) }}"
                    target="_blank" rel="noopener"
                    class="btn-lift absolute left-4 top-4 inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2 text-sm font-semibold text-brand-blue shadow-md"
                >
                    Open in Maps
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><path d="M15 3h6v6M10 14 21 3"/></svg>
                </a>
            </div>

            <div class="mt-6 rounded-3xl bg-white p-6 shadow-xl">
                <div class="grid gap-5">
                    <div class="flex items-start gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-blue-tint text-brand-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        </span>
                        <div>
                            <p class="text-sm text-[#60758d]">Address</p>
                            <p class="font-semibold text-[#062238]">{{ setting('address_line1') }}, {{ setting('address_suburb') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-blue-tint text-brand-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </span>
                        <div>
                            <p class="text-sm text-[#60758d]">Phone</p>
                            <p class="font-semibold text-[#062238]">{{ setting('phone') }}</p>
                        </div>
                    </div>
                    @if(setting('fax'))
                        <div class="flex items-start gap-4">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-blue-tint text-brand-blue">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                            </span>
                            <div>
                                <p class="text-sm text-[#60758d]">Fax</p>
                                <p class="font-semibold text-[#062238]">{{ setting('fax') }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="flex items-start gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-blue-tint text-brand-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/></svg>
                        </span>
                        <div>
                            <p class="text-sm text-[#60758d]">Email</p>
                            <p class="font-semibold text-[#062238]">{{ setting('contact_email') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-blue-tint text-brand-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                        </span>
                        <div>
                            <p class="text-sm text-[#60758d]">Opening Hours</p>
                            <p class="whitespace-pre-line font-semibold text-[#062238]">{{ setting('opening_hours') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-3xl bg-white p-8 shadow-xl" data-reveal>
            <h2 class="font-serif text-3xl font-bold">Send Us a Message</h2>

            @if(session('status'))
                <div class="mt-5 rounded-xl bg-emerald-50 p-4 text-emerald-800">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}" class="mt-7 grid gap-5">
                @csrf
                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block">
                        <span class="font-semibold text-[#062238]">Full Name *</span>
                        <input type="text" name="name" value="{{ old('name') }}" required class="mt-2 w-full rounded-xl border border-slate-200 p-4 focus:border-brand-blue focus:outline-none" placeholder="John Smith">
                        @error('name')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
                    </label>
                    <label class="block">
                        <span class="font-semibold text-[#062238]">Email Address *</span>
                        <input type="email" name="email" value="{{ old('email') }}" required class="mt-2 w-full rounded-xl border border-slate-200 p-4 focus:border-brand-blue focus:outline-none" placeholder="john@email.com">
                        @error('email')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
                    </label>
                </div>
                <label class="block">
                    <span class="font-semibold text-[#062238]">Phone Number</span>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="mt-2 w-full rounded-xl border border-slate-200 p-4 focus:border-brand-blue focus:outline-none" placeholder="0400 000 000">
                </label>
                <label class="block">
                    <span class="font-semibold text-[#062238]">Message *</span>
                    <textarea name="message" required class="mt-2 min-h-32 w-full rounded-xl border border-slate-200 p-4 focus:border-brand-blue focus:outline-none" placeholder="How can we help you?">{{ old('message') }}</textarea>
                    @error('message')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
                </label>

                <p class="flex items-start gap-2 rounded-xl bg-amber-50 p-4 text-sm text-amber-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
                    This form is not for medical emergencies. If this is an emergency, call <strong>000</strong> immediately.
                </p>

                <button type="submit" class="btn-lift flex w-full items-center justify-center gap-2 rounded-xl bg-brand-blue-darker px-6 py-4 font-bold text-white hover:bg-brand-blue-dark">
                    Send Message
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                </button>
            </form>
        </div>
    </div>
</section>

@endsection
