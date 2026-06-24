<article class="group overflow-hidden rounded-xl border border-salahport-border bg-white shadow-sm transition hover:shadow-md">
    <a href="{{ route('airports.show', $airport) }}">
        <div class="aspect-[16/10] overflow-hidden bg-gray-100">
            <img src="{{ \App\Support\MediaStorage::url($airport->image, 640, 400) }}" alt="{{ $airport->name }}" class="h-full w-full object-cover transition group-hover:scale-105" loading="lazy">
        </div>
        <div class="p-4">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="font-semibold text-gray-900">{{ $airport->name }}</h3>
                    <p class="text-sm text-salahport-muted">{{ $airport->code }}</p>
                </div>
                <div class="flex items-center gap-1 rounded-full bg-amber-50 px-2 py-0.5">
                    <svg class="h-3.5 w-3.5 fill-current text-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <span class="text-xs font-semibold text-gray-700">{{ number_format($airport->rating, 1) }}</span>
                </div>
            </div>
            <p class="mt-2 text-xs text-salahport-muted">{{ $airport->terminalsLabel() }}</p>
        </div>
    </a>
</article>
