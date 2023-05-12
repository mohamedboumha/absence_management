<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prof>
 */
class ProfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cni' => fake()->unique()->randomNumber,
            'ppr' => fake()->unique()->randomNumber,
            'f_name' => fake()->firstName,
            'l_name' => fake()->lastName,
            'f_name_ar' => fake()->firstName,
            'l_name_ar' => fake()->lastName,
            'school_id' => fake()->numberBetween(1, 30),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
