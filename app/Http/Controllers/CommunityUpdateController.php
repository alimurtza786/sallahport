<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommunityUpdateRequest;
use App\Models\Airport;
use App\Models\CommunityUpdate;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommunityUpdateController extends Controller
{
    public function index(): View
    {
        $updates = CommunityUpdate::query()
            ->with('airport')
            ->latest()
            ->paginate(15);

        $airports = Airport::query()->orderBy('name')->get(['id', 'name', 'code']);

        return view('community.index', compact('updates', 'airports'));
    }

    public function store(StoreCommunityUpdateRequest $request): RedirectResponse
    {
        CommunityUpdate::query()->create([
            ...$request->validated(),
            'is_verified' => false,
        ]);

        return back()->with('success', 'Thank you! Your update has been submitted for review.');
    }
}
