@extends('layouts.public')

@section('title', 'Emergency & After-Hours Care')

@section('content')
<section class="bg-gradient-to-b from-red-800 to-red-900 px-6 py-20 text-center text-white">
    <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-4 py-2 text-xs font-bold uppercase tracking-wide">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
        Emergency Information
    </span>
    <h1 class="mt-6 font-serif text-4xl font-bold md:text-5xl">In an Emergency?</h1>
    <p class="mx-auto mt-4 max-w-2xl text-red-50">{{ setting('emergency_note', 'If you are experiencing a life-threatening emergency, call 000 immediately.') }}</p>
    <a href="tel:000" class="btn-lift mt-8 inline-flex items-center gap-3 rounded-2xl bg-white px-7 py-4 font-bold text-red-700 shadow-lg hover:bg-red-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        Call 000 Now
    </a>
</section>

<section class="px-6 py-16">
    <div class="mx-auto max-w-4xl overflow-hidden rounded-2xl border border-[#e7edf3] shadow-sm">
        <div class="flex items-center gap-3 bg-red-600 px-6 py-4 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            <h2 class="font-serif text-lg font-bold">Emergency Numbers</h2>
        </div>
        <div class="grid gap-4 p-6 sm:grid-cols-2">
            @foreach([
                ['Emergency Services (Police/Ambulance/Fire)', '000', 'border-red-100 bg-red-50 text-red-700'],
                ['After-Hours GP (13 SICK)', '13 7425', 'border-amber-100 bg-amber-50 text-amber-700'],
                ['Poisons Information Centre', '13 11 26', 'border-purple-100 bg-purple-50 text-purple-700'],
                ['Mental Health Crisis Line', '1800 011 511', 'border-blue-100 bg-blue-50 text-blue-700'],
                ['Lifeline (24/7 crisis support)', '13 11 14', 'border-green-100 bg-green-50 text-green-700'],
            ] as [$label, $number, $classes])
                <div class="flex items-center justify-between gap-3 rounded-xl border px-4 py-3 {{ $classes }}">
                    <span class="text-sm font-medium">{{ $label }}</span>
                    <span class="font-bold">{{ $number }}</span>
                </div>
            @endforeach
            <div class="flex items-center justify-between gap-3 rounded-xl border border-brand-blue-tint bg-brand-blue-tint px-4 py-3 text-brand-blue">
                <span class="text-sm font-medium">Our Practice</span>
                <a href="tel:{{ preg_replace('/\s+/', '', setting('phone', '')) }}" class="font-bold hover:underline">{{ setting('phone') }}</a>
            </div>
        </div>
    </div>

    <div class="mx-auto mt-8 max-w-4xl rounded-2xl border border-[#e7edf3] p-6 shadow-sm sm:p-8">
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
            <h2 class="font-serif text-lg font-bold text-[#062238]">After-Hours Care</h2>
        </div>
        <p class="mt-3 text-[#45627d]">When our clinic is closed and you need medical attention that is not life-threatening, you have several options:</p>
        <div class="mt-5 grid gap-3">
            @foreach([
                ['13 SICK (National Home Doctor Service)', 'Call 13 7425 for a GP to visit your home after hours. Available nights, weekends, and public holidays.'],
                ['Urgent Care Centres', 'For non-life-threatening conditions requiring prompt attention, your nearest urgent care centre can help.'],
                ['Hospital Emergency Departments', 'For serious conditions requiring immediate hospital care, go to your nearest hospital emergency department.'],
                ['Telehealth Services', 'Some telehealth services are available after hours. Call HealthDirect on 1800 022 222 for guidance.'],
            ] as [$title, $body])
                <div class="flex items-start gap-3 rounded-xl bg-brand-green-tint px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0 text-brand-green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m22 4-10 10-3-3"/></svg>
                    <span>
                        <span class="block font-bold text-[#062238]">{{ $title }}</span>
                        <span class="text-sm text-[#45627d]">{{ $body }}</span>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
