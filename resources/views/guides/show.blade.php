@extends('layouts.app')

@section('title', $guide->title.' — SalahPort')
@section('meta_description', $guide->excerpt)
@section('og_image', \App\Support\MediaStorage::url($guide->image, 1200, 630))

@section('content')
    <article class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
        <nav class="mb-6 text-sm text-salahport-muted">
            <a href="{{ route('home') }}" class="hover:text-salahport-green">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('guides.index') }}" class="hover:text-salahport-green">Guides</a>
        </nav>

        <img src="{{ \App\Support\MediaStorage::url($guide->image, 1200, 512) }}" alt="{{ $guide->title }}" class="mb-8 h-64 w-full rounded-xl object-cover" loading="lazy">
        <h1 class="text-3xl font-bold text-gray-900">{{ $guide->title }}</h1>
        <p class="mt-2 text-sm text-salahport-muted">{{ $guide->read_time }} · {{ $guide->published_at?->format('M d, Y') }}</p>

        <div class="prose prose-green mt-8 max-w-none text-gray-600">
            {!! $guide->body !!}
        </div>

        <div class="mt-10 rounded-xl border border-salahport-border bg-salahport-light p-6">
            <p class="font-semibold text-gray-900">Looking for prayer facilities?</p>
            <p class="mt-2 text-sm text-salahport-muted">Browse our airport directory to find prayer rooms and wudu facilities.</p>
            <a href="{{ route('airports.index') }}" class="mt-4 inline-block text-sm font-semibold text-salahport-green hover:underline">Browse airports &rarr;</a>
        </div>
    </article>
@endsection
