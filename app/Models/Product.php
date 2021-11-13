<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'subcategory_id',
    'description',
    'images',
    'information',
    'unit',
    'brand',
  ];

  protected $casts = [
    'images' => 'array',
  ];

  public function subcategory()
  {
    return $this->belongsTo(Category::class);
  }

  public function variants()
  {
    return $this->hasMany(Variant::class);
  }
}
