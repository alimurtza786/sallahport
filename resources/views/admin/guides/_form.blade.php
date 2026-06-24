@php $item = $guide ?? null; @endphp
<div class="space-y-4">
    <div><label class="block text-sm font-medium text-gray-700">Title *</label><input type="text" name="title" value="{{ old('title', $item?->title) }}" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm"></div>
    <div><label class="block text-sm font-medium text-gray-700">Slug (optional)</label><input type="text" name="slug" value="{{ old('slug', $item?->slug) }}" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm"></div>
    <div><label class="block text-sm font-medium text-gray-700">Excerpt</label><textarea name="excerpt" rows="2" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm">{{ old('excerpt', $item?->excerpt) }}</textarea></div>
    <div><label class="block text-sm font-medium text-gray-700">Body *</label><textarea name="body" rows="10" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm font-mono">{{ old('body', $item?->body) }}</textarea></div>
    <div class="grid grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium text-gray-700">Read Time</label><input type="text" name="read_time" value="{{ old('read_time', $item?->read_time ?? '5 min read') }}" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm"></div>
        <div><label class="block text-sm font-medium text-gray-700">Published At</label><input type="datetime-local" name="published_at" value="{{ old('published_at', $item?->published_at?->format('Y-m-d\TH:i')) }}" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm"></div>
    </div>
    <div><label class="block text-sm font-medium text-gray-700">Cover Image</label><input type="file" name="image_file" accept="image/*" class="mt-1 w-full text-sm">@if($item?->image)<img src="{{ \App\Support\MediaStorage::url($item->image) }}" class="mt-2 h-24 rounded object-cover">@endif</div>
    <div><label class="block text-sm font-medium text-gray-700">Or Image URL</label><input type="url" name="image_url" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm"></div>
</div>
