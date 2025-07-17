<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait from Laravel so this model can use factories

class Department extends Model
{
    use HasFactory; // Helps to use Laravel Factories. Which create fake data for testing and seeding your database.

    // Which fields can be filled when creating or updating a Department
    protected $fillable = ['name'];

    // One Department has many Employees
    public function employees() {
        return $this->hasMany(Employee::class);
    }

}
