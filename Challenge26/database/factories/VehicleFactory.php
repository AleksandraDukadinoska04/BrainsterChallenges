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
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));

        return [
            'brand' => $this->faker->vehicleBrand,
            'model' => $this->faker->vehicleModel,
            'plate_number' => strtoupper($this->faker->bothify('???-####')),
            'insurance_date' => $this->faker->dateTimeBetween('2020-01-01', '2030-12-31')->format('Y-m-d'),
        ];
    }
}
