@extends('admin.layouts.app')
@section('page_title', 'Edit Traveler Tip')
@section('content')
    <form action="{{ route('admin.traveler-tips.update', $travelerTip) }}" method="POST" class="rounded-xl border bg-white p-6">@csrf @method('PUT') @include('admin.traveler-tips._form', ['travelerTip' => $travelerTip])<button type="submit" class="mt-6 rounded-lg bg-salahport-green px-6 py-2.5 text-sm font-semibold text-white">Update</button></form>
@endsection
