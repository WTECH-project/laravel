<?php

namespace App\Listeners;

use Illuminate\Cache\Events\CacheMissed;
use Illuminate\Support\Facades\Log;

class LogCacheMissed
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
     * @param  CacheMissed  $event
     * @return void
     */
    public function handle(CacheMissed $event)
    {
        Log::debug('Data neboli najdene v cache', ['key' => $event->key]);
    }
}
