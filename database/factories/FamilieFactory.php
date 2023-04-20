<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FamilieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $postcode = $this->faker->regexify('[1-9][0-9]{3}[A-Z]{2}');

        return [
            'lastname' => $this->faker->lastName(),
            'address' => $this->faker->streetAddress(),
            'postcode' => $postcode,
            'city' => $this->faker->city()
        ];

    }
}