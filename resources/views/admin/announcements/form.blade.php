@extends('layouts.admin')

@section('title', $announcement->exists ? 'Edit Announcement' : 'New Announcement')

@section('content')
<form method="POST" action="{{ $announcement->exists ? route('admin.announcements.update', $announcement) : route('admin.announcements.store') }}" class="max-w-2xl rounded-xl bg-white p-6 shadow-sm">
    @csrf
    @if($announcement->exists) @method('PUT') @endif

    <div class="grid gap-5">
        <label class="block">
            <span class="text-sm font-semibold">Message *</span>
            <textarea name="message" required class="mt-1 w-full rounded-lg border-gray-300" rows="3">{{ old('message', $announcement->message) }}</textarea>
            @error('message')<span class="text-sm text-red-600">{{ $message }}</span>@enderror
        </label>

        <label class="block">
            <span class="text-sm font-semibold">Type</span>
            <select name="type" class="mt-1 w-full rounded-lg border-gray-300">
                <option value="info" @selected(old('type', $announcement->type ?? 'info') === 'info')>Info</option>
                <option value="warning" @selected(old('type', $announcement->type) === 'warning')>Warning</option>
            </select>
        </label>

        <div class="grid grid-cols-2 gap-4">
            <label class="block">
                <span class="text-sm font-semibold">Starts at</span>
                <input type="datetime-local" name="starts_at" value="{{ old('starts_at', $announcement->starts_at?->format('Y-m-d\TH:i')) }}" class="mt-1 w-full rounded-lg border-gray-300">
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Ends at</span>
                <input type="datetime-local" name="ends_at" value="{{ old('ends_at', $announcement->ends_at?->format('Y-m-d\TH:i')) }}" class="mt-1 w-full rounded-lg border-gray-300">
            </label>
        </div>

        <label class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $announcement->is_active ?? true)) class="rounded border-gray-300">
            <span class="text-sm font-semibold">Active</span>
        </label>
    </div>

    <div class="mt-6 flex gap-3">
        <button type="submit" class="rounded-lg bg-brand-blue px-5 py-2 font-semibold text-white">Save</button>
        <a href="{{ route('admin.announcements.index') }}" class="rounded-lg border px-5 py-2 font-semibold">Cancel</a>
    </div>
</form>
@endsection
