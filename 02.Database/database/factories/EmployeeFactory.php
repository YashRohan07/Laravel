<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            // Create a random UUID for the employee ID
            'id' => $this->faker->uuid(),

            // Fake employee name
            'name' => $this->faker->name,

            // Unique fake email address
            'email' => $this->faker->unique()->safeEmail,

            // Random salary between 30,000 and 100,000
            'salary' => $this->faker->numberBetween(30000, 100000),

            // Randomly select a department ID from existing departments
            // If no departments exist yet, use 1 as fallback
            'department_id' => Department::inRandomOrder()->first()->id ?? 1,

        //The ?? 1 means: “If there’s no department yet, fallback to ID 1 to prevent errors.”
        
        ];
    }
}
