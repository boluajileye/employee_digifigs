<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\EmployeeController;

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


//Employee Api links
Route::prefix("employee")->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::post('/add', [EmployeeController::class, 'store']);
    Route::delete('/{id}/delete', [EmployeeController::class, 'destroy']);
    Route::put('/{id}/rating', [EmployeeController::class, 'rating']);
});
