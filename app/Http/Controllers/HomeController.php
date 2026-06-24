<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Guide;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredAirports = Airport::query()
            ->where('is_featured', true)
            ->orderBy('rating', 'desc')
            ->get();

        if ($featuredAirports->isEmpty()) {
            $featuredAirports = Airport::query()->orderBy('name')->limit(4)->get();
        }

        $featuredAirport = Airport::query()
            ->where('code', 'DXB')
            ->with([
                'prayerRooms',
                'travelerTips',
                'communityUpdates' => fn ($q) => $q->latest()->limit(3),
            ])
            ->first()
            ?? Airport::query()
                ->with([
                    'prayerRooms',
                    'travelerTips',
                    'communityUpdates' => fn ($q) => $q->latest()->limit(3),
                ])
                ->first();

        $guides = Guide::query()
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit(5)
            ->get();

        $mapAirports = Airport::query()
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get(['id', 'name', 'code', 'latitude', 'longitude']);

        return view('home', compact(
            'featuredAirports',
            'featuredAirport',
            'guides',
            'mapAirports',
        ));
    }
}
