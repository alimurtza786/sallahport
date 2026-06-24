<header class="sticky top-0 z-50 border-b border-gray-100 bg-white shadow-[0_1px_3px_rgba(0,0,0,0.06)]" id="site-header">
    <div class="mx-auto grid h-[72px] max-w-[1280px] grid-cols-[1fr_auto_1fr] items-center px-5 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-3 justify-self-start">
            <div class="relative h-11 w-11 shrink-0">
                <svg class="h-11 w-11 text-salahport-green" viewBox="0 0 44 44" fill="none" aria-hidden="true">
                    <path d="M22 3C14.82 3 9 8.82 9 16c0 9.625 13 25 13 25s13-15.375 13-25c0-7.18-5.82-13-13-13z" fill="currentColor"/>
                </svg>
                <svg class="absolute left-[13px] top-[10px] h-[18px] w-[18px] text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M12.2 4.5c-3.8 0-6.3 2.9-6.3 6.2 0 2.4 1.2 4.4 3.1 5.6-.2-2.8 1.6-4.8 4.2-5.2-.8-2-1.2-4-1.5-6.6-.2 0-.3 0-.5 0z"/>
                    <circle cx="17.5" cy="8" r="1.2"/>
                </svg>
            </div>
            <div class="min-w-0">
                <span class="block text-[17px] font-bold leading-none tracking-tight text-salahport-heading">SalahPort</span>
                <span class="mt-1 block truncate text-[10px] leading-none text-gray-500">Never Miss a Salah While Traveling</span>
            </div>
        </a>

        <nav class="hidden items-center justify-center gap-8 lg:flex" aria-label="Main navigation">
            @foreach ([
                ['label' => 'Airports', 'route' => 'airports.index'],
                ['label' => 'Guides', 'route' => 'guides.index'],
                ['label' => 'Tips', 'route' => 'tips'],
                ['label' => 'Community', 'route' => 'community.index'],
                ['label' => 'About', 'route' => 'about'],
                ['label' => 'App', 'route' => 'app'],
            ] as $link)
                <a href="{{ route($link['route']) }}" @class([
                    'whitespace-nowrap text-[14px] font-medium transition-colors hover:text-salahport-green',
                    'text-salahport-green' => request()->routeIs($link['route']),
                    'text-gray-700' => ! request()->routeIs($link['route']),
                ])>{{ $link['label'] }}</a>
            @endforeach
        </nav>

        <div class="flex items-center justify-end gap-5">
            <a href="{{ route('community.index') }}#add-update" class="hidden rounded-lg bg-salahport-green px-5 py-2.5 text-[14px] font-semibold text-white transition-colors hover:bg-salahport-green-hover sm:inline-flex">
                Add Update
            </a>
            <button type="button" class="hidden items-center gap-1.5 text-[14px] font-medium text-gray-600 sm:flex" aria-label="Language selector">
                <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/>
                </svg>
                EN
                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <button type="button" id="mobile-menu-btn" class="inline-flex rounded-lg p-2 text-gray-700 lg:hidden" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-gray-100 bg-white lg:hidden" aria-label="Mobile navigation">
        <nav class="mx-auto max-w-[1280px] space-y-1 px-5 py-4">
            @foreach ([
                ['label' => 'Airports', 'route' => 'airports.index'],
                ['label' => 'Guides', 'route' => 'guides.index'],
                ['label' => 'Tips', 'route' => 'tips'],
                ['label' => 'Community', 'route' => 'community.index'],
                ['label' => 'About', 'route' => 'about'],
                ['label' => 'App', 'route' => 'app'],
            ] as $link)
                <a href="{{ route($link['route']) }}" class="block rounded-lg px-3 py-2.5 text-[15px] font-medium text-gray-700 hover:bg-green-50 hover:text-salahport-green">{{ $link['label'] }}</a>
            @endforeach
            <a href="{{ route('community.index') }}#add-update" class="mt-2 block rounded-lg bg-salahport-green px-3 py-2.5 text-center text-[15px] font-semibold text-white">Add Update</a>
        </nav>
    </div>
</header>
