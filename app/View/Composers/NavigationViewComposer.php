<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Cache;

use App\Models\SexCategory;

class NavigationViewComposer {
    public function compose($view) {
        $sex_categories = Cache::rememberForever('sex_categories', function () {
            return SexCategory::get();
        });

        $view->with('sex_categories', $sex_categories);
    }
}