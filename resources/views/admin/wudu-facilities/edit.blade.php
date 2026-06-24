@extends('admin.layouts.app')
@section('page_title', 'Edit Wudu Facility')
@section('content')
    <form action="{{ route('admin.wudu-facilities.update', $wuduFacility) }}" method="POST" class="rounded-xl border bg-white p-6">@csrf @method('PUT') @include('admin.wudu-facilities._form', ['wuduFacility' => $wuduFacility])
        <button type="submit" class="mt-6 rounded-lg bg-salahport-green px-6 py-2.5 text-sm font-semibold text-white">Update</button>
    </form>
@endsection
