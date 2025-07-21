<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::query();

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

        $employees = $query->withTrashed()->with('department')->paginate(20);

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

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

        $validated['id'] = (string) Str::uuid();

        $employee = Employee::create($validated);

        $employee->employeeDetail()->create([
            'address' => $request->address,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return redirect('/employees')->with('success', 'Employee created successfully!');
    }

    public function show(Employee $employee)
    {
        $employee->load('employeeDetail');
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $employee->load('employeeDetail');
        return view('employees.edit', compact('employee', 'departments'));
    }

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

        $employee->update($validated);

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

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employees')->with('success', 'Employee deleted successfully!');
    }

    public function restore($id)
    {
        Employee::withTrashed()->findOrFail($id)->restore();
        return redirect('/employees')->with('success', 'Employee restored successfully!');
    }
}
