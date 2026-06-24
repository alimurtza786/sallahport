@props(['airports', 'height' => 'h-44', 'zoom' => 2, 'title' => 'Explore Airports on Map'])

@php
    $mapPoints = $airports->map(function ($airport) {
        return [
            'name' => $airport->name,
            'code' => $airport->code,
            'latitude' => (float) $airport->latitude,
            'longitude' => (float) $airport->longitude,
        ];
    })->values();
@endphp

<div class="overflow-hidden rounded-xl border border-salahport-border bg-white shadow-sm">
    <div class="p-4">
        <h3 class="font-semibold text-gray-900">{{ $title }}</h3>
    </div>
    <div
        data-leaflet-map
        data-airports='@json($mapPoints)'
        data-zoom="{{ $zoom }}"
        data-lat="{{ $airports->first()?->latitude ?? 20 }}"
        data-lng="{{ $airports->first()?->longitude ?? 0 }}"
        class="{{ $height }} w-full bg-gray-100"
    ></div>
    <div class="border-t border-salahport-border p-4">
        <a href="{{ route('airports.map') }}" class="text-sm font-medium text-salahport-green hover:underline">View all airports on map &rarr;</a>
    </div>
</div>

@once
    @push('head')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    @endpush
    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @endpush
@endonce
