<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
    ];

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}