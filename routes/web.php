<?php

use App\Http\Controllers\AirportController;
use App\Http\Controllers\CommunityUpdateController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/airports', [AirportController::class, 'index'])->name('airports.index');
Route::get('/airports/map', [AirportController::class, 'map'])->name('airports.map');
Route::get('/airports/{airport}', [AirportController::class, 'show'])->name('airports.show');

Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');
Route::get('/guides/{guide:slug}', [GuideController::class, 'show'])->name('guides.show');

Route::get('/community', [CommunityUpdateController::class, 'index'])->name('community.index');
Route::post('/community', [CommunityUpdateController::class, 'store'])->name('community.store');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/tips', [PageController::class, 'tips'])->name('tips');
Route::get('/app', [PageController::class, 'app'])->name('app');

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

require __DIR__.'/admin.php';
