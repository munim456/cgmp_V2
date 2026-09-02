@extends('layouts.public')

@section('title', 'Contact Us')

@section('content')
<section class="bg-brand-green-tint px-6 py-24">
    <x-section-title eyebrow="Get in Touch" title="Visit Us or Send a Message" copy="We're always happy to hear from you. Reach out with any questions or to find out more about our services." />

    <div class="mx-auto mt-14 grid max-w-6xl gap-8 md:grid-cols-2">
        <div>
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
                    class="absolute left-4 top-4 inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2 text-sm font-semibold text-brand-blue shadow-md"
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

        <div class="rounded-3xl bg-white p-8 shadow-xl">
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
