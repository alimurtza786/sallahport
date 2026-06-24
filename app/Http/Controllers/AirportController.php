<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AirportController extends Controller
{
    public function index(Request $request): View
    {
        $query = Airport::query()->orderBy('name');

        if ($search = $request->string('q')->trim()->value()) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%")
                    ->orWhere('country', 'like', "%{$search}%");
            });
        }

        $airports = $query->paginate(12)->withQueryString();

        $mapAirports = Airport::query()
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get(['id', 'name', 'code', 'latitude', 'longitude']);

        return view('airports.index', compact('airports', 'mapAirports', 'search'));
    }

    public function show(Airport $airport): View
    {
        $airport->load([
            'prayerRooms',
            'wuduFacilities',
            'travelerTips',
            'communityUpdates' => fn ($q) => $q->latest()->limit(10),
        ]);

        return view('airports.show', compact('airport'));
    }

    public function map(): View
    {
        $airports = Airport::query()
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->orderBy('name')
            ->get();

        return view('airports.map', compact('airports'));
    }
}
