<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Specialty;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'title' => fake()->sentence(4),
            'email' => fake()->safeEmail(),
            'password' => fake()->password(),
            'image' => fake()->word(),
            'cetifications' => fake()->text(),
            'hospital_id' => Hospital::factory(),
            'specialty_id' => Specialty::factory(),
            'city_id' => City::factory(),
            'status' => fake()->numberBetween(0, 1),
            'updated_at' => fake()->dateTime(),
        ];
    }
}
