<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Hospital;
use App\Models\Offer;

class OfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'image' => fake()->word(),
            'price' => fake()->randomFloat(0, 0, 9999999999.),
            'new_price' => fake()->randomFloat(0, 0, 9999999999.),
            'body' => fake()->text(),
            'hospital_id' => Hospital::factory(),
            'status' => fake()->numberBetween(0, 1),
            'end_at' => fake()->dateTime(),
            'start_date' => fake()->dateTime(),
        ];
    }
}
