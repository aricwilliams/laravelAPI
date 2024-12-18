<?php
use App\Http\Controllers\CustomerController;

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{id}', [CustomerController::class, 'show']);
Route::post('/customers', [CustomerController::class, 'create']);
Route::put('/customers/{id}', [CustomerController::class, 'update']);
Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);

Route::get('/products', [CustomerController::class, 'getAllProducts']);
Route::get('/jobs', [CustomerController::class, 'getAllJobs']);
Route::get('/tools', [CustomerController::class, 'getAllTools']);
Route::get('/teams', [CustomerController::class, 'getAllTeams']);
