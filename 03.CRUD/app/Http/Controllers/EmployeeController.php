<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;  // Used for creating UUIDs
use App\Models\Employee;     // Load the Employee model
use App\Models\Department;   // Load the Department model
use Illuminate\Http\Request; // Handles incoming HTTP requests

class EmployeeController extends Controller
{
    // index() — List employees, with search & salary filter
    public function index(Request $request)
    {
        $query = Employee::query();  // Start a new query for the Employee table

        if ($request->filled('min_salary')) {
            $query->where('salary', '>=', $request->min_salary);
        }

        if ($request->filled('max_salary')) {
            $query->where('salary', '<=', $request->max_salary);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $employees = $query->withTrashed()->with(['department'])->paginate(20);   // Load department data, show soft-deleted too, paginate by 20 per page

        return view('employees.index', compact('employees'));   // Return index view, pass the employee list
    }

    // create() — Show form to create a new employee
    public function create()
    {
        $departments = Department::all();  // Get all departments for dropdown list

        return view('employees.create', compact('departments'));  // Show create form view and pass departments
    }

    // store() — Validate & save a new employee + details
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'salary' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
        ]);

        $validated['id'] = (string) Str::uuid();  // Generate unique ID (UUID) for this new employee

        $employee = Employee::create($validated);   // Save new employee in the employees table

        // Save related details in the employee_details table
        $employee->employeeDetail()->create([
            'address' => $request->address,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return redirect('/employees')->with('success', 'Employee created successfully!');
    }


    // show() — Display a single employee’s details
    public function show(Employee $employee)
    {
        $employee->load('employeeDetail'); // Load the employee_detail relationship so we can show address, phone, DOB

        return view('employees.show', compact('employee'));  // Show single employee view
    }


    // edit() — Show form to edit an existing employee
    public function edit(Employee $employee)
    {
        $departments = Department::all();   // Get all departments for dropdown
        $employee->load('employeeDetail');  // Load detail data too (address, phone, DOB)
        return view('employees.edit', compact('employee', 'departments'));  // Show edit view
    }


    // update() — Validate & save changes to an existing employee + details
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'salary' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
        ]);

        $employee->update($validated); // Update main employee table

        // Update or create related details record
        $employee->employeeDetail()->updateOrCreate(
            ['employee_id' => $employee->id],
            [
                'address' => $request->address,
                'phone' => $request->phone,
                'date_of_birth' => $request->date_of_birth,
            ]
        );

        return redirect('/employees')->with('success', 'Employee updated successfully!');
    }


    // destroy() — Soft delete
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employees')->with('success', 'Employee deleted successfully!');
    }


    // restore() — Restore soft-deleted
    public function restore($id)
    {
        Employee::withTrashed()->findOrFail($id)->restore();
        return redirect('/employees')->with('success', 'Employee restored successfully!');
    }
}


