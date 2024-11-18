<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'rented_price' => $this->faker->randomFloat(2, 50000, 500000),
            'rented' => $this->faker->boolean(50),
            'user_id' => User::all()->random()->id
        ];
    }
}
