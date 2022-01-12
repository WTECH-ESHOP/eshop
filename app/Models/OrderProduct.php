<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
  protected $fillable = [
    'product_id',
    'order_id',
    'amount',
    'volume',
    'price',
    'flavour',
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function order()
  {
    return $this->belongsTo(Order::class);
  }
}
