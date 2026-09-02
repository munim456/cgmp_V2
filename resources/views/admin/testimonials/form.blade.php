@extends('layouts.admin')

@section('title', $testimonial->exists ? 'Edit Testimonial' : 'New Testimonial')

@section('content')
<form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" class="max-w-2xl rounded-xl bg-white p-6 shadow-sm">
    @csrf
    @if($testimonial->exists) @method('PUT') @endif

    <div class="grid gap-5">
        <label class="block">
            <span class="text-sm font-semibold">Name *</span>
            <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required class="mt-1 w-full rounded-lg border-gray-300">
        </label>

        <label class="block">
            <span class="text-sm font-semibold">Context <span class="text-gray-400">(e.g. "Patient since 2019")</span></span>
            <input type="text" name="context" value="{{ old('context', $testimonial->context) }}" class="mt-1 w-full rounded-lg border-gray-300">
        </label>

        <label class="block">
            <span class="text-sm font-semibold">Testimonial *</span>
            <textarea name="content" required class="mt-1 w-full rounded-lg border-gray-300" rows="4">{{ old('content', $testimonial->content) }}</textarea>
        </label>

        <label class="block">
            <span class="text-sm font-semibold">Rating</span>
            <select name="rating" class="mt-1 w-32 rounded-lg border-gray-300">
                @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" @selected(old('rating', $testimonial->rating ?? 5) == $i)>{{ $i }}</option>
                @endfor
            </select>
        </label>

        <label class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $testimonial->is_active ?? true)) class="rounded border-gray-300">
            <span class="text-sm font-semibold">Active</span>
        </label>
    </div>

    <div class="mt-6 flex gap-3">
        <button type="submit" class="rounded-lg bg-brand-blue px-5 py-2 font-semibold text-white">Save</button>
        <a href="{{ route('admin.testimonials.index') }}" class="rounded-lg border px-5 py-2 font-semibold">Cancel</a>
    </div>
</form>
@endsection
