<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


Route::get('employees', [EmployeeController::class, 'index']);
Route::post('employees', [EmployeeController::class, 'store']);
Route::get('/', function () {
    return view('welcome');
});


Route::post('/addemployees', function (Request $request) {
    // Validate incoming request data
    $validated = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'job_title' => 'required|string',
        'department' => 'required|string',
    ]);

    // Create a new employee record using the validated data
    $employee = Employee::create($validated);

    // Return a JSON response with the created employee and HTTP status 201 (Created)
    return response()->json($employee, 201);
});
