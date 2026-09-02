@extends('layouts.admin')

@section('title', 'Homepage Sections')

@section('content')
<div class="grid gap-8">
    <div class="rounded-xl bg-white p-6 shadow-sm">
        <h2 class="text-lg font-bold">Hero Section</h2>
        <form method="POST" action="{{ route('admin.sections.hero') }}" enctype="multipart/form-data" class="mt-4 grid gap-4">
            @csrf @method('PUT')
            <label class="block">
                <span class="text-sm font-semibold">Heading *</span>
                <input type="text" name="heading" value="{{ old('heading', $hero['heading'] ?? '') }}" required class="mt-1 w-full rounded-lg border-gray-300">
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Subheading</span>
                <textarea name="subheading" class="mt-1 w-full rounded-lg border-gray-300" rows="2">{{ old('subheading', $hero['subheading'] ?? '') }}</textarea>
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Badge text</span>
                <input type="text" name="badge_text" value="{{ old('badge_text', $hero['badge_text'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
            </label>
            <div class="grid grid-cols-2 gap-4">
                <label class="block">
                    <span class="text-sm font-semibold">Primary button text</span>
                    <input type="text" name="primary_button_text" value="{{ old('primary_button_text', $hero['primary_button_text'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
                </label>
                <label class="block">
                    <span class="text-sm font-semibold">Primary button link</span>
                    <input type="text" name="primary_button_link" value="{{ old('primary_button_link', $hero['primary_button_link'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
                </label>
                <label class="block">
                    <span class="text-sm font-semibold">Secondary button text</span>
                    <input type="text" name="secondary_button_text" value="{{ old('secondary_button_text', $hero['secondary_button_text'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
                </label>
                <label class="block">
                    <span class="text-sm font-semibold">Secondary button link</span>
                    <input type="text" name="secondary_button_link" value="{{ old('secondary_button_link', $hero['secondary_button_link'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
                </label>
            </div>
            <label class="block">
                <span class="text-sm font-semibold">Hero image</span>
                <input type="file" name="image" accept="image/*" class="mt-1 w-full">
                @if(!empty($hero['image']))
                    <img src="{{ image_url($hero['image']) }}" class="mt-2 h-24 rounded-lg object-cover" alt="">
                @endif
            </label>
            <div><button type="submit" class="rounded-lg bg-brand-blue px-5 py-2 font-semibold text-white">Save Hero</button></div>
        </form>
    </div>

    <div class="rounded-xl bg-white p-6 shadow-sm">
        <h2 class="text-lg font-bold">About Section</h2>
        <form method="POST" action="{{ route('admin.sections.about') }}" enctype="multipart/form-data" class="mt-4 grid gap-4">
            @csrf @method('PUT')
            <label class="block">
                <span class="text-sm font-semibold">Heading *</span>
                <input type="text" name="heading" value="{{ old('heading', $about['heading'] ?? '') }}" required class="mt-1 w-full rounded-lg border-gray-300">
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Body</span>
                <x-trix-field name="body" :value="$about['body'] ?? ''" id="about-body" />
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Key points <span class="text-gray-400">(one per line)</span></span>
                <textarea name="points" class="mt-1 w-full rounded-lg border-gray-300" rows="3">{{ old('points', implode("\n", $about['points'] ?? [])) }}</textarea>
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Image</span>
                <input type="file" name="image" accept="image/*" class="mt-1 w-full">
                @if(!empty($about['image']))
                    <img src="{{ image_url($about['image']) }}" class="mt-2 h-24 rounded-lg object-cover" alt="">
                @endif
            </label>
            <div><button type="submit" class="rounded-lg bg-brand-blue px-5 py-2 font-semibold text-white">Save About</button></div>
        </form>
    </div>

    <div class="rounded-xl bg-white p-6 shadow-sm">
        <h2 class="text-lg font-bold">Booking Strip (CTA above footer)</h2>
        <form method="POST" action="{{ route('admin.sections.booking-strip') }}" class="mt-4 grid gap-4">
            @csrf @method('PUT')
            <label class="block">
                <span class="text-sm font-semibold">Heading *</span>
                <input type="text" name="heading" value="{{ old('heading', $bookingStrip['heading'] ?? '') }}" required class="mt-1 w-full rounded-lg border-gray-300">
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Text</span>
                <textarea name="text" class="mt-1 w-full rounded-lg border-gray-300" rows="2">{{ old('text', $bookingStrip['text'] ?? '') }}</textarea>
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Button text</span>
                <input type="text" name="button_text" value="{{ old('button_text', $bookingStrip['button_text'] ?? '') }}" class="mt-1 w-full rounded-lg border-gray-300">
            </label>
            <div><button type="submit" class="rounded-lg bg-brand-blue px-5 py-2 font-semibold text-white">Save Booking Strip</button></div>
        </form>
    </div>
</div>
@endsection
