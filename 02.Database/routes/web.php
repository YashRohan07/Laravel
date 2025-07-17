<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;  // This line imports EmployeeController so Laravel knows where to find it.

Route::get('/', function () {
    return view('welcome');
});

// This line defines a GET route.
Route::get('/employees', [EmployeeController::class, 'index']);

// EmployeeController::class → is the class name
// 'index' → is the method name

// When someone visits '/employees' in the browser => Laravel calls the 'index' method in EmployeeController.
// Then it runs 'return view('employees.index')'.