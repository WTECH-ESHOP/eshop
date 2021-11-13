<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
  protected $fillable = [
    'variant_id',
    'volume',
    'amount',
    'price',
  ];

  public function variant()
  {
    return $this->belongsTo(Variant::class);
  }
}
