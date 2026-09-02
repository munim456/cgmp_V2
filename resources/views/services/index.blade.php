@extends('layouts.public')

@section('title', 'Our Services')

@section('content')
<section class="bg-brand-green-tint px-6 py-24">
    <x-section-title eyebrow="Our Services" title="Comprehensive Care for Your Whole Family" copy="From preventive care to specialist referrals, we provide a full spectrum of medical services tailored to our community." :nowrap="true" />
    <div class="mx-auto mt-14 grid max-w-6xl gap-7 md:grid-cols-3">
        @foreach($services as $service)
            <x-service-card :service="$service" />
        @endforeach
    </div>
</section>
@endsection
