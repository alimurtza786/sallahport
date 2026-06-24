@extends('layouts.app')

@section('title', $airport->name.' ('.$airport->code.') — SalahPort')
@section('meta_description', Str::limit($airport->description, 160))
@section('og_image', \App\Support\MediaStorage::url($airport->image, 1200, 630))

@section('content')
    <div class="bg-salahport-light py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <nav class="mb-4 text-sm text-salahport-muted">
                <a href="{{ route('home') }}" class="hover:text-salahport-green">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ route('airports.index') }}" class="hover:text-salahport-green">Airports</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900">{{ $airport->code }}</span>
            </nav>
            <div class="flex flex-wrap items-center gap-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $airport->name }} ({{ $airport->code }})</h1>
                <div class="flex items-center gap-1 rounded-full bg-amber-50 px-3 py-1">
                    <svg class="h-4 w-4 fill-current text-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <span class="font-semibold">{{ number_format($airport->rating, 1) }}</span>
                </div>
                <span class="text-sm text-salahport-muted">{{ $airport->reviews_count }} reviews · {{ $airport->city }}, {{ $airport->country }}</span>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <section class="rounded-xl border border-salahport-border bg-white shadow-sm" data-airport-tabs>
                    <nav class="flex gap-1 overflow-x-auto border-b border-salahport-border px-4 pt-4">
                        @foreach (['overview' => 'Overview', 'prayer-rooms' => 'Prayer Rooms', 'wudu' => 'Wudu Facilities', 'tips' => 'Tips', 'updates' => 'Updates'] as $key => $label)
                            <button type="button" data-tab-button="{{ $key }}" @class([
                                'shrink-0 border-b-2 px-4 py-2.5 text-sm font-medium transition',
                                'border-salahport-green text-salahport-green' => $key === 'overview',
                                'border-transparent text-salahport-muted hover:text-gray-900' => $key !== 'overview',
                            ])>{{ $label }}</button>
                        @endforeach
                    </nav>

                    <div data-tab-panel="overview" class="p-6">
                        <img src="{{ \App\Support\MediaStorage::url($airport->image, 1200, 480) }}" alt="{{ $airport->name }}" class="mb-6 h-48 w-full rounded-xl object-cover" loading="lazy">
                        <p class="leading-relaxed text-gray-600">{{ $airport->description }}</p>
                        <dl class="mt-6 grid gap-4 sm:grid-cols-2">
                            <div><dt class="text-xs font-semibold uppercase text-salahport-muted">City</dt><dd class="mt-1 font-medium">{{ $airport->city }}</dd></div>
                            <div><dt class="text-xs font-semibold uppercase text-salahport-muted">Terminals</dt><dd class="mt-1 font-medium">{{ $airport->terminalsLabel() }}</dd></div>
                        </dl>
                    </div>

                    <div data-tab-panel="prayer-rooms" id="prayer-rooms" class="hidden divide-y divide-salahport-border">
                        @forelse ($airport->prayerRooms as $room)
                            <div class="p-6">
                                <div class="flex flex-wrap items-start justify-between gap-3">
                                    <div>
                                        <h3 class="font-semibold text-gray-900">{{ $room->terminal }}</h3>
                                        <p class="text-sm text-salahport-muted">{{ $room->location }}</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <span class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-salahport-green">{{ $room->status }}</span>
                                        <span class="rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-600">{{ $room->gender_access }}</span>
                                    </div>
                                </div>
                                <p class="mt-3 text-sm text-salahport-muted">{{ $room->description }}</p>
                                @if ($room->photos)
                                    <div class="mt-4 flex gap-2">
                                        @foreach ($room->resolvedPhotoUrls() as $url)
                                            <img src="{{ $url }}" alt="Prayer room" class="h-16 w-16 rounded-lg object-cover" loading="lazy">
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @empty
                            <p class="p-6 text-salahport-muted">No prayer room information available yet.</p>
                        @endforelse
                    </div>

                    <div data-tab-panel="wudu" id="wudu" class="hidden divide-y divide-salahport-border">
                        @forelse ($airport->wuduFacilities as $facility)
                            <div class="p-6">
                                <h3 class="font-semibold text-gray-900">{{ $facility->terminal }}</h3>
                                <p class="text-sm text-salahport-muted">{{ $facility->location }}</p>
                                <span class="mt-2 inline-block rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-salahport-green">{{ $facility->status }}</span>
                                <p class="mt-3 text-sm text-salahport-muted">{{ $facility->description }}</p>
                            </div>
                        @empty
                            <p class="p-6 text-salahport-muted">No wudu facility information available yet.</p>
                        @endforelse
                    </div>

                    <div data-tab-panel="tips" class="hidden p-6">
                        <ul class="space-y-4">
                            @foreach ($airport->travelerTips as $tip)
                                <li class="rounded-lg border border-salahport-border p-4">
                                    <h3 class="font-semibold text-gray-900">{{ $tip->title }}</h3>
                                    <p class="mt-2 text-sm text-salahport-muted">{{ $tip->description }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div data-tab-panel="updates" class="hidden p-6">
                        @forelse ($airport->communityUpdates as $update)
                            <div class="mb-4 border-b border-salahport-border pb-4 last:border-0">
                                <p class="font-semibold text-gray-900">{{ $update->author_name }} <span class="text-xs font-normal text-salahport-muted">{{ $update->created_at->diffForHumans() }}</span></p>
                                <p class="mt-1 text-sm text-gray-600">{{ $update->body }}</p>
                            </div>
                        @empty
                            <p class="text-salahport-muted">No community updates yet.</p>
                        @endforelse
                    </div>
                </section>
            </div>

            <aside class="space-y-6">
                <div id="prayer-times">
                    <x-prayer-times :airport="$airport" />
                </div>
                <x-qibla :degrees="$airport->qibla_degrees" />
                <x-airport-map :airports="collect([$airport])" :zoom="10" :height="'h-52'" />
                <a href="{{ route('guides.index') }}" class="block rounded-xl border border-salahport-border bg-white p-5 text-sm font-medium text-salahport-green shadow-sm hover:underline">Browse travel guides &rarr;</a>
            </aside>
        </div>
    </div>
@endsection
