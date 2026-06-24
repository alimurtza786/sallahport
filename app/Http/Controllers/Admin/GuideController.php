<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GuideRequest;
use App\Models\Guide;
use App\Support\MediaStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GuideController extends Controller
{
    public function index(): View
    {
        $guides = Guide::query()->latest('published_at')->paginate(15);

        return view('admin.guides.index', compact('guides'));
    }

    public function create(): View
    {
        return view('admin.guides.create');
    }

    public function store(GuideRequest $request): RedirectResponse
    {
        Guide::query()->create($this->mappedData($request));

        return redirect()->route('admin.guides.index')->with('success', 'Guide created.');
    }

    public function edit(Guide $guide): View
    {
        return view('admin.guides.edit', compact('guide'));
    }

    public function update(GuideRequest $request, Guide $guide): RedirectResponse
    {
        $guide->update($this->mappedData($request, $guide));

        return redirect()->route('admin.guides.index')->with('success', 'Guide updated.');
    }

    public function destroy(Guide $guide): RedirectResponse
    {
        MediaStorage::delete($guide->image);
        $guide->delete();

        return redirect()->route('admin.guides.index')->with('success', 'Guide deleted.');
    }

    /**
     * @return array<string, mixed>
     */
    private function mappedData(GuideRequest $request, ?Guide $guide = null): array
    {
        $data = $request->safe()->except(['image_file', 'image_url']);
        $data['slug'] = $request->filled('slug') ? Str::slug($request->string('slug')->value()) : Str::slug($data['title']);

        if ($request->hasFile('image_file')) {
            if ($guide) {
                MediaStorage::delete($guide->image);
            }
            $data['image'] = MediaStorage::store($request->file('image_file'), 'guides');
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->string('image_url')->value();
        }

        return $data;
    }
}
