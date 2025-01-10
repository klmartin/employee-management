<?php

use App\Http\Controllers\EmployeeController;


Route::get('employees', [EmployeeController::class, 'index']);
Route::post('employees', [EmployeeController::class, 'store']);