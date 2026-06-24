@extends('admin.layouts.app')
@section('page_title', 'Edit Community Update')
@section('content')
    <form action="{{ route('admin.community-updates.update', $communityUpdate) }}" method="POST" class="max-w-xl rounded-xl border bg-white p-6">@csrf @method('PUT')
        <p class="text-sm text-gray-500">{{ $communityUpdate->author_name }} · {{ $communityUpdate->airport->name }}</p>
        <div class="mt-4"><label class="block text-sm font-medium">Update Text</label><textarea name="body" rows="4" required class="mt-1 w-full rounded-lg border px-4 py-2 text-sm">{{ old('body', $communityUpdate->body) }}</textarea></div>
        <label class="mt-4 flex items-center gap-2 text-sm"><input type="checkbox" name="is_verified" value="1" @checked(old('is_verified', $communityUpdate->is_verified)) class="rounded text-salahport-green"> Mark as Verified</label>
        <button type="submit" class="mt-6 rounded-lg bg-salahport-green px-6 py-2.5 text-sm font-semibold text-white">Save</button>
    </form>
@endsection
