@extends('admin.layouts.app')
@section('page_title', 'Edit Guide')
@section('content')
    <form action="{{ route('admin.guides.update', $guide) }}" method="POST" enctype="multipart/form-data" class="rounded-xl border bg-white p-6">@csrf @method('PUT') @include('admin.guides._form', ['guide' => $guide])<button type="submit" class="mt-6 rounded-lg bg-salahport-green px-6 py-2.5 text-sm font-semibold text-white">Update</button></form>
@endsection
