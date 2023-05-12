<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absence>
 */
class AbsenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start' => fake()->date(),
            'end' => fake()->date(),
            'status' => fake()->randomElement(['Justifié', 'Injustifié']),
            'justification' => fake()->randomElement(['-', 'Medical certificate', 'Exception license']),
            'prof_id' => fake()->numberBetween(1, 200),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
