@extends('admin.layouts.app')
@section('page_title', 'Add Wudu Facility')
@section('content')
    <form action="{{ route('admin.wudu-facilities.store') }}" method="POST" class="rounded-xl border bg-white p-6">@csrf @include('admin.wudu-facilities._form')
        <button type="submit" class="mt-6 rounded-lg bg-salahport-green px-6 py-2.5 text-sm font-semibold text-white">Save</button>
    </form>
@endsection
