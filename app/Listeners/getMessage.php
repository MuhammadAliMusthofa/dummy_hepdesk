<?php

namespace App\Listeners;

use App\Events\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class getMessage
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
     * @param  Message  $event
     * @return void
     */
    public function handle(Message $event)
    {
        //
    }
}
