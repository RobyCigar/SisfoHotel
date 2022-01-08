<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 10),
            'room_id' => $this->faker->numberBetween(1, 10),
            'total_price' => $this->faker->numberBetween(25000, 200000),
            'payment_status' => 1,
        ];
    }
}