@php $item = $wuduFacility ?? null; @endphp
<div class="grid gap-4 lg:grid-cols-2">
    <div>
        <label class="block text-sm font-medium text-gray-700">Airport *</label>
        <select name="airport_id" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
            @foreach ($airports as $airport)
                <option value="{{ $airport->id }}" @selected(old('airport_id', $item?->airport_id) == $airport->id)>{{ $airport->name }} ({{ $airport->code }})</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Terminal *</label>
        <input type="text" name="terminal" value="{{ old('terminal', $item?->terminal) }}" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Location *</label>
        <input type="text" name="location" value="{{ old('location', $item?->location) }}" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Status</label>
        <input type="text" name="status" value="{{ old('status', $item?->status ?? 'Available 24/7') }}" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">
    </div>
    <div class="lg:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" rows="3" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">{{ old('description', $item?->description) }}</textarea>
    </div>
</div>
