<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Page;
use App\Models\Review;
use App\Models\Slide;
use App\Models\Specialty;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Ahmed Elmahdy',
            'email' => 'admin@example.com',
            'type' => 'admin',

        ]);

        City::factory(10)->create();
        Contact::factory(10)->create();
        Doctor::factory(10)->create();
        Hospital::factory(10)->create();
        Offer::factory(10)->create();
        Order::factory(10)->create();
        Page::factory(10)->create();
        Review::factory(10)->create();
        Slide::factory(10)->create();
        Specialty::factory(10)->create();
        User::factory(10)->create();

    }
}
