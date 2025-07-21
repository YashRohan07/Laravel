<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\EmployeeApiController;
use App\Http\Controllers\Api\DepartmentApiController;

/*
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "api" middleware group.
*/

// Public login route to get Sanctum API token
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json(['token' => $token]);
});

// Sanctum Auth-Protected routes
Route::middleware('auth:sanctum')->group(function () {

    // Employee API: CRUD + soft delete + restore
    Route::apiResource('employees', EmployeeApiController::class);
    Route::post('employees/{id}/restore', [EmployeeApiController::class, 'restore']);

    // Department API: CRUD
    Route::apiResource('departments', DepartmentApiController::class);

    // Example: get current authenticated user info
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
