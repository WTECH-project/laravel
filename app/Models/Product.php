<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\SexCategory;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function sizes() {
        return $this->hasMany(Size::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function color() {
        return $this->belongsTo(Color::class);
    }

    public function sexCategory() {
        return $this->belongsTo(SexCategory::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
