@extends('layouts.app')

@section('title', 'Contact Us — SalahPort')
@section('meta_description', 'Get in touch with the SalahPort team for support, feedback, or partnership inquiries.')

@section('content')
    <div class="mx-auto max-w-xl px-4 py-12 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Contact Us</h1>
        <p class="mt-2 text-salahport-muted">We would love to hear from you. Send us a message and we will respond as soon as possible.</p>

        <form action="{{ route('contact.send') }}" method="POST" class="mt-8 space-y-5">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 w-full rounded-lg border border-salahport-border px-4 py-2.5 text-sm focus:border-salahport-green focus:outline-none focus:ring-2 focus:ring-salahport-green/20">
                @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 w-full rounded-lg border border-salahport-border px-4 py-2.5 text-sm focus:border-salahport-green focus:outline-none focus:ring-2 focus:ring-salahport-green/20">
                @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required class="mt-1 w-full rounded-lg border border-salahport-border px-4 py-2.5 text-sm focus:border-salahport-green focus:outline-none focus:ring-2 focus:ring-salahport-green/20">
                @error('subject')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea name="message" id="message" rows="5" required class="mt-1 w-full rounded-lg border border-salahport-border px-4 py-2.5 text-sm focus:border-salahport-green focus:outline-none focus:ring-2 focus:ring-salahport-green/20">{{ old('message') }}</textarea>
                @error('message')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="w-full rounded-lg bg-salahport-green py-3 text-sm font-semibold text-white hover:bg-salahport-green-hover">Send Message</button>
        </form>
    </div>
@endsection
