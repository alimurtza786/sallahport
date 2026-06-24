@props(['degrees' => 245])

<div class="rounded-xl border border-salahport-border bg-white p-5 shadow-sm">
    <h3 class="font-semibold text-gray-900">Qibla Direction</h3>
    <div class="mt-4 flex items-center gap-4">
        <div class="relative flex h-24 w-24 shrink-0 items-center justify-center rounded-full border-2 border-salahport-border bg-salahport-light">
            <div class="absolute inset-2 rounded-full border border-dashed border-salahport-green/30"></div>
            <div class="absolute left-1/2 top-1/2 h-1 w-8 rounded-full bg-salahport-green" style="transform: translateY(-50%) rotate({{ $degrees }}deg); transform-origin: left center;"></div>
            <span class="absolute top-1 text-[10px] font-bold text-gray-500">N</span>
        </div>
        <div>
            <p class="text-2xl font-bold text-salahport-dark">{{ $degrees }}°</p>
            <p class="text-sm text-salahport-muted">from North</p>
        </div>
    </div>
</div>
