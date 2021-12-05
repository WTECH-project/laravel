<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Size;

class ProductSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size_id'
    ];
    
    protected $table = 'product_size';

    public function products() {
        return $this->belongsTo(Product::class);
    }

    public function sizes() {
        return $this->belongsTo(Size::class);
    }

}
