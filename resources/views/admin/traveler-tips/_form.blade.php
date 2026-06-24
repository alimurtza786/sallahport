@php $item = $travelerTip ?? null; @endphp
<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Airport *</label>
        <select name="airport_id" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            @foreach ($airports as $airport)
                <option value="{{ $airport->id }}" @selected(old('airport_id', $item?->airport_id) == $airport->id)>{{ $airport->name }} ({{ $airport->code }})</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Title *</label>
        <input type="text" name="title" value="{{ old('title', $item?->title) }}" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" rows="4" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">{{ old('description', $item?->description) }}</textarea>
    </div>
</div>
