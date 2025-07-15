<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;  // This line imports EmployeeController so Laravel knows where to find it.

Route::get('/', function () {
    return view('welcome');
});


Route::get('/employees', [EmployeeController::class, 'index']);
// This line defines a GET route.
// When someone visits '/employees' in the browser => Laravel calls the 'index' method in EmployeeController.
// Then it runs 'return view('employees.index')'.