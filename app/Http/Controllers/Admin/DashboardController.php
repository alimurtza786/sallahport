<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\CommunityUpdate;
use App\Models\Guide;
use App\Models\PrayerRoom;
use App\Models\WuduFacility;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'airports' => Airport::query()->count(),
                'prayer_rooms' => PrayerRoom::query()->count(),
                'wudu_facilities' => WuduFacility::query()->count(),
                'guides' => Guide::query()->count(),
                'pending_updates' => CommunityUpdate::query()->where('is_verified', false)->count(),
            ],
            'recentUpdates' => CommunityUpdate::query()->with('airport')->latest()->limit(5)->get(),
        ]);
    }
}
