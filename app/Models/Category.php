<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model {

    protected $fillable = [
        'name',
        'category_id',
    ];

    protected $appends = ['slug'];

    public function getSlugAttribute() {
        return Str::slug($this->attributes['name'], '-');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subcategories() {
        return $this->hasMany(Category::class);
    }
}
