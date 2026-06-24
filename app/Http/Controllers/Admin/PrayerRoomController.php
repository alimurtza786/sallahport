<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PrayerRoomRequest;
use App\Models\Airport;
use App\Models\PrayerRoom;
use App\Support\MediaStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PrayerRoomController extends Controller
{
    public function index(): View
    {
        $prayerRooms = PrayerRoom::query()
            ->with('airport')
            ->orderBy('airport_id')
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.prayer-rooms.index', compact('prayerRooms'));
    }

    public function create(): View
    {
        $airports = Airport::query()->orderBy('name')->get();

        return view('admin.prayer-rooms.create', compact('airports'));
    }

    public function store(PrayerRoomRequest $request): RedirectResponse
    {
        PrayerRoom::query()->create([
            ...$request->safe()->except(['photos', 'remove_photos']),
            'photos' => MediaStorage::storeMany($request->file('photos', []), 'prayer-rooms'),
        ]);

        return redirect()->route('admin.prayer-rooms.index')->with('success', 'Prayer room created.');
    }

    public function edit(PrayerRoom $prayerRoom): View
    {
        $airports = Airport::query()->orderBy('name')->get();

        return view('admin.prayer-rooms.edit', compact('prayerRoom', 'airports'));
    }

    public function update(PrayerRoomRequest $request, PrayerRoom $prayerRoom): RedirectResponse
    {
        $photos = $prayerRoom->photos ?? [];

        foreach ($request->input('remove_photos', []) as $removePath) {
            if (in_array($removePath, $photos, true)) {
                MediaStorage::delete($removePath);
                $photos = array_values(array_filter($photos, fn ($p) => $p !== $removePath));
            }
        }

        $newPhotos = MediaStorage::storeMany($request->file('photos', []), 'prayer-rooms');
        $photos = array_merge($photos, $newPhotos);

        $prayerRoom->update([
            ...$request->safe()->except(['photos', 'remove_photos']),
            'photos' => $photos,
        ]);

        return redirect()->route('admin.prayer-rooms.index')->with('success', 'Prayer room updated.');
    }

    public function destroy(PrayerRoom $prayerRoom): RedirectResponse
    {
        MediaStorage::deleteMany($prayerRoom->photos);
        $prayerRoom->delete();

        return redirect()->route('admin.prayer-rooms.index')->with('success', 'Prayer room deleted.');
    }
}
