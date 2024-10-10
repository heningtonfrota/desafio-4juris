<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('version', function() { return '1.0.0'; });

Route::middleware('auth:sanctum')->group(function() {
    Route::get('users/get-by-company/{company_id}', [UserController::class, 'getByCompany']);
    Route::resource('companies', CompanyController::class);
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
});
