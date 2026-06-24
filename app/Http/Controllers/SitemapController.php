<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Guide;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $airports = Airport::query()->orderBy('code')->get(['code', 'updated_at']);
        $guides = Guide::query()->whereNotNull('published_at')->get(['slug', 'updated_at']);

        return response()
            ->view('sitemap', compact('airports', 'guides'))
            ->header('Content-Type', 'application/xml');
    }
}
