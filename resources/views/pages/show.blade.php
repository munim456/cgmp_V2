@extends('layouts.public')

@section('title', $page->meta_title ?: $page->title)
@section('meta_description', $page->meta_description)

@section('content')
<section class="px-6 py-24">
    <div class="mx-auto max-w-3xl">
        <x-section-title eyebrow="Information" :title="$page->title" />
        <div class="prose mt-10 leading-8 text-[#45627d]">
            {!! $page->body !!}
        </div>
    </div>
</section>
@endsection
