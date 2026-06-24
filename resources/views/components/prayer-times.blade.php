@props(['airport', 'activePrayer' => 'Dhuhr'])

<div class="rounded-xl border border-salahport-border bg-white p-5 shadow-sm">
    <h3 class="font-semibold text-gray-900">Prayer Times ({{ $airport->city }})</h3>
    <ul class="mt-4 space-y-2">
        @foreach ($airport->prayer_times ?? [] as $prayer)
            <li @class([
                'flex items-center justify-between rounded-lg px-3 py-2',
                'bg-salahport-green text-white' => $prayer['name'] === $activePrayer,
                'text-gray-700' => $prayer['name'] !== $activePrayer,
            ])>
                <span class="text-sm font-medium">{{ $prayer['name'] }}</span>
                <span class="text-sm font-semibold">{{ $prayer['time'] }}</span>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('airports.show', $airport) }}#prayer-times" class="mt-4 inline-block text-sm font-medium text-salahport-green hover:underline">Full Prayer Timetable &rarr;</a>
</div>
