@props(['doctor'])

<div class="doctor-card flex flex-col rounded-[22px] bg-white p-7 transition-all duration-300 ease-out hover:-translate-y-1" data-reveal>
    <div class="mb-5 flex flex-col items-center text-center">
        <div class="relative h-24 w-24 shrink-0">
            <div class="avatar-ring-spin absolute -inset-[3px] rounded-full"></div>
            <div class="avatar-glow relative flex h-24 w-24 items-center justify-center overflow-hidden rounded-full bg-gradient-to-br from-blue-400 to-blue-600 text-2xl font-bold text-white">
                @if($doctor->photo)
                    <img src="{{ image_url($doctor->photo) }}" alt="{{ $doctor->name }}" class="h-full w-full object-cover">
                @else
                    {{ collect(explode(' ', $doctor->name))->map(fn ($w) => mb_substr($w, 0, 1))->implode('') }}
                @endif
            </div>
        </div>
        <h3 style="{{ text_style($doctor->text_styles, 'name') }}" class="mt-4 text-lg font-bold text-[#002B49]">{{ $doctor->name }}</h3>
        <p style="{{ text_style($doctor->text_styles, 'qualifications') }}" class="mt-1 text-[13px] font-semibold text-[#4A8B2C]">{{ $doctor->qualifications }}</p>
        <p style="{{ text_style($doctor->text_styles, 'role') }}" class="text-[13px] text-gray-500">{{ $doctor->role }}</p>
    </div>

    @if($doctor->bio)
        <p style="{{ text_style($doctor->text_styles, 'bio') }}" class="mb-4 line-clamp-2 text-sm leading-relaxed text-gray-500">{{ $doctor->bio }}</p>
    @endif

    @if($doctor->years_experience || $doctor->languageList())
        <div class="mb-4 flex flex-wrap justify-center gap-2">
            @if($doctor->years_experience)
                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">{{ $doctor->years_experience }}</span>
            @endif
            @foreach($doctor->languageList() as $language)
                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700">
                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m5 8 6 6"/><path d="m4 14 6-6 2-3"/><path d="M2 5h12"/><path d="M7 2h1"/><path d="m22 22-5-10-5 10"/><path d="M14 18h6"/></svg>
                    {{ $language }}
                </span>
            @endforeach
        </div>
    @endif

    <div class="mb-4">
        <div class="flex justify-center gap-1.5">
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
