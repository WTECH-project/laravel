<?php

namespace App\Providers;

use App\View\Composers\AdminViewComposer;
use App\View\Composers\NavigationViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.partials.nav', 'home.index'], NavigationViewComposer::class);
        View::composer(['admin', 'admin.showCreate', 'admin.show', 'admin.create', 'admin.edit'], AdminViewComposer::class);
    }
}
