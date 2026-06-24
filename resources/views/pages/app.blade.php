@extends('layouts.app')

@section('title', 'Download SalahPort App — Coming Soon')
@section('meta_description', 'Download the SalahPort mobile app for airport prayer rooms, wudu facilities, and prayer times on the go.')

@section('content')
    <div class="mx-auto max-w-2xl px-4 py-16 text-center sm:px-6">
        <h1 class="text-3xl font-bold text-gray-900">SalahPort Mobile App</h1>
        <p class="mt-4 text-lg text-salahport-muted">Never miss a salah while traveling — right from your pocket.</p>
        <p class="mt-6 text-gray-600">Our mobile app is coming soon to iOS and Android. Get prayer room locations, wudu facilities, prayer times, and community updates for airports worldwide.</p>
        <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <div class="inline-flex items-center gap-3 rounded-xl border border-salahport-border bg-white px-6 py-4 opacity-60">
                <span class="text-2xl">🍎</span>
                <div class="text-left">
                    <p class="text-xs text-salahport-muted">Coming to</p>
                    <p class="font-semibold text-gray-900">App Store</p>
                </div>
            </div>
            <div class="inline-flex items-center gap-3 rounded-xl border border-salahport-border bg-white px-6 py-4 opacity-60">
                <span class="text-2xl">▶</span>
                <div class="text-left">
                    <p class="text-xs text-salahport-muted">Coming to</p>
                    <p class="font-semibold text-gray-900">Google Play</p>
                </div>
            </div>
        </div>
        @include('partials.newsletter')
    </div>
@endsection
