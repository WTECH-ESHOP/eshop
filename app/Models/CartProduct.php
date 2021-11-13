<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
  protected $fillable = [
    'user_id',
    'product_id',
    'amount',
    'quantity_id',
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function quantity()
  {
    return $this->belongsTo(Quantity::class);
  }
}
