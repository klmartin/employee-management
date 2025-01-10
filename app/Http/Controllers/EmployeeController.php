<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Get all employees
    public function index()
    {
        return Employee::all();
    }

    // Store a new employee
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'job_title' => 'required|string',
            'department' => 'required|string',
        ]);

        $employee = Employee::create($validated);
        return response()->json($employee, 201);
    }

    // Show a specific employee
    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    // Update an employee
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return response()->json($employee);
    }

    // Delete an employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
