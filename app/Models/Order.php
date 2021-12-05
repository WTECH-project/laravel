<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Delivery;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\User;
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_id',
        'delivery_id',
        'ordered_at',
        'name',
        'surname',
        'email',
        'phone_number',
        'street',
        'city',
        'postcode',
        'country',
    ];

    public function delivery() {
        return $this->belongsTo(Delivery::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
