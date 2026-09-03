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
</section>
@endsection
