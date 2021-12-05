<?php

namespace App\View\Composers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Support\Facades\Cache;

use App\Models\SexCategory;
use App\Models\Size;

class AdminViewComposer
{
    public function compose($view)
    {
        $brands = Cache::rememberForever(
            'brands',
            function () {
                return Brand::get();
            }
        );
        $colors = Cache::rememberForever(
            'colors',
            function () {
                return Color::get();
            }
        );
        $categories = Cache::rememberForever(
            'categories',
            function () {
                return Category::get();
            }
        );
        $sexCategories = Cache::rememberForever(
            'sex_categories',
            function () {
                return SexCategory::get();
            }
        );
        $sizes = Cache::rememberForever(
            'sizes',
            function () {
                return Size::get();
            }
        );

        $view
            ->with('brands', $brands)
            ->with('colors', $colors)
            ->with('categories', $categories)
            ->with('sexCategories', $sexCategories)
            ->with('sizes', $sizes);
    }
}
