<?php

namespace App\Listeners;

use App\Events\Bid;
use App\Mail\BiddingMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailOwnerAboutBids
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
    public function handle(Bid $event): void
    {
        Mail::to($event->biderEmail)->send(new BiddingMessage());
    }
}
