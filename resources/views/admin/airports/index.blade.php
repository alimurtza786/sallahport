@extends('admin.layouts.app')

@section('title', 'Airports')
@section('page_title', 'Airports')

@section('content')
    <div class="mb-6 flex justify-end">
        <a href="{{ route('admin.airports.create') }}" class="rounded-lg bg-salahport-green px-4 py-2 text-sm font-semibold text-white hover:bg-salahport-green-hover">+ Add Airport</a>
    </div>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Airport</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Code</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Prayer Rooms</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Wudu</th>
                    <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($airports as $airport)
                    <tr>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $airport->name }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $airport->code }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $airport->prayer_rooms_count }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $airport->wudu_facilities_count }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.airports.edit', $airport) }}" class="text-salahport-green hover:underline">Edit</a>
                            <form action="{{ route('admin.airports.destroy', $airport) }}" method="POST" class="ml-3 inline" onsubmit="return confirm('Delete this airport?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $airports->links() }}</div>
@endsection
