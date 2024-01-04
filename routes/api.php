<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainAPI\EmployeeAPIController;
use App\Http\Controllers\MainAPI\TaskAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post("login", [EmployeeAPIController::class, "login"]);

Route::middleware('auth:api')->group( function () {
    Route::resource('employees', EmployeeAPIController::class);
    Route::resource('tasks', TaskAPIController::class);
});

Route::put('tasks/update_task_status/{taskid}', [TaskAPIController::class, 'update_task_status'])->middleware('auth:api');
