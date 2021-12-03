<?php

namespace App\Listeners;

use Illuminate\Cache\Events\KeyForgotten;
use Illuminate\Support\Facades\Log;

class LogKeyForgotten
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
     * @param  KeyForgotten  $event
     * @return void
     */
    public function handle(KeyForgotten $event)
    {
        Log::info('Data boli vymazane z cache', ['key' => $event->key]);
    }
}
