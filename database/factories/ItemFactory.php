<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => \App\Models\Domain::inRandomOrder()->first()->id,
            'brand_id' => \App\Models\Brand::inRandomOrder()->first()->id,
            'supplier_id' => \App\Models\Supplier::inRandomOrder()->first()->id,
            'domain_id' => \App\Models\Domain::inRandomOrder()->first()->id,
            'sku' => $this->faker->company(),
            'mrp' => $this->faker->randomFloat(2, 0, 50),
            'discount' => $this->faker->randomFloat(2, 0, 50),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'quantity' => $this->faker->numberBetween(0, 9999),
            'sold' => $this->faker->numberBetween(0, 100),
            'available' => $this->faker->numberBetween(0, 9999),
            'defective' => $this->faker->numberBetween(0, 10),
        ];
    }
}
