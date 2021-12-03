<?php

namespace App\Listeners;

use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Support\Facades\Log;

class LogKeyWritten
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
     * @param  KeyWritten  $event
     * @return void
     */
    public function handle(KeyWritten $event)
    {
        Log::info('Data boli zapisane do cache', ['key' => $event->key]);
    }
}
