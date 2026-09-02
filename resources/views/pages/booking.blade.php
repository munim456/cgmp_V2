@extends('layouts.public')

@section('title', 'Book Appointment')

@section('content')
<section class="px-6 py-24">
    <x-section-title eyebrow="Book Appointment" title="Book Your Visit" copy="Book online with HealthEngine, call the practice, or simply walk in." />

    <div class="mx-auto mt-14 max-w-4xl">
        @if(setting('healthengine_url'))
            <div class="overflow-hidden rounded-3xl border border-slate-200 shadow-xl">
                <iframe src="{{ setting('healthengine_url') }}" title="Book an appointment" class="h-[650px] w-full border-0" loading="lazy"></iframe>
            </div>
        @else
            <div class="rounded-3xl bg-brand-blue-tint p-10 text-center">
                <h2 class="font-serif text-2xl font-bold text-[#062238]">Online booking coming soon</h2>
                <p class="mt-4 leading-7 text-[#45627d]">Our online booking widget isn't connected yet. In the meantime, please call the practice to book, or simply walk in — we're open five days a week.</p>
                <a href="tel:{{ preg_replace('/\s+/', '', setting('phone', '')) }}" class="mt-7 inline-flex items-center gap-3 rounded-2xl bg-brand-blue px-7 py-4 font-bold text-white shadow-lg hover:bg-brand-blue-dark transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    Call {{ setting('phone') }}
                </a>
            </div>
        @endif

        <div class="mt-8 rounded-2xl bg-amber-50 p-6 text-amber-900">
            <p class="font-semibold">Walk-ins welcome</p>
            <p class="mt-1 text-sm leading-6">We're open five days a week with same-day appointments available. If you can't book online, you're welcome to walk in.</p>
        </div>
    </div>
</section>
@endsection
