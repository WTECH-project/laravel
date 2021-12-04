<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'street',
        'city',
        'postcode',
        'country',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function deleteCartItems() {
        DB::transaction(function() {
            $this->cartItems()->delete();
        });
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function isAdmin() {
        return $this->hasRole("ADMIN");
    }
}
