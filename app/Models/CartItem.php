<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Size;
use App\Models\User;
class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'size_id',
        'product_id',
        'quantity',
        'price'
    ];

    public function size() {
        return $this->belongsTo(Size::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
