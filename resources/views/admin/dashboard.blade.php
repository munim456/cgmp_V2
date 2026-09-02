@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid gap-6 md:grid-cols-3">
    <div class="rounded-xl bg-white p-6 shadow-sm">
        <p class="text-sm text-gray-500">Unread Messages</p>
        <p class="mt-2 text-3xl font-bold">{{ $unreadMessages }}</p>
        <a href="{{ route('admin.messages.index') }}" class="mt-3 inline-block text-sm font-semibold text-brand-blue">View messages &rarr;</a>
    </div>
    <div class="rounded-xl bg-white p-6 shadow-sm">
        <p class="text-sm text-gray-500">Total Messages</p>
        <p class="mt-2 text-3xl font-bold">{{ $totalMessages }}</p>
    </div>
    <div class="rounded-xl bg-white p-6 shadow-sm">
        <p class="text-sm text-gray-500">Quick Links</p>
        <div class="mt-3 flex flex-col gap-2 text-sm">
            <a href="{{ route('admin.posts.create') }}" class="font-semibold text-brand-blue">+ New blog post</a>
            <a href="{{ route('admin.sections.edit') }}" class="font-semibold text-brand-blue">Edit homepage content</a>
            <a href="{{ route('admin.settings.edit') }}" class="font-semibold text-brand-blue">Edit site settings</a>
        </div>
    </div>
</div>

<div class="mt-8 rounded-xl bg-white p-6 shadow-sm">
    <h2 class="text-lg font-bold">Recent Blog Posts</h2>
    <table class="mt-4 w-full text-left text-sm">
        <thead class="text-gray-500">
            <tr><th class="pb-2">Title</th><th class="pb-2">Status</th><th class="pb-2">Updated</th></tr>
        </thead>
        <tbody class="divide-y">
            @forelse($recentPosts as $post)
                <tr>
                    <td class="py-2"><a href="{{ route('admin.posts.edit', $post) }}" class="font-semibold text-brand-blue">{{ $post->title }}</a></td>
                    <td class="py-2 capitalize">{{ $post->status }}</td>
                    <td class="py-2">{{ $post->updated_at->diffForHumans() }}</td>
                </tr>
            @empty
                <tr><td colspan="3" class="py-4 text-gray-500">No posts yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
