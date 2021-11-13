<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
  public function run()
  {
    DB::table('categories')->delete();

    Category::upsert([
      ['name' => 'proteins'],
      ['name' => 'gainer'],
      ['name' => 'creatine'],
      ['name' => 'amino acids'],
      ['name' => 'vitamis'],
      ['name' => 'stimulants'],
      ['name' => 'fat burners'],
    ], ['name']);

    $proteinsCategory = Category::whereName('proteins')->firstOrFail();
    $proteins = [
      'whey protein',
      'whey isolate',
      'vegan protein',
      'beef protein',
      'night protein',
    ];

    foreach ($proteins as $name) {
      Category::upsert([
        ['name' => $name, 'category_id' => $proteinsCategory->id],
      ], ['name'], ['category_id']);
    };
  }
}
