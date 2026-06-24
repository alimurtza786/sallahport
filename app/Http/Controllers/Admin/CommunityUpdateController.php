<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityUpdate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommunityUpdateController extends Controller
{
    public function index(): View
    {
        $updates = CommunityUpdate::query()->with('airport')->latest()->paginate(20);

        return view('admin.community-updates.index', compact('updates'));
    }

    public function edit(CommunityUpdate $communityUpdate): View
    {
        $communityUpdate->load('airport');

        return view('admin.community-updates.edit', compact('communityUpdate'));
    }

    public function update(Request $request, CommunityUpdate $communityUpdate): RedirectResponse
    {
        $data = $request->validate([
            'is_verified' => ['nullable', 'boolean'],
            'body' => ['required', 'string', 'max:1000'],
        ]);

        $communityUpdate->update([
            'body' => $data['body'],
            'is_verified' => $request->boolean('is_verified'),
        ]);

        return redirect()->route('admin.community-updates.index')->with('success', 'Update saved.');
    }

    public function destroy(CommunityUpdate $communityUpdate): RedirectResponse
    {
        $communityUpdate->delete();

        return redirect()->route('admin.community-updates.index')->with('success', 'Update deleted.');
    }
}
