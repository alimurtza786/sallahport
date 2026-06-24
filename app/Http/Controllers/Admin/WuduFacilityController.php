<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WuduFacilityRequest;
use App\Models\Airport;
use App\Models\WuduFacility;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WuduFacilityController extends Controller
{
    public function index(): View
    {
        $facilities = WuduFacility::query()->with('airport')->orderBy('airport_id')->paginate(15);

        return view('admin.wudu-facilities.index', compact('facilities'));
    }

    public function create(): View
    {
        $airports = Airport::query()->orderBy('name')->get();

        return view('admin.wudu-facilities.create', compact('airports'));
    }

    public function store(WuduFacilityRequest $request): RedirectResponse
    {
        WuduFacility::query()->create($request->validated());

        return redirect()->route('admin.wudu-facilities.index')->with('success', 'Wudu facility created.');
    }

    public function edit(WuduFacility $wuduFacility): View
    {
        $airports = Airport::query()->orderBy('name')->get();

        return view('admin.wudu-facilities.edit', compact('wuduFacility', 'airports'));
    }

    public function update(WuduFacilityRequest $request, WuduFacility $wuduFacility): RedirectResponse
    {
        $wuduFacility->update($request->validated());

        return redirect()->route('admin.wudu-facilities.index')->with('success', 'Wudu facility updated.');
    }

    public function destroy(WuduFacility $wuduFacility): RedirectResponse
    {
        $wuduFacility->delete();

        return redirect()->route('admin.wudu-facilities.index')->with('success', 'Wudu facility deleted.');
    }
}
