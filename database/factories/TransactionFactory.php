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
            'user_id' => $this->faker->numberBetween(1, 10),
            'room_id' => $this->faker->numberBetween(1, 10),
            'total_price' => $this->faker->numberBetween(2, 9) * 1000,
            'payment_status' => 1,
        ];
    }
}
