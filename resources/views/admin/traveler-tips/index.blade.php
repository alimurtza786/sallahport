@extends('admin.layouts.app')
@section('page_title', 'Traveler Tips')
@section('content')
    <div class="mb-6 flex justify-end"><a href="{{ route('admin.traveler-tips.create') }}" class="rounded-lg bg-salahport-green px-4 py-2 text-sm font-semibold text-white">+ Add Tip</a></div>
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm">
        <table class="min-w-full text-sm"><thead class="bg-gray-50"><tr><th class="px-4 py-3 text-left">Airport</th><th class="px-4 py-3 text-left">Title</th><th class="px-4 py-3 text-right">Actions</th></tr></thead>
            <tbody class="divide-y">@foreach ($tips as $tip)<tr><td class="px-4 py-3">{{ $tip->airport->code }}</td><td class="px-4 py-3">{{ $tip->title }}</td><td class="px-4 py-3 text-right"><a href="{{ route('admin.traveler-tips.edit', $tip) }}" class="text-salahport-green">Edit</a><form action="{{ route('admin.traveler-tips.destroy', $tip) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="text-red-600">Delete</button></form></td></tr>@endforeach</tbody>
        </table>
    </div>
    <div class="mt-4">{{ $tips->links() }}</div>
@endsection
