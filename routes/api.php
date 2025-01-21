<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use App\Models\Employee;

Route::get('employees', [EmployeeController::class, 'index']);
Route::post('employees', [EmployeeController::class, 'store']);

Route::post('/addemployees', function (Request $request) {
    // Validate incoming request data
    $validated = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'job_title' => 'required|string',
        'department' => 'required|string',
        'emp_id, => 'required|string',
    ]);

    // Create a new employee record using the validated data
    $employee = Employee::create($validated);

    // Return a JSON response with the created employee and HTTP status 201 (Created)
    return response()->json($employee, 201);
});
