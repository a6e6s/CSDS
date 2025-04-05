<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Slide;

class SlideFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slide::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'subtitle' => fake()->regexify('[A-Za-z0-9]{1000}'),
            'image_alt' => fake()->word(),
            'image' => fake()->word(),
            'url' => fake()->url(),
            'status' => fake()->numberBetween(0, 1),
        ];
    }
}
