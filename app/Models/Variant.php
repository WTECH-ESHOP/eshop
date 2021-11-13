<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
  protected $fillable = [
    'product_id',
    'flavour',
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function quantities()
  {
    return $this->hasMany(Quantity::class);
  }
}
