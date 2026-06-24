@extends('layouts.app')

@section('title', 'Community Updates — SalahPort')
@section('meta_description', 'Real-time community updates about airport prayer rooms and Muslim traveler facilities.')

@section('content')
    <div class="bg-salahport-light py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Community Updates</h1>
            <p class="mt-2 text-salahport-muted">Share and discover real-time updates from fellow Muslim travelers.</p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-3">
            <div class="lg:col-span-2 space-y-4">
                @forelse ($updates as $update)
                    <article class="rounded-xl border border-salahport-border bg-white p-5 shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-salahport-green text-sm font-bold text-white">{{ strtoupper(substr($update->author_name, 0, 1)) }}</div>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $update->author_name }}
                                    @if ($update->is_verified)<span class="ml-2 rounded bg-green-50 px-1.5 py-0.5 text-[10px] font-semibold text-salahport-green">Verified</span>@endif
                                </p>
                                <p class="text-xs text-salahport-muted">{{ $update->airport->name }} ({{ $update->airport->code }}) · {{ $update->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <p class="mt-3 text-gray-600">{{ $update->body }}</p>
                        <a href="{{ route('airports.show', $update->airport) }}" class="mt-3 inline-block text-sm font-medium text-salahport-green hover:underline">View airport &rarr;</a>
                    </article>
                @empty
                    <p class="text-salahport-muted">No updates yet. Be the first to contribute!</p>
                @endforelse
                {{ $updates->links() }}
            </div>

            <div id="add-update" class="rounded-xl border border-salahport-border bg-white p-6 shadow-sm">
                <h2 class="text-lg font-bold text-gray-900">Add Update</h2>
                <form action="{{ route('community.store') }}" method="POST" class="mt-4 space-y-4">
                    @csrf
                    <div>
                        <label for="airport_id" class="block text-sm font-medium text-gray-700">Airport</label>
                        <select name="airport_id" id="airport_id" required class="mt-1 w-full rounded-lg border border-salahport-border px-3 py-2 text-sm focus:border-salahport-green focus:outline-none focus:ring-2 focus:ring-salahport-green/20">
                            <option value="">Select airport</option>
                            @foreach ($airports as $airport)
                                <option value="{{ $airport->id }}" @selected(old('airport_id') == $airport->id)>{{ $airport->name }} ({{ $airport->code }})</option>
                            @endforeach
                        </select>
                        @error('airport_id')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="author_name" class="block text-sm font-medium text-gray-700">Your Name</label>
                        <input type="text" name="author_name" id="author_name" value="{{ old('author_name') }}" required class="mt-1 w-full rounded-lg border border-salahport-border px-3 py-2 text-sm focus:border-salahport-green focus:outline-none focus:ring-2 focus:ring-salahport-green/20">
                        @error('author_name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-700">Update</label>
                        <textarea name="body" id="body" rows="4" required class="mt-1 w-full rounded-lg border border-salahport-border px-3 py-2 text-sm focus:border-salahport-green focus:outline-none focus:ring-2 focus:ring-salahport-green/20">{{ old('body') }}</textarea>
                        @error('body')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="w-full rounded-lg bg-salahport-green py-2.5 text-sm font-semibold text-white hover:bg-salahport-green-hover">Submit Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
