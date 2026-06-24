@php $room = $prayerRoom ?? null; @endphp

<div class="grid gap-6 lg:grid-cols-2">
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Airport *</label>
            <select name="airport_id" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
                @foreach ($airports as $airport)
                    <option value="{{ $airport->id }}" @selected(old('airport_id', $room?->airport_id) == $airport->id)>{{ $airport->name }} ({{ $airport->code }})</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Terminal *</label>
            <input type="text" name="terminal" value="{{ old('terminal', $room?->terminal) }}" required placeholder="Terminal 1" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Location *</label>
            <input type="text" name="location" value="{{ old('location', $room?->location) }}" required placeholder="Near Gate D6" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" name="status" value="{{ old('status', $room?->status ?? 'Open 24/7') }}" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Gender Access</label>
                <input type="text" name="gender_access" value="{{ old('gender_access', $room?->gender_access ?? 'Men & Women') }}" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $room?->sort_order ?? 0) }}" min="0" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
        </div>
    </div>
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="5" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">{{ old('description', $room?->description) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Photos (upload multiple)</label>
            <input type="file" name="photos[]" accept="image/*" multiple class="mt-1 w-full text-sm">
            @if ($room?->photos)
                <div class="mt-3 grid grid-cols-4 gap-2">
                    @foreach ($room->resolvedPhotoUrls() as $i => $url)
                        <img src="{{ $url }}" alt="" class="h-16 w-full rounded object-cover">
                    @endforeach
                </div>
                <div class="mt-2 space-y-1">
                    @foreach ($room->photos as $path)
                        <label class="flex items-center gap-2 text-xs text-gray-600">
                            <input type="checkbox" name="remove_photos[]" value="{{ $path }}"> Remove {{ basename($path) }}
                        </label>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
