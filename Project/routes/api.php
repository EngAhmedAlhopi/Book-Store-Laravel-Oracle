<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmpsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('/sections', SectionsController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
// Route::resource('invoices', InvoicesController::class);
// Route::resource('Employees', EmployeesController::class);
// Route::resource('Emps', EmpsController::class);
