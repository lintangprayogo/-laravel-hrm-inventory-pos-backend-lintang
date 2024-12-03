<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BasicSalaryController;
use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\DesignationController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\LeaveController;
use App\Http\Controllers\Api\LeaveTypeController;
use App\Http\Controllers\Api\PayrollController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ShiftController;
use App\Http\Controllers\Api\StaffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/login",[AuthController::class,'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/logout",[AuthController::class,'logout'])->middleware('auth:sanctum');

Route::apiResource("/roles",RoleController::class)->middleware('auth:sanctum');


Route::apiResource("/departments",DepartmentController::class)->middleware('auth:sanctum');

Route::apiResource("/company",CompanyController::class)->middleware('auth:sanctum');

Route::apiResource("/designations",DesignationController::class)->middleware('auth:sanctum');

Route::apiResource('/shifts', ShiftController::class)->middleware('auth:sanctum');

Route::apiResource('/basic-salaries', BasicSalaryController::class)->middleware('auth:sanctum');

Route::apiResource('/holidays', HolidayController::class)->middleware('auth:sanctum');

Route::apiResource('/leave-types', LeaveTypeController::class)->middleware('auth:sanctum');

Route::apiResource('/leaves', LeaveController::class)->middleware('auth:sanctum');

//attendances
Route::apiResource('/attendances', AttendanceController::class)->middleware('auth:sanctum');

//payrolls
Route::apiResource('/payrolls', PayrollController::class)->middleware('auth:sanctum');

//staffs
Route::get("/staffs",[StaffController::class,'index'])->middleware('auth:sanctum');
Route::post("/staffs",[StaffController::class,'store'])->middleware('auth:sanctum');

//dashboard
Route::get('/dashboard/today-summary', [DashboardController::class, 'getTodaySummary'])->middleware('auth:sanctum');
Route::get('/dashboard/today-attendance', [DashboardController::class, 'getAllTodayAttendance'])->middleware('auth:sanctum');
Route::get('/dashboard/pending-leave', [DashboardController::class, 'getAllPendingLeave'])->middleware('auth:sanctum');
