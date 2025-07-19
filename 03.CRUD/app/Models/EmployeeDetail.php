<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait from Laravel so this model can use factories

class EmployeeDetail extends Model
{
    use HasFactory; // Allows factory-based test data creation

    // These are the columns you can fill when creating or updating details
    protected $fillable = ['employee_id', 'address', 'phone', 'date_of_birth'];

    // Each detail belongs to exactly one employee
    public function employee() {
        return $this->belongsTo(Employee::class); // Returns the Employee this detail belongs to
    }
}
