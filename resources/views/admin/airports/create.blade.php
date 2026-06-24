@extends('admin.layouts.app')

@section('title', 'Add Airport')
@section('page_title', 'Add Airport')

@section('content')
    <form action="{{ route('admin.airports.store') }}" method="POST" enctype="multipart/form-data" class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
        @csrf
        @include('admin.airports._form')
        <div class="mt-6 flex gap-3">
            <button type="submit" class="rounded-lg bg-salahport-green px-6 py-2.5 text-sm font-semibold text-white hover:bg-salahport-green-hover">Save Airport</button>
            <a href="{{ route('admin.airports.index') }}" class="rounded-lg border border-gray-300 px-6 py-2.5 text-sm font-medium text-gray-700">Cancel</a>
        </div>
    </form>
@endsection
