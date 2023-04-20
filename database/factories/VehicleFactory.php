<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'make' => $this->faker->word,
            'model' => $this->faker->word,
            'edition' => $this->faker->word,
            'registered_year' => $this->faker->word,
            'registration_number' => $this->faker->word,
            'current_mileage' => $this->faker->randomNumber(),
            'color' => $this->faker->word,
            'remarks' => $this->faker->word,
        ];
    }
}
