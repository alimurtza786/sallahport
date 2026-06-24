@extends('admin.layouts.app')

@section('title', 'Prayer Rooms')
@section('page_title', 'Prayer Rooms / Mosques')

@section('content')
    <div class="mb-6 flex justify-end">
        <a href="{{ route('admin.prayer-rooms.create') }}" class="rounded-lg bg-salahport-green px-4 py-2 text-sm font-semibold text-white hover:bg-salahport-green-hover">+ Add Prayer Room</a>
    </div>
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Airport</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Terminal</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Location</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Status</th>
                    <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($prayerRooms as $room)
                    <tr>
                        <td class="px-4 py-3">{{ $room->airport->code }}</td>
                        <td class="px-4 py-3 font-medium">{{ $room->terminal }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $room->location }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $room->status }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.prayer-rooms.edit', $room) }}" class="text-salahport-green hover:underline">Edit</a>
                            <form action="{{ route('admin.prayer-rooms.destroy', $room) }}" method="POST" class="ml-3 inline" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $prayerRooms->links() }}</div>
@endsection
