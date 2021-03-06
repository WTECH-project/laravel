<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path'
    ];

    public function products() {
        return $this->belongsTo(Product::class);
    }
}
