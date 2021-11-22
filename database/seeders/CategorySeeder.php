<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
    private $categories = [
        'proteins' => [
            'whey protein',
            'whey isolate',
            'vegan protein',
            'beef protein',
            'night protein',
        ],
        'gainers' => [
            'slow release carbs',
            'fast release carbs',
            'energy gels',
            'allin one'
        ],
        'creatine' => [
            'monohydrate',
            'other forms',
            'multi component'
        ],
        'amino acids' => [
            'complex',
            'bcaas',
            'eaa',
            'arginine',
            'glutamine',
        ],
        'vitamins' => [
            'multivitamins',
            'vitamin a',
            'b vitamins',
            'vitamin c',
            'vitamin d',
            'vitamin e',
            'other vitamins'
        ],
        'stimulants' => [
            'pre workout',
            'hmb',
            'testosterone',
            'beta alanine',
            'caffeine',
            'daa'
        ],
        'fat burners' => [
            'complex',
            'l-carnitine',
            'thermogenic',
            'other'
        ]
    ];

    private function createSubcategories($category, $subcategories) {
        $category = Category::whereName($category)->firstOrFail();

        $subcategoryValues = array_map(
            fn ($value) => ['name' => $value, 'category_id' => $category->id],
            $subcategories
        );

        Category::upsert($subcategoryValues, ['name'], ['category_id']);
    }

    public function run() {
        $categoryValues = array_map(
            fn ($value) => ['name' => $value],
            array_keys($this->categories)
        );

        Category::upsert($categoryValues, ['name']);

        foreach ($this->categories as $key => $value)
            $this->createSubcategories($key, $value);
    }
}
