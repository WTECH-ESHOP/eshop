<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable = [
    'user_id',
    'first_name',
    'last_name',
    'phone_number',
    'country',
    'city',
    'street',
    'postal_code',
  ];
}
