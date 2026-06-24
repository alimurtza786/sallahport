<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\View\View;

class GuideController extends Controller
{
    public function index(): View
    {
        $guides = Guide::query()
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate(12);

        return view('guides.index', compact('guides'));
    }

    public function show(Guide $guide): View
    {
        return view('guides.show', compact('guide'));
    }
}
