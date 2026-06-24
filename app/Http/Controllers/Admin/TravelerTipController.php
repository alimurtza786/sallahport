<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelerTipRequest;
use App\Models\Airport;
use App\Models\TravelerTip;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TravelerTipController extends Controller
{
    public function index(): View
    {
        $tips = TravelerTip::query()->with('airport')->orderBy('airport_id')->paginate(15);

        return view('admin.traveler-tips.index', compact('tips'));
    }

    public function create(): View
    {
        $airports = Airport::query()->orderBy('name')->get();

        return view('admin.traveler-tips.create', compact('airports'));
    }

    public function store(TravelerTipRequest $request): RedirectResponse
    {
        TravelerTip::query()->create($request->validated());

        return redirect()->route('admin.traveler-tips.index')->with('success', 'Traveler tip created.');
    }

    public function edit(TravelerTip $travelerTip): View
    {
        $airports = Airport::query()->orderBy('name')->get();

        return view('admin.traveler-tips.edit', compact('travelerTip', 'airports'));
    }

    public function update(TravelerTipRequest $request, TravelerTip $travelerTip): RedirectResponse
    {
        $travelerTip->update($request->validated());

        return redirect()->route('admin.traveler-tips.index')->with('success', 'Traveler tip updated.');
    }

    public function destroy(TravelerTip $travelerTip): RedirectResponse
    {
        $travelerTip->delete();

        return redirect()->route('admin.traveler-tips.index')->with('success', 'Traveler tip deleted.');
    }
}
