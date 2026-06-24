<footer class="bg-[#1a1a1a] text-gray-300">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-5">
            <div class="lg:col-span-2">
                <div class="flex items-center gap-2.5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-salahport-green">
                        <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
                    </div>
                    <span class="text-xl font-bold text-white">SalahPort</span>
                </div>
                <p class="mt-3 max-w-xs text-sm leading-relaxed text-gray-400">
                    Helping Muslim travelers find prayer rooms, wudu facilities, and prayer times at airports worldwide.
                </p>
                <div class="mt-5 flex gap-3">
                    @foreach (['facebook', 'instagram', 'twitter', 'youtube'] as $social)
                        <a href="#" class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 transition hover:bg-salahport-green" aria-label="{{ ucfirst($social) }}">
                            <span class="text-xs font-bold text-white">{{ strtoupper(substr($social, 0, 1)) }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            @php
                $columns = [
                    'Quick Links' => [
                        ['Airports', 'airports.index'],
                        ['Guides', 'guides.index'],
                        ['Tips', 'tips'],
                        ['Community', 'community.index'],
                        ['About Us', 'about'],
                    ],
                    'Resources' => [
                        ['Airport Map', 'airports.map'],
                        ['Prayer Times', 'airports.index'],
                        ['Travel Tips', 'tips'],
                        ['Blog', 'guides.index'],
                    ],
                    'Support' => [
                        ['Help Center', 'contact'],
                        ['Contact Us', 'contact'],
                        ['Add Update', 'community.index'],
                        ['Privacy Policy', 'privacy'],
                    ],
                ];
            @endphp
            @foreach ($columns as $title => $links)
                <div>
                    <h4 class="mb-4 text-sm font-semibold uppercase tracking-wider text-white">{{ $title }}</h4>
                    <ul class="space-y-2.5">
                        @foreach ($links as [$label, $route])
                            <li><a href="{{ route($route) }}" class="text-sm text-gray-400 transition hover:text-white">{{ $label }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <div>
                <h4 class="mb-4 text-sm font-semibold uppercase tracking-wider text-white">Download The App</h4>
                <div class="flex flex-col gap-3">
                    <a href="{{ route('app') }}" class="inline-flex items-center gap-2 rounded-lg bg-white/10 px-4 py-2.5 transition hover:bg-white/20">
                        <span class="text-lg">🍎</span>
                        <div>
                            <p class="text-[10px] text-gray-400">Download on the</p>
                            <p class="text-sm font-semibold text-white">App Store</p>
                        </div>
                    </a>
                    <a href="{{ route('app') }}" class="inline-flex items-center gap-2 rounded-lg bg-white/10 px-4 py-2.5 transition hover:bg-white/20">
                        <span class="text-lg">▶</span>
                        <div>
                            <p class="text-[10px] text-gray-400">Get it on</p>
                            <p class="text-sm font-semibold text-white">Google Play</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-10 border-t border-white/10 pt-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} SalahPort. All rights reserved.
        </div>
    </div>
</footer>
