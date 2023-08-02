<?php

namespace App\Providers;

use App\Events\ArtRequest;
use App\Events\Bid;
use App\Events\ContactUs;
use App\Listeners\ArtRequestListener;
use App\Listeners\ContactUsListener;
use App\Listeners\EmailOwnerAboutBids;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Bid::class => [
            EmailOwnerAboutBids::class
        ],
        ArtRequest::class => [
            ArtRequestListener::class
        ],
        ContactUs::class => [
            ContactUsListener::class
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
