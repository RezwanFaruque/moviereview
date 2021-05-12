<?php

namespace App\Listeners;

use App\Events\NewPostCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationToAllUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewPostCreatedEvent  $event
     * @return void
     */
    public function handle(NewPostCreatedEvent $event)
    {
        //
    }
}
