@extends('layouts.app')

@section('title', 'SalahPort — Never Miss a Salah While Traveling')

@push('structured_data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => 'SalahPort',
    'url' => url('/'),
    'description' => 'Find airport prayer rooms, wudu facilities, prayer times and helpful tips for Muslim travelers worldwide.',
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => route('airports.index').'?q={search_term_string}',
        'query-input' => 'required name=search_term_string',
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
    @include('partials.hero')

    <section class="border-b border-salahport-border bg-salahport-light">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-6 px-4 py-5 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center gap-8 lg:gap-12">
                @foreach ([
                    ['value' => '1000+', 'label' => 'Airports Covered'],
                    ['value' => '1500+', 'label' => 'Prayer Rooms'],
                    ['value' => '10K+', 'label' => 'Community Updates'],
                    ['value' => '50K+', 'label' => 'Travelers Helped'],
                ] as $stat)
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-salahport-green/10">
                            <svg class="h-5 w-5 text-salahport-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-lg font-bold text-gray-900">{{ $stat['value'] }}</p>
                            <p class="text-xs text-salahport-muted">{{ $stat['label'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center gap-2 rounded-xl border border-salahport-border bg-white px-4 py-2.5 shadow-sm">
                <span class="text-2xl font-bold text-gray-900">4.9</span>
                <div>
                    <div class="flex text-amber-400">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-xs text-salahport-muted">From 500+ Reviews</p>
                </div>
            </div>
        </div>
    </section>

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-3">
            <div class="space-y-10 lg:col-span-2">
                <section>
                    <div class="mb-5 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900">Popular Airports</h2>
                        <a href="{{ route('airports.index') }}" class="text-sm font-medium text-salahport-green hover:underline">View all &rarr;</a>
                    </div>
                @if ($featuredAirports->isNotEmpty())
                    <div class="grid gap-4 sm:grid-cols-2">
                        @foreach ($featuredAirports as $airport)
                            <x-airport-card :airport="$airport" />
                        @endforeach
                    </div>
                @else
                    <p class="rounded-xl border border-dashed border-salahport-border bg-white p-8 text-center text-sm text-salahport-muted">
                        No airports yet. Add airports from the <a href="{{ route('admin.login') }}" class="font-medium text-salahport-green hover:underline">admin panel</a>.
                    </p>
                @endif
            </section>

                @if ($featuredAirport)
                    @include('partials.airport-detail-preview', ['airport' => $featuredAirport])
                @endif
            </div>

            <aside class="space-y-6">
                <x-airport-map :airports="$mapAirports" />
                @if ($featuredAirport)
                    <x-prayer-times :airport="$featuredAirport" />
                    <x-qibla :degrees="$featuredAirport->qibla_degrees" />

                    <div class="rounded-xl border border-salahport-border bg-white p-5 shadow-sm">
                        <h3 class="font-semibold text-gray-900">Muslim Traveler Tips</h3>
                        <ul class="mt-4 space-y-3">
                            @foreach ($featuredAirport->travelerTips as $tip)
                                <li class="flex items-center gap-3">
                                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-salahport-green/10">
                                        <svg class="h-4 w-4 text-salahport-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-700">{{ $tip->title }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <x-community-updates :updates="$featuredAirport->communityUpdates" />
                @endif
            </aside>
        </div>
    </div>

    <section class="bg-salahport-light py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-6 flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900">Helpful Guides</h2>
                <a href="{{ route('guides.index') }}" class="text-sm font-medium text-salahport-green hover:underline">View all &rarr;</a>
            </div>
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
                @foreach ($guides as $guide)
                    <a href="{{ route('guides.show', $guide) }}" class="group overflow-hidden rounded-xl border border-salahport-border bg-white shadow-sm transition hover:shadow-md">
                        <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                            <img src="{{ \App\Support\MediaStorage::url($guide->image, 640, 480) }}" alt="{{ $guide->title }}" class="h-full w-full object-cover transition group-hover:scale-105" loading="lazy">
                        </div>
                        <div class="p-4">
                            <h3 class="line-clamp-2 text-sm font-semibold leading-snug text-gray-900">{{ $guide->title }}</h3>
                            <p class="mt-2 text-xs text-salahport-muted">{{ $guide->read_time }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection
