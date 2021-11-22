<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model {

    use HasFactory;

    protected $fillable = [
        'product_id',
        'flavour',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function quantities() {
        return $this->hasMany(Quantity::class);
    }

    public function minPrice() {
        return $this->hasOne(Quantity::class)->orderBy('price', 'asc');
    }
}
