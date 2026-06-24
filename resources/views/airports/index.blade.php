@extends('layouts.app')

@section('title', 'Airports — SalahPort')
@section('meta_description', 'Browse airports worldwide and find prayer rooms, wudu facilities, and prayer times for Muslim travelers.')

@section('content')
    <div class="bg-salahport-light py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Airports</h1>
            <p class="mt-2 text-salahport-muted">Find prayer facilities at airports around the world.</p>

            <form action="{{ route('airports.index') }}" method="GET" class="mt-6 flex max-w-xl overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                <input type="search" name="q" value="{{ $search }}" placeholder="Search airport or city..." class="flex-1 border-0 px-4 py-3 text-sm focus:outline-none focus:ring-0">
                <button type="submit" class="bg-salahport-green px-6 text-sm font-semibold text-white hover:bg-salahport-green-hover">Search</button>
            </form>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <div class="grid gap-4 sm:grid-cols-2">
                    @forelse ($airports as $airport)
                        <x-airport-card :airport="$airport" />
                    @empty
                        <p class="col-span-2 text-salahport-muted">No airports found for "{{ $search }}".</p>
                    @endforelse
                </div>
                <div class="mt-8">{{ $airports->links() }}</div>
            </div>
            <aside>
                <x-airport-map :airports="$mapAirports" height="h-80" />
            </aside>
        </div>
    </div>
@endsection
