<section class="rounded-xl border border-salahport-border bg-white shadow-sm">
    <div class="border-b border-salahport-border p-5 sm:p-6">
        <div class="flex flex-wrap items-center gap-3">
            <h2 class="text-xl font-bold text-gray-900">{{ $airport->name }} ({{ $airport->code }})</h2>
            <div class="flex items-center gap-1 rounded-full bg-amber-50 px-2.5 py-1">
                <svg class="h-4 w-4 fill-current text-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <span class="text-sm font-semibold">{{ number_format($airport->rating, 1) }}</span>
            </div>
            <span class="text-sm text-salahport-muted">{{ $airport->reviews_count }} reviews</span>
        </div>
        <nav class="mt-5 flex gap-1 overflow-x-auto border-b border-salahport-border -mb-px">
            <span class="shrink-0 border-b-2 border-salahport-green px-4 py-2.5 text-sm font-medium text-salahport-green">Overview</span>
            <a href="{{ route('airports.show', $airport) }}#prayer-rooms" class="shrink-0 border-b-2 border-transparent px-4 py-2.5 text-sm font-medium text-salahport-muted hover:text-gray-900">Prayer Rooms</a>
            <a href="{{ route('airports.show', $airport) }}#wudu" class="shrink-0 border-b-2 border-transparent px-4 py-2.5 text-sm font-medium text-salahport-muted hover:text-gray-900">Wudu Facilities</a>
        </nav>
    </div>

    <div class="divide-y divide-salahport-border">
        @foreach ($airport->prayerRooms->take(3) as $room)
            <div class="p-5 sm:p-6">
                <div class="flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $room->terminal }}</h3>
                        <p class="text-sm text-salahport-muted">{{ $room->location }}</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-salahport-green">{{ $room->status }}</span>
                        <span class="rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-600">{{ $room->gender_access }}</span>
                    </div>
                </div>
                <p class="mt-3 text-sm leading-relaxed text-salahport-muted">{{ $room->description }}</p>
                @if ($room->photos)
                    <div class="mt-4 flex gap-2">
                        @foreach ($room->resolvedPhotoUrls() as $url)
                            <img src="{{ $url }}" alt="Prayer room photo" class="h-16 w-16 rounded-lg object-cover" loading="lazy">
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <div class="border-t border-salahport-border p-5 text-center sm:p-6">
        <a href="{{ route('airports.show', $airport) }}#prayer-rooms" class="inline-flex items-center gap-1 text-sm font-semibold text-salahport-green hover:underline">
            View all prayer rooms &rarr;
        </a>
    </div>
</section>
