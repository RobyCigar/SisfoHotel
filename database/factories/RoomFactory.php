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
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(300, 300),
            'capacity' => $this->faker->numberBetween(1, 5),
        ];
    }
}
