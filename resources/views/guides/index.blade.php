@extends('layouts.app')

@section('title', 'Travel Guides — SalahPort')
@section('meta_description', 'Helpful guides for Muslim travelers — prayer rooms, wudu facilities, halal food, and more.')

@section('content')
    <div class="bg-salahport-light py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Helpful Guides</h1>
            <p class="mt-2 text-salahport-muted">Practical tips and guides for Muslim travelers at airports worldwide.</p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($guides as $guide)
                <a href="{{ route('guides.show', $guide) }}" class="group overflow-hidden rounded-xl border border-salahport-border bg-white shadow-sm transition hover:shadow-md">
                    <div class="aspect-[16/10] overflow-hidden bg-gray-100">
                        <img src="{{ \App\Support\MediaStorage::url($guide->image, 640, 480) }}" alt="{{ $guide->title }}" class="h-full w-full object-cover transition group-hover:scale-105" loading="lazy">
                    </div>
                    <div class="p-5">
                        <h2 class="font-semibold text-gray-900 group-hover:text-salahport-green">{{ $guide->title }}</h2>
                        <p class="mt-2 line-clamp-2 text-sm text-salahport-muted">{{ $guide->excerpt }}</p>
                        <p class="mt-3 text-xs text-salahport-muted">{{ $guide->read_time }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-8">{{ $guides->links() }}</div>
    </div>
@endsection
