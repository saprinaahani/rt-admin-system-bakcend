<?php

use App\Http\Controllers\ResidentController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\UserController;

// Rute untuk Residents
Route::apiResource('residents', ResidentController::class);

// Rute untuk Houses
Route::apiResource('houses', HouseController::class);

// Rute untuk Payments
Route::apiResource('payments', PaymentController::class);
Route::get('payments/summary', [PaymentController::class, 'summary']);

// Rute untuk Expenses
Route::apiResource('expenses', ExpenseController::class);
Route::get('expenses/summary', [ExpenseController::class, 'summary']);

// Rute untuk Users
Route::apiResource('users', UserController::class);
