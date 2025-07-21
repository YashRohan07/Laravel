<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Department::factory(10)->create(); // Create 10 fake departments
        
        // This must run before employees, because each employee needs a department_id
    }
}
