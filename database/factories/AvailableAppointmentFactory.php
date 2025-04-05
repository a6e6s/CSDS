<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AvailableAppointment;
use App\Models\Doctor;

class AvailableAppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AvailableAppointment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 50),
            'date' => fake()->dateTime(),
            'doctor_id' => Doctor::factory(),
            'status' => fake()->numberBetween(0, 1),
        ];
    }
}
