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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID primary key for each employee
            $table->string('name');
            $table->string('email')->unique();
            $table->decimal('salary', 10, 2);
            $table->foreignId('department_id')->constrained(); // Link employee to a department (FK to departments.id)
            $table->timestamps();
            $table->softDeletes(); // Adds deleted_at for soft deletes

        // $table->foreignId('department_id')
        // This creates a column named department_id that will hold a department’s id.

        // ->constrained()
        // This automatically makes department_id a foreign key that points to the id column in the departments table.
           
        // softDeletes lets you hide records instead of fully removing them.
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
