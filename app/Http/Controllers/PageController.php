<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreNewsletterRequest;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('pages.about');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function sendContact(StoreContactRequest $request): RedirectResponse
    {
        Mail::raw(
            "Name: {$request->validated('name')}\nEmail: {$request->validated('email')}\n\n{$request->validated('message')}",
            fn ($message) => $message
                ->to(config('salahport.contact_email'))
                ->subject('SalahPort Contact: '.$request->validated('subject'))
                ->replyTo($request->validated('email'), $request->validated('name'))
        );

        return back()->with('success', 'Thank you for your message. We will get back to you soon.');
    }

    public function privacy(): View
    {
        return view('pages.privacy');
    }

    public function tips(): View
    {
        return view('pages.tips');
    }

    public function app(): View
    {
        return view('pages.app');
    }
}
