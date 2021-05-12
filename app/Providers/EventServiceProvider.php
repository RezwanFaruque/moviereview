<?php

namespace App\Providers;

use App\Events\NewPostCreatedEvent;
use App\Listeners\SendNotificationToAllUser;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewPostCreatedEvent::class => [
            SendNotificationToAllUser::class,
            
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
