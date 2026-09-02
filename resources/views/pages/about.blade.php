@extends('layouts.public')

@section('title', 'About Us')

@section('content')
<section class="px-6 py-24">
    <x-section-title eyebrow="About Us" :title="$about['heading'] ?? 'Healthcare for Every Generation'" :copy="setting('tagline')" />

    <div class="mx-auto mt-16 grid max-w-6xl gap-8 md:grid-cols-2">
        <div class="rounded-3xl bg-brand-blue p-10 text-white">
            <h2 class="font-serif text-3xl font-bold">Trusted care, close to home</h2>
            <div class="prose mt-5 leading-8 text-blue-50">{!! $about['body'] ?? '' !!}</div>
        </div>
        <div class="rounded-3xl bg-brand-green-tint p-10">
            <h2 class="font-serif text-3xl font-bold">What to expect</h2>
            @if(!empty($about['points']))
                <ul class="mt-5 grid gap-3">
                    @foreach($about['points'] as $point)
                        <li class="flex items-center gap-3 leading-7 text-[#45627d]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-brand-green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                            {{ $point }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    @if(!empty($about['stats']))
        @php
            $statsColsClass = match (min(count($about['stats']), 4)) {
                1 => 'sm:grid-cols-1',
                2 => 'sm:grid-cols-2',
                3 => 'sm:grid-cols-3',
                default => 'sm:grid-cols-4',
            };
        @endphp
        <div class="mx-auto mt-14 grid max-w-3xl gap-6 rounded-3xl bg-brand-blue-tint p-8 {{ $statsColsClass }}">
            @foreach($about['stats'] as $stat)
                <div class="text-center" data-reveal>
                    <p class="font-serif text-4xl font-bold text-brand-blue">
                        <span data-count-to="{{ $stat['value'] }}" data-count-suffix="{{ $stat['suffix'] ?? '' }}">0{{ $stat['suffix'] ?? '' }}</span>
                    </p>
                    <p class="mt-1 text-sm font-semibold text-[#45627d]">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    @endif

    @if($doctors->isNotEmpty())
        <div class="mx-auto mt-20 max-w-6xl">
            <x-section-title eyebrow="Our Team" title="Meet Our Doctors" />
            <div class="mt-12 grid gap-8 md:grid-cols-2">
                @foreach($doctors as $doctor)
                    <div class="rounded-3xl bg-white p-8 text-center shadow-xl">
                        <div class="mx-auto flex h-28 w-28 items-center justify-center rounded-full bg-brand-blue-tint font-serif text-4xl text-brand-blue overflow-hidden">
                            @if($doctor->photo)
                                <img src="{{ image_url($doctor->photo) }}" alt="{{ $doctor->name }}" class="h-full w-full object-cover">
                            @else
                                {{ collect(explode(' ', $doctor->name))->map(fn ($w) => mb_substr($w, 0, 1))->implode('') }}
                            @endif
                        </div>
                        <h3 class="mt-5 font-serif text-2xl font-bold">{{ $doctor->name }}</h3>
                        <p class="mt-2 text-brand-blue">{{ $doctor->qualifications }}</p>
                        <p class="text-[#60758d]">{{ $doctor->role }}</p>
                        @if($doctor->bio)
                            <p class="mt-4 text-sm leading-6 text-[#60758d]">{{ $doctor->bio }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection
