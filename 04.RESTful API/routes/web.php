<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Default Laravel welcome page
Route::get('/', function () {
    return view('welcome');
});

// List all employees
Route::get('/employees', [EmployeeController::class, 'index']);

// Show form to create a new employee
Route::get('/employees/create', [EmployeeController::class, 'create']);

// Store new employee
Route::post('/employees', [EmployeeController::class, 'store']);

// Show single employee details
Route::get('/employees/{employee}', [EmployeeController::class, 'show']);

// Show form to edit employee
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit']);

// Update employee
Route::put('/employees/{employee}', [EmployeeController::class, 'update']);

// Soft delete employee
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']);

// Restore soft deleted employee
Route::post('/employees/{id}/restore', [EmployeeController::class, 'restore']);
