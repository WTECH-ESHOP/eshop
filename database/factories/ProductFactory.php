<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory {
    protected $model = Product::class;

    public function definition() {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \DavidBadura\FakerMarkdownGenerator\FakerProvider($faker));

        return [
            'name' => $this->faker->sentence(),
            'subcategory_id' => Category::whereNotNull('category_id')->inRandomOrder()->first()->id,
            'description' => $this->faker->text(),
            'images' => [$this->faker->imageUrl(), $this->faker->imageUrl()],
            'unit' => $this->faker->randomElement(['KS', 'G']),
            'brand' => $this->faker->randomElement(['AMIX', 'BIOTECH_USA']),
            'information' => $faker->markdown(),
        ];
    }
}
