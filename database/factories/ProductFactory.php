<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory {
    protected $model = Product::class;
    protected $names = [
        'assets/images/products/sample/sample1.jpg',
        'assets/images/products/sample/sample2.png',
        'assets/images/products/sample/sample3.png',
        'assets/images/products/sample/sample4.png',
        'assets/images/products/sample/sample5.png',
        'assets/images/products/sample/sample6.png',
        'assets/images/products/sample/sample7.png',
        'assets/images/products/sample/sample8.png',
    ];

    public function definition() {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \DavidBadura\FakerMarkdownGenerator\FakerProvider($faker));

        return [
            'name' => $this->faker->sentence(),
            'subcategory_id' => Category::whereNotNull('category_id')->inRandomOrder()->first()->id,
            'description' => $this->faker->text(),
            'images' => $this->faker->randomElements($this->names, 3),
            'unit' => $this->faker->randomElement(['KS', 'G']),
            'brand' => $this->faker->randomElement(['AMIX', 'BIOTECH_USA']),
            'information' => $faker->markdown(),
        ];
    }
}
