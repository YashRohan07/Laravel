<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\SoftDeletes;  

class Employee extends Model
{
    use HasFactory, SoftDeletes; // Use factories + enable soft deletes

    // Since we use UUIDs (unique strings) as IDs, they are NOT auto-incrementing numbers
    public $incrementing = false;

    // It tells the Laravel that: The primary key type is not an integer, it’s a string (UUID).
    protected $keyType = 'string';

    // These are the columns you can fill when creating or updating an Employee
    protected $fillable = ['id', 'name', 'email', 'salary', 'department_id'];

    // One Employee has one detailed record
    public function employeeDetail() {
        return $this->hasOne(EmployeeDetail::class);  // Returns the single EmployeeDetail related to this employee
    }

    // Many employees belong to one department
    public function department() {
        return $this->belongsTo(Department::class);  // Returns the Department this employee works in
    }

    /*

    public $incrementing = false;
    By default, Laravel expects your table’s primary key (id) to be an auto-increment number (1, 2, 3, 4, ...).
    But here, you’re using UUIDs (which are strings, like a2d4e5f6-1234-4567-9876-abc123xyz).
    So you tell Laravel: “Hey Laravel, don’t expect the ID to auto-increment. I’ll handle the UUID myself.”

    */
}
