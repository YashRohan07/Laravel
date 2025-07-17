<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class EmployeeController extends Controller  // It extends (inherits) the base Controller class — so it can use built-in Laravel features.
{
    public function index()   // It will run when you visit the '/employees' route.
    {
        return view('employees.index');
        // Return a view (Blade file) named 'employees.index'.
        // Laravel will look for: resources/views/employees/index.blade.php  Then it shows that page in your browser.
    }               
}