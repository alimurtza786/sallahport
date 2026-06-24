@extends('layouts.app')

@section('title', 'Privacy Policy — SalahPort')
@section('meta_description', 'SalahPort privacy policy — how we collect, use, and protect your personal information.')

@section('content')
    <div class="mx-auto max-w-3xl px-4 py-12 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Privacy Policy</h1>
        <div class="prose mt-6 max-w-none text-gray-600">
            <p><strong>Last updated:</strong> {{ now()->format('F j, Y') }}</p>
            <h2 class="mt-6 text-xl font-semibold text-gray-900">Information We Collect</h2>
            <p>When you subscribe to our newsletter, submit a community update, or contact us, we may collect your email address, name, and message content.</p>
            <h2 class="mt-6 text-xl font-semibold text-gray-900">How We Use Your Information</h2>
            <p>We use your information to provide and improve SalahPort services, send newsletter updates (with your consent), and respond to your inquiries.</p>
            <h2 class="mt-6 text-xl font-semibold text-gray-900">Analytics</h2>
            <p>We may use Google Analytics to understand how visitors use our website. You can opt out via your browser settings or Google Analytics opt-out tools.</p>
            <h2 class="mt-6 text-xl font-semibold text-gray-900">Contact</h2>
            <p>For privacy-related questions, please <a href="{{ route('contact') }}" class="text-salahport-green hover:underline">contact us</a>.</p>
        </div>
    </div>
@endsection
