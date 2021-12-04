<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
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
            'slug' => $this->faker->word(),
        ];
    }
}
