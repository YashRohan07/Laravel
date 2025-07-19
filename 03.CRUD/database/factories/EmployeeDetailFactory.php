<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeDetail>
 */
class EmployeeDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array  // This factory makes fake details for each employee.
    {
        return [
            // Fake street address
            'address' => $this->faker->address,

            // Fake phone number
            'phone' => $this->faker->phoneNumber,

            // Fake date of birth
            'date_of_birth' => $this->faker->date(),
        ];
    }
}
