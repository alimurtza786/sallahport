@extends('admin.layouts.app')
@section('page_title', 'Community Updates')
@section('content')
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm">
        <table class="min-w-full text-sm"><thead class="bg-gray-50"><tr><th class="px-4 py-3 text-left">Author</th><th class="px-4 py-3 text-left">Airport</th><th class="px-4 py-3 text-left">Status</th><th class="px-4 py-3 text-right">Actions</th></tr></thead>
            <tbody class="divide-y">@foreach($updates as $u)<tr><td class="px-4 py-3">{{ $u->author_name }}</td><td class="px-4 py-3">{{ $u->airport->code }}</td><td class="px-4 py-3">@if($u->is_verified)<span class="text-salahport-green">Verified</span>@else<span class="text-amber-600">Pending</span>@endif</td><td class="px-4 py-3 text-right"><a href="{{ route('admin.community-updates.edit', $u) }}" class="text-salahport-green">Edit</a><form action="{{ route('admin.community-updates.destroy', $u) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="text-red-600">Delete</button></form></td></tr>@endforeach</tbody>
        </table>
    </div>
    <div class="mt-4">{{ $updates->links() }}</div>
@endsection
