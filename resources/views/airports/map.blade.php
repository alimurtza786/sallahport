@extends('layouts.app')

@section('title', 'Airport Map — SalahPort')
@section('meta_description', 'Explore airports worldwide on an interactive map and find Muslim prayer facilities.')

@section('content')
    <div class="bg-salahport-light py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Explore Airports on Map</h1>
            <p class="mt-2 text-salahport-muted">Interactive map of airports with Muslim traveler facilities.</p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <x-airport-map :airports="$airports" height="h-[500px]" :zoom="2" />
        <div class="mt-8 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($airports as $airport)
                <a href="{{ route('airports.show', $airport) }}" class="rounded-lg border border-salahport-border bg-white p-4 transition hover:border-salahport-green hover:shadow-sm">
                    <p class="font-semibold text-gray-900">{{ $airport->name }}</p>
                    <p class="text-sm text-salahport-muted">{{ $airport->code }} · {{ $airport->city }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection
