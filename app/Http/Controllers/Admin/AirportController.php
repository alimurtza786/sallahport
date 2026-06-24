<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AirportRequest;
use App\Models\Airport;
use App\Support\MediaStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AirportController extends Controller
{
    public function index(): View
    {
        $airports = Airport::query()->withCount(['prayerRooms', 'wuduFacilities'])->orderBy('name')->paginate(15);

        return view('admin.airports.index', compact('airports'));
    }

    public function create(): View
    {
        return view('admin.airports.create');
    }

    public function store(AirportRequest $request): RedirectResponse
    {
        Airport::query()->create($this->mappedData($request));

        return redirect()->route('admin.airports.index')->with('success', 'Airport created successfully.');
    }

    public function edit(Airport $airport): View
    {
        return view('admin.airports.edit', compact('airport'));
    }

    public function update(AirportRequest $request, Airport $airport): RedirectResponse
    {
        $data = $this->mappedData($request, $airport);
        $airport->update($data);

        return redirect()->route('admin.airports.index')->with('success', 'Airport updated successfully.');
    }

    public function destroy(Airport $airport): RedirectResponse
    {
        MediaStorage::delete($airport->image);
        $airport->delete();

        return redirect()->route('admin.airports.index')->with('success', 'Airport deleted.');
    }

    /**
     * @return array<string, mixed>
     */
    private function mappedData(AirportRequest $request, ?Airport $airport = null): array
    {
        $data = $request->safe()->except(['image_file', 'image_url', 'prayer_names', 'prayer_times']);
        $data['code'] = strtoupper($data['code']);
        $data['slug'] = Str::slug($data['name']);
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image_file')) {
            if ($airport) {
                MediaStorage::delete($airport->image);
            }
            $data['image'] = MediaStorage::store($request->file('image_file'), 'airports');
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->string('image_url')->value();
        }

        $names = $request->input('prayer_names', []);
        $times = $request->input('prayer_times', []);
        $prayerTimes = [];

        foreach ($names as $i => $name) {
            if ($name && isset($times[$i]) && $times[$i]) {
                $prayerTimes[] = ['name' => $name, 'time' => $times[$i]];
            }
        }

        $data['prayer_times'] = $prayerTimes;

        return $data;
    }
}
