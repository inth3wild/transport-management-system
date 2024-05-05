<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $destinations = ['Lagos', 'Abuja'];
        $randomChoice = $this->faker->numberBetween(0, 1);


        return [
            // "name" => $this->faker->city() . ' to ' . $this->faker->city(),
            "name" => $destinations[$randomChoice],
            "amount" => $this->faker->numberBetween(4000, 17000)
        ];
    }
}
