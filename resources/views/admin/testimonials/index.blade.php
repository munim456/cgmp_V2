@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.testimonials.create') }}" class="rounded-lg bg-brand-blue px-4 py-2 text-sm font-semibold text-white">+ New Testimonial</a>
</div>

<div class="overflow-hidden rounded-xl bg-white shadow-sm">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-50 text-gray-500">
            <tr><th class="p-4">Name</th><th class="p-4">Rating</th><th class="p-4">Active</th><th class="p-4"></th></tr>
        </thead>
        <tbody class="divide-y">
            @foreach($testimonials as $testimonial)
                <tr>
                    <td class="p-4 font-semibold">{{ $testimonial->name }}</td>
                    <td class="p-4">{{ $testimonial->rating }}/5</td>
                    <td class="p-4">{{ $testimonial->is_active ? 'Yes' : 'No' }}</td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="font-semibold text-brand-blue">Edit</a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Delete this testimonial?')">
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
