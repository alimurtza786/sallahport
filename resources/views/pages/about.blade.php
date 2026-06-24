@extends('layouts.app')

@section('title', 'About Us — SalahPort')
@section('meta_description', 'Learn about SalahPort — helping Muslim travelers find prayer rooms, wudu facilities, and prayer times at airports worldwide.')

@section('content')
    <div class="mx-auto max-w-3xl px-4 py-12 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">About SalahPort</h1>
        <div class="mt-6 space-y-4 leading-relaxed text-gray-600">
            <p>SalahPort is a free platform built for Muslim travelers who want to never miss a prayer while traveling. We help you find airport prayer rooms, wudu facilities, prayer times, and community-verified updates at airports worldwide.</p>
            <p>Our mission is to make air travel stress-free for the global Muslim community by providing accurate, up-to-date information about Islamic facilities at every major airport.</p>
            <p>Whether you are transiting through Dubai, Istanbul, Doha, or London, SalahPort gives you the information you need to plan your salah with confidence.</p>
        </div>
        <div class="mt-8 flex gap-4">
            <a href="{{ route('airports.index') }}" class="rounded-lg bg-salahport-green px-5 py-2.5 text-sm font-semibold text-white hover:bg-salahport-green-hover">Browse Airports</a>
            <a href="{{ route('contact') }}" class="rounded-lg border border-salahport-border px-5 py-2.5 text-sm font-semibold text-gray-700 hover:border-salahport-green hover:text-salahport-green">Contact Us</a>
        </div>
    </div>
@endsection
