<section class="relative overflow-hidden bg-white">
    <div class="pointer-events-none absolute inset-y-0 right-0 w-full overflow-hidden sm:w-[62%] lg:w-[58%]">
        <img src="{{ \App\Support\PlaceholderImage::hero() }}" alt="" aria-hidden="true" class="hero-photo-layer absolute h-auto select-none">
    </div>
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-white from-40% via-white/95 via-55% to-transparent to-75%"></div>

    <div class="relative mx-auto max-w-[1280px] px-5 pb-10 pt-8 sm:px-8 sm:pb-12 sm:pt-10 lg:min-h-[500px] lg:pb-14 lg:pt-12">
        <div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:justify-between">
            <div class="max-w-xl lg:max-w-[560px]">
                <h1 class="text-[32px] font-bold leading-[1.15] tracking-tight text-salahport-heading sm:text-[40px] lg:text-[44px]">
                    Never Miss a Salah<br>While Traveling
                </h1>
                <p class="mt-4 max-w-md text-[15px] leading-relaxed text-gray-500 sm:text-base">
                    Find airport prayer rooms, wudu facilities, prayer times and helpful tips for a stress-free journey.
                </p>

                <form action="{{ route('airports.index') }}" method="GET" class="mt-7 flex items-stretch overflow-hidden rounded-xl border border-gray-200 bg-white shadow-[0_8px_30px_rgba(0,0,0,0.08)]">
                    <div class="flex flex-1 items-center gap-3 px-4 py-3.5 sm:px-5">
                        <svg class="h-5 w-5 shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="search" name="q" value="{{ request('q') }}" placeholder="Search airport or city (e.g. DXB, Dubai)" class="w-full border-0 bg-transparent text-[14px] text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-0">
                    </div>
                    <button type="submit" class="flex w-[56px] shrink-0 items-center justify-center bg-salahport-green transition-colors hover:bg-salahport-green-hover" aria-label="Search">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </form>

                <div class="mt-7 flex flex-wrap gap-x-6 gap-y-4 sm:gap-x-8">
                    @foreach ([
                        ['icon' => 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8', 'label' => '1000+ Airports Worldwide'],
                        ['icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'label' => 'Community Updates'],
                        ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Prayer Times Everywhere'],
                        ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'label' => '100% Free For Everyone'],
                    ] as $feature)
                        <div class="flex items-center gap-2.5">
                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-salahport-green/10">
                                <svg class="h-[18px] w-[18px] text-salahport-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"/>
                                </svg>
                            </div>
                            <span class="text-[12px] font-medium leading-tight text-gray-600 sm:text-[13px]">{{ $feature['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="relative w-full shrink-0 sm:w-[300px] lg:mt-2">
                <div class="rounded-2xl border border-gray-100 bg-white p-5 shadow-[0_12px_40px_rgba(0,0,0,0.12)] sm:p-6">
                    <p class="text-[12px] font-medium text-gray-500">Next Prayer</p>
                    <div class="mt-1 flex items-baseline gap-2">
                        <span class="text-[26px] font-bold text-salahport-green">Dhuhr</span>
                        <span class="text-[18px] font-semibold text-salahport-heading">12:35 PM</span>
                    </div>
                    <p id="prayer-countdown" data-target="12:35" class="mt-2 text-[13px] font-semibold text-salahport-green">01:15:42 remaining</p>
                    <div class="mt-4 space-y-1 border-t border-gray-100 pt-4">
                        <div class="flex items-center gap-2 text-[13px] text-gray-600">
                            <svg class="h-4 w-4 text-salahport-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            Dubai (DXB)
                        </div>
                        <p class="text-[12px] text-gray-500">{{ now()->format('d M Y') }}</p>
                        <p class="text-[12px] text-gray-500">14 Dhul-Qadah 1446</p>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <a href="{{ route('airports.show', 'DXB') }}" class="flex h-8 w-8 items-center justify-center rounded-full bg-salahport-green/10">
                            <svg class="h-4 w-4 text-salahport-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
