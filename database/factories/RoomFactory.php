<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'type' => $this->faker->randomElement(['single', 'double', 'triple']),
            'price' => $this->faker->numberBetween(2, 9) * 1000,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(300, 300),
            'capacity' => $this->faker->numberBetween(1, 5),
            'total_room' => $this->faker->numberBetween(8, 10),
            'available_room' => $this->faker->numberBetween(1, 8),
        ];
    }
}
