<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Doctor;
use App\Models\Review;
use App\Models\User;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'rating' => fake()->numberBetween(-10000, 10000),
            'body' => fake()->text(),
            'user_id' => User::factory(),
            'doctor_id' => Doctor::factory(),
            'status' => fake()->numberBetween(0, 1),
        ];
    }
}
