@php
    $airport = $airport ?? null;
    $prayerTimes = old('prayer_names') ? collect(old('prayer_names'))->zip(old('prayer_times', []))->map(fn ($p) => ['name' => $p[0], 'time' => $p[1]])->all() : ($airport?->prayer_times ?? [
        ['name' => 'Fajr', 'time' => ''],
        ['name' => 'Dhuhr', 'time' => ''],
        ['name' => 'Asr', 'time' => ''],
        ['name' => 'Maghrib', 'time' => ''],
        ['name' => 'Isha', 'time' => ''],
    ]);
@endphp

<div class="grid gap-6 lg:grid-cols-2">
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Airport Name *</label>
            <input type="text" name="name" value="{{ old('name', $airport?->name) }}" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">IATA Code *</label>
                <input type="text" name="code" value="{{ old('code', $airport?->code) }}" required maxlength="8" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm uppercase">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Terminals *</label>
                <input type="number" name="terminals_count" value="{{ old('terminals_count', $airport?->terminals_count ?? 1) }}" min="1" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">City *</label>
                <input type="text" name="city" value="{{ old('city', $airport?->city) }}" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Country *</label>
                <input type="text" name="country" value="{{ old('country', $airport?->country) }}" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="4" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">{{ old('description', $airport?->description) }}</textarea>
        </div>
    </div>

    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Cover Image (upload)</label>
            <input type="file" name="image_file" accept="image/*" class="mt-1 w-full text-sm">
            @if ($airport?->image)
                <img src="{{ \App\Support\MediaStorage::url($airport->image) }}" alt="" class="mt-2 h-32 rounded-lg object-cover">
            @endif
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Or Image URL</label>
            <input type="url" name="image_url" value="{{ old('image_url') }}" placeholder="https://..." class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Latitude</label>
                <input type="number" step="any" name="latitude" value="{{ old('latitude', $airport?->latitude) }}" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Longitude</label>
                <input type="number" step="any" name="longitude" value="{{ old('longitude', $airport?->longitude) }}" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Rating</label>
                <input type="number" step="0.1" min="0" max="5" name="rating" value="{{ old('rating', $airport?->rating ?? 0) }}" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Reviews</label>
                <input type="number" name="reviews_count" value="{{ old('reviews_count', $airport?->reviews_count ?? 0) }}" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Qibla °</label>
                <input type="number" name="qibla_degrees" value="{{ old('qibla_degrees', $airport?->qibla_degrees) }}" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            </div>
        </div>
        <label class="flex items-center gap-2 text-sm">
            <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $airport?->is_featured)) class="rounded text-salahport-green">
            Featured on homepage
        </label>
    </div>
</div>

<div class="mt-6">
    <h3 class="mb-3 font-semibold text-gray-900">Prayer Times</h3>
    <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-5">
        @foreach ($prayerTimes as $i => $prayer)
            <div>
                <input type="hidden" name="prayer_names[]" value="{{ $prayer['name'] }}">
                <label class="block text-xs font-medium text-gray-500">{{ $prayer['name'] }}</label>
                <input type="text" name="prayer_times[]" value="{{ old('prayer_times.'.$i, $prayer['time']) }}" placeholder="12:35 PM" class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2 text-sm">
            </div>
        @endforeach
    </div>
</div>
