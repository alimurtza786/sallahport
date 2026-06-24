@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-5">
        @foreach ([
            ['Airports', $stats['airports'], 'admin.airports.index'],
            ['Prayer Rooms', $stats['prayer_rooms'], 'admin.prayer-rooms.index'],
            ['Wudu Facilities', $stats['wudu_facilities'], 'admin.wudu-facilities.index'],
            ['Guides', $stats['guides'], 'admin.guides.index'],
            ['Pending Updates', $stats['pending_updates'], 'admin.community-updates.index'],
        ] as [$label, $count, $route])
            <a href="{{ route($route) }}" class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition hover:border-salahport-green hover:shadow-md">
                <p class="text-3xl font-bold text-salahport-green">{{ $count }}</p>
                <p class="mt-1 text-sm font-medium text-gray-600">{{ $label }}</p>
            </a>
        @endforeach
    </div>

    <div class="mt-8 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
        <h2 class="font-semibold text-gray-900">Recent Community Updates</h2>
        <div class="mt-4 divide-y divide-gray-100">
            @forelse ($recentUpdates as $update)
                <div class="py-3">
                    <p class="text-sm font-medium text-gray-900">{{ $update->author_name }} · {{ $update->airport->code }}</p>
                    <p class="text-sm text-gray-500">{{ Str::limit($update->body, 100) }}</p>
                </div>
            @empty
                <p class="py-3 text-sm text-gray-500">No updates yet.</p>
            @endforelse
        </div>
    </div>
@endsection
