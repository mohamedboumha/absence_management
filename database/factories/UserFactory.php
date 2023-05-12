<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'f_name' => fake()->firstName,
            'l_name' => fake()->lastName,
            'f_name_ar' => fake()->firstName,
            'l_name_ar' => fake()->lastName,
            'role' => fake()->randomElement(['admin', 'director']),
            'email' => fake()->unique()->safeEmail,
            'email_verified_at' => null,
            'password' => bcrypt('password123'),
            'ppr' => fake()->unique()->randomNumber,
            'cni' => fake()->unique()->randomNumber,
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
