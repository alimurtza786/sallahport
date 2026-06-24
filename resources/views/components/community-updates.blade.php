@props(['updates', 'showForm' => false, 'airports' => null])

<div class="rounded-xl border border-salahport-border bg-white p-5 shadow-sm">
    <h3 class="font-semibold text-gray-900">Community Updates</h3>
    <div class="mt-4 space-y-4">
        @forelse ($updates as $update)
            <div class="border-b border-salahport-border pb-4 last:border-0 last:pb-0">
                <div class="flex items-center gap-2.5">
                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-salahport-green text-xs font-bold text-white">
                        {{ strtoupper(substr($update->author_name, 0, 1)) }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="text-sm font-semibold text-gray-900">{{ $update->author_name }}</span>
                            @if ($update->is_verified)
                                <span class="rounded bg-green-50 px-1.5 py-0.5 text-[10px] font-semibold text-salahport-green">Verified</span>
                            @endif
                        </div>
                        <p class="text-xs text-salahport-muted">{{ $update->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <p class="mt-2 text-sm leading-relaxed text-gray-600">{{ $update->body }}</p>
            </div>
        @empty
            <p class="text-sm text-salahport-muted">No community updates yet. Be the first to share!</p>
        @endforelse
    </div>
    <a href="{{ route('community.index') }}" class="mt-4 inline-flex w-full items-center justify-center rounded-lg bg-salahport-green py-2.5 text-sm font-semibold text-white transition hover:bg-salahport-green-hover">
        Add Update
    </a>
</div>
