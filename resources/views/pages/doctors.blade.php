@extends('layouts.public')

@section('title', 'Our Doctors')

@section('content')
<section class="bg-gradient-to-r from-brand-blue-darker via-brand-blue-dark to-brand-blue px-6 py-16 text-center">
    <h1 class="font-serif text-3xl font-bold text-white md:text-4xl">Our Doctors</h1>
    <p class="mx-auto mt-3 max-w-2xl text-base text-white/85 md:text-lg">Meet the experienced, multilingual team dedicated to your care.</p>
</section>

<section class="bg-white px-6 py-24">
    <x-section-title eyebrow="Meet Our Doctors" title="Expert Care from Experienced Practitioners" copy="Our multilingual team of GPs bring a wealth of experience and compassion to every consultation." :nowrap="true" />

    <div class="reveal-stagger mx-auto mt-14 grid max-w-6xl gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach($doctors as $doctor)
            <x-doctor-card :doctor="$doctor" />
        @endforeach
    </div>
</section>
@endsection
