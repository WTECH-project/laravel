<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\CartItem;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
    ];

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
}
