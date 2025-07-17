<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('employee_id'); // FK to employees.id (UUID)
            $table->string('address');
            $table->string('phone');
            $table->date('date_of_birth');
            $table->timestamps();

            $table->foreign('employee_id')  // Make employee_id a foreign key (It links this table to another table.)
              ->references('id')
              ->on('employees')  // It connects to employees
              ->onDelete('cascade'); // If an employee is deleted, its details are deleted too

        // The employee_id column must match an employee’s id. If that employee is deleted, this detail will be deleted too.

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_details');
    }
};
