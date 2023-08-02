<?php

namespace App\Listeners;

use App\Events\ArtRequest;
use App\Mail\ArtRequestMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ArtRequestListener
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
    public function handle(ArtRequest $event): void
    {
        Mail::to($event->email)->send(new ArtRequestMessage());

    }
}
