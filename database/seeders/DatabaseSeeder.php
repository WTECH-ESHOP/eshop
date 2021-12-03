<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Quantity;
use App\Models\Variant;

class DatabaseSeeder extends Seeder {

    public function run() {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \DavidBadura\FakerMarkdownGenerator\FakerProvider($faker));

        $this->call([
            CategorySeeder::class,
            ShippingSeeder::class,
            AdminSeeder::class
        ]);

        User::factory(10)->create();

        Product::factory(100)
            ->has(Variant::factory()
                ->has(Quantity::factory()
                    ->count(3), 'quantities')
                ->count(2), 'variants')
            ->create();
    }
}
