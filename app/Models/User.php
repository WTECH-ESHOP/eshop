<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'payment',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'role',
    ];

    public function isUser() {
        return $this->role === 'user';
    }

    public function isAdmin() {
        return $this->role === 'admin';
    }

    public function addresses() {
        return $this->hasMany(Address::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function cartProducts() {
        return $this->hasMany(CartProduct::class);
    }
}
