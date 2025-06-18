<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AvailableAppointment;
use App\Models\Offer;
use App\Models\Order;
use App\Models\User;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'time' => fake()->time(),
            'date' => fake()->word(),
            'contact' => fake()->word(),
            'patient' => User::factory(),
            'notes' => fake()->text(),
            'offer_id' => Offer::factory(),
            'appointment_id' => AvailableAppointment::factory(),
            'user_id' => fake()->numberBetween(-100000, 100000),
            'status' => fake()->numberBetween(0, 1),
        ];
    }
}
