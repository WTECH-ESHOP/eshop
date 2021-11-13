<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
    'user_id',
    'shipping_id',
    'note',
    'first_name',
    'last_name',
    'email',
    'phone_number',
    'address',
    'payment',
    'status',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function shipping()
  {
    return $this->belongsTo(Shipping::class);
  }

  public function products()
  {
    return $this->hasMany(Product::class);
  }
}
