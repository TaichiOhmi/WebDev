<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'itemName' => $this->faker->jobTitle(),
            'itemDescription' => $this->faker->sentence(),
            'itemPrice' => $this->faker->buildingNumber(),
            'itemQuality' => $this->faker->word(),
        ];
    }
}
