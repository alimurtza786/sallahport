<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('components.seo')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @if (config('salahport.google_site_verification'))
        <meta name="google-site-verification" content="{{ config('salahport.google_site_verification') }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-white">
    @include('components.header')

    @if (session('success'))
        <div class="bg-green-50 px-4 py-3 text-center text-sm font-medium text-salahport-green" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    @if (config('salahport.google_analytics_id'))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('salahport.google_analytics_id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ config('salahport.google_analytics_id') }}');
        </script>
    @endif

    @stack('scripts')
</body>
</html>
