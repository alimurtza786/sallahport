@extends('admin.layouts.app')
@section('title', 'Wudu Facilities')
@section('page_title', 'Wudu Facilities')
@section('content')
    <div class="mb-6 flex justify-end"><a href="{{ route('admin.wudu-facilities.create') }}" class="rounded-lg bg-salahport-green px-4 py-2 text-sm font-semibold text-white">+ Add Wudu Facility</a></div>
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="px-4 py-3 text-left">Airport</th><th class="px-4 py-3 text-left">Terminal</th><th class="px-4 py-3 text-left">Location</th><th class="px-4 py-3 text-right">Actions</th></tr></thead>
            <tbody class="divide-y">
                @foreach ($facilities as $f)
                    <tr>
                        <td class="px-4 py-3">{{ $f->airport->code }}</td>
                        <td class="px-4 py-3">{{ $f->terminal }}</td>
                        <td class="px-4 py-3">{{ $f->location }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.wudu-facilities.edit', $f) }}" class="text-salahport-green">Edit</a>
                            <form action="{{ route('admin.wudu-facilities.destroy', $f) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="text-red-600">Delete</button></form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $facilities->links() }}</div>
@endsection
