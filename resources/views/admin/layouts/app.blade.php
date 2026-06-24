<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — SalahPort</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">
        <aside class="fixed inset-y-0 left-0 z-30 w-64 bg-salahport-dark text-white">
            <div class="border-b border-white/10 px-6 py-5">
                <a href="{{ route('admin.dashboard') }}" class="text-lg font-bold">SalahPort Admin</a>
                <p class="mt-1 text-xs text-white/60">Content Management</p>
            </div>
            <nav class="space-y-1 px-3 py-4">
                @foreach ([
                    ['Dashboard', 'admin.dashboard', 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ['Airports', 'admin.airports.index', 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8'],
                    ['Prayer Rooms', 'admin.prayer-rooms.index', 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                    ['Wudu Facilities', 'admin.wudu-facilities.index', 'M4 4h16v4H4z'],
                    ['Traveler Tips', 'admin.traveler-tips.index', 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['Guides', 'admin.guides.index', 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                    ['Community', 'admin.community-updates.index', 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
                ] as [$label, $route, $icon])
                    <a href="{{ route($route) }}" @class([
                        'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition',
                        'bg-salahport-green text-white' => request()->routeIs($route.'*') || request()->routeIs($route),
                        'text-white/80 hover:bg-white/10 hover:text-white' => ! request()->routeIs($route.'*') && ! request()->routeIs($route),
                    ])>
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
            <div class="absolute bottom-0 left-0 right-0 border-t border-white/10 p-4">
                <a href="{{ route('home') }}" target="_blank" class="mb-2 block text-xs text-white/60 hover:text-white">View Website &rarr;</a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm text-white/80 hover:text-white">Logout</button>
                </form>
            </div>
        </aside>

        <div class="ml-64 flex flex-1 flex-col">
            <header class="sticky top-0 z-20 border-b border-gray-200 bg-white px-8 py-4">
                <h1 class="text-xl font-semibold text-gray-900">@yield('page_title')</h1>
            </header>
            <main class="flex-1 p-8">
                @if (session('success'))
                    <div class="mb-6 rounded-lg bg-green-50 px-4 py-3 text-sm font-medium text-salahport-green">{{ session('success') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
