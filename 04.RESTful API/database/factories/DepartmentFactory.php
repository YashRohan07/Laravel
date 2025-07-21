<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            // Generate a random word for the department name
            'name' => $this->faker->word,
        ];
    }

    /*

    definition() returns one fake row for the departments table.
    $this->faker->word gives a random single word, like IT, Sales, HR 
    When you run Department::factory(10)->create(), it uses this to make 10 fake department names.

    */
}
