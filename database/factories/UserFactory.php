<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'password' => bcrypt('123456'),
            'type' => fake()->randomElement(["admin","patient"]),
            'image' => fake()->word(),
            'status' => fake()->numberBetween(0, 1),
            'dob' => fake()->date(),
        ];
    }
}
