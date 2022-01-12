<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model {

    use HasFactory;

    protected $fillable = [
        'variant_id',
        'volume',
        'amount',
        'price',
    ];

    public function scopeDistinctVolumes($query) {
        return $query->distinct('volume')
            ->select('volume')
            ->get()->toArray();
    }

    public function getPriceAttribute() {
        return number_format($this->attributes['price'], 2);
    }

    public function variant() {
        return $this->belongsTo(Variant::class);
    }
}
