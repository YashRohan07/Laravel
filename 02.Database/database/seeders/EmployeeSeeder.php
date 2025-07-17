<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        // Get all existing departments to Make sure departments exist first
        $departments = \App\Models\Department::all();

        // Create 100,000 employees using the EmployeeFactory.
        // For each employee, also create one EmployeeDetail linked to that employee.
        \App\Models\Employee::factory(100000)->create()->each(function ($employee) {
            \App\Models\EmployeeDetail::factory()->create([
                'employee_id' => $employee->id
            ]);
        });
    }
}
