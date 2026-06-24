<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterRequest;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;

class NewsletterController extends Controller
{
    public function store(StoreNewsletterRequest $request): RedirectResponse
    {
        NewsletterSubscriber::query()->firstOrCreate(
            ['email' => $request->validated('email')],
            ['subscribed_at' => now()],
        );

        return back()->with('success', 'You have been subscribed to our newsletter.');
    }
}
