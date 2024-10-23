<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BasicSalaryController;
use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\LeaveController;
use App\Http\Controllers\Api\LeaveTypeController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ShiftController;
use App\Http\Controllers\DepartmentController;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/login",[AuthController::class,'login']);
Route::post("/logout",[AuthController::class,'logout'])->middleware('auth:sanctum');

Route::apiResource("/roles",RoleController::class)->middleware('auth:sanctum');


Route::apiResource("/departments",DepartmentController::class)->middleware('auth:sanctum');

Route::apiResource("/companies",CompanyController::class)->middleware('auth:sanctum');

Route::apiResource("/designations",Designation::class)->middleware('auth:sanctum');

Route::apiResource('/shifts', ShiftController::class)->middleware('auth:sanctum');

Route::apiResource('/basic-salaries', BasicSalaryController::class)->middleware('auth:sanctum');

Route::apiResource('/holidays', HolidayController::class)->middleware('auth:sanctum');

Route::apiResource('/leave-types', LeaveTypeController::class)->middleware('auth:sanctum');

Route::apiResource('/leaves', LeaveController::class)->middleware('auth:sanctum');
