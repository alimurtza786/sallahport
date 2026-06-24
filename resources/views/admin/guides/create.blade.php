@extends('admin.layouts.app')
@section('page_title', 'Add Guide')
@section('content')
    <form action="{{ route('admin.guides.store') }}" method="POST" enctype="multipart/form-data" class="rounded-xl border bg-white p-6">@csrf @include('admin.guides._form')<button type="submit" class="mt-6 rounded-lg bg-salahport-green px-6 py-2.5 text-sm font-semibold text-white">Save</button></form>
@endsection
