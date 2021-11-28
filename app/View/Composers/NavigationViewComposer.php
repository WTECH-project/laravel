<?php

namespace App\View\Composers;

use App\Models\SexCategory;

class NavigationViewComposer {
    public function compose($view) {
        $sex_categories = SexCategory::get();

        $view->with('sex_categories', $sex_categories);
    }
}