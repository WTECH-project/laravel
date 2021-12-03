<?php

namespace App\Listeners;

use Illuminate\Cache\Events\CacheHit;
use Illuminate\Support\Facades\Log;

class LogCacheHit
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
     * @param  CacheHit  $event
     * @return void
     */
    public function handle(CacheHit $event)
    {
        Log::debug('Data boli najdene v cache', ['key' => $event->key]);
    }
}
