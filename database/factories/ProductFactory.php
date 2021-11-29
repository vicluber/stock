<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'domain_id' => \App\Models\Domain::inRandomOrder()->first()->id,
            'title' => $this->faker->word(),
            'summary' => $this->faker->text($maxNbChars = 100),
            'type' => $this->faker->numberBetween(1, 100),
            'content' => $this->faker->text($maxNbChars = 300)
        ];
    }
}
