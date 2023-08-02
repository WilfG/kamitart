<?php

namespace App\Listeners;

use App\Events\ContactUs;
use App\Mail\ContactUsMessaage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ContactUsListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactUs $event): void
    {
        Mail::to($event->email)->send(new ContactUsMessaage());

    }
}
