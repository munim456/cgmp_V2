@extends('layouts.admin')

@section('title', 'Announcements')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.announcements.create') }}" class="rounded-lg bg-brand-blue px-4 py-2 text-sm font-semibold text-white">+ New Announcement</a>
</div>

<div class="overflow-hidden rounded-xl bg-white shadow-sm">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-50 text-gray-500">
            <tr><th class="p-4">Message</th><th class="p-4">Type</th><th class="p-4">Active</th><th class="p-4"></th></tr>
        </thead>
        <tbody class="divide-y">
            @foreach($announcements as $announcement)
                <tr>
                    <td class="p-4">{{ \Illuminate\Support\Str::limit($announcement->message, 80) }}</td>
                    <td class="p-4 capitalize">{{ $announcement->type }}</td>
                    <td class="p-4">{{ $announcement->is_active ? 'Yes' : 'No' }}</td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.announcements.edit', $announcement) }}" class="font-semibold text-brand-blue">Edit</a>
                        <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST" class="inline" onsubmit="return confirm('Delete this announcement?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="ml-3 font-semibold text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
