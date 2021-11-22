<?php

namespace Database\Factories;

use App\Models\Quantity;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuantityFactory extends Factory {
    protected $model = Quantity::class;

    public function definition() {
        return [
            'volume' => $this->faker->randomElement([150, 200, 500, 1000, 4000]),
            'amount' => $this->faker->numberBetween(0, 1000),
            'price' => $this->faker->randomFloat(null, 1, 50)
        ];
    }
}
