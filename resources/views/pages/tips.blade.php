@extends('layouts.app')

@section('title', 'Muslim Traveler Tips — SalahPort')
@section('meta_description', 'Essential tips for Muslim travelers — halal food, wudu facilities, prayer times, and family-friendly airport advice.')

@section('content')
    <div class="bg-salahport-light py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Muslim Traveler Tips</h1>
            <p class="mt-2 text-salahport-muted">Practical advice for a smooth and spiritually fulfilling journey.</p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-6 sm:grid-cols-2">
            @foreach ([
                ['title' => 'Halal Food', 'desc' => 'Research halal dining options before you travel. Major hubs like DXB, IST, and DOH offer excellent halal food courts.'],
                ['title' => 'Wudu Facilities', 'desc' => 'Locate wudu areas near prayer rooms. Carry a small travel towel and prayer mat for convenience.'],
                ['title' => 'Best Time to Pray', 'desc' => 'Prayer rooms are busiest during peak flight times. Allow 15–20 minutes before boarding for salah and wudu.'],
                ['title' => 'Family Friendly', 'desc' => 'Look for airports with family prayer rooms. Terminal 3 at DXB has dedicated family-friendly facilities.'],
                ['title' => 'Prayer Times While Flying', 'desc' => 'Use SalahPort prayer times for your destination city. Consult your airline about prayer during flight.'],
                ['title' => 'Community Updates', 'desc' => 'Check community updates on SalahPort for the latest information from fellow travelers before your trip.'],
            ] as $tip)
                <div class="rounded-xl border border-salahport-border bg-white p-6 shadow-sm">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-salahport-green/10">
                        <svg class="h-5 w-5 text-salahport-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h2 class="mt-4 text-lg font-semibold text-gray-900">{{ $tip['title'] }}</h2>
                    <p class="mt-2 text-sm leading-relaxed text-salahport-muted">{{ $tip['desc'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-10 text-center">
            <a href="{{ route('guides.index') }}" class="text-sm font-semibold text-salahport-green hover:underline">Read our full travel guides &rarr;</a>
        </div>
    </div>
@endsection
