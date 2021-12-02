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
use App\Models\OrderItem;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'color_id',
        'sex_category_id',
        'category_id',
        'name',
        'description',
        'price'
    ];

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function sizes() {
        return $this->belongsToMany(Size::class)->withTimestamps();
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

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

}
