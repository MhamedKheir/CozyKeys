<?php

use App\Http\Controllers\ApartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/apartments', [ApartmentController::class, 'getAllApartments']);

    Route::get('/apartments/{apartment}', [ApartmentController::class, 'getApartmentDetails']);

    Route::post('/apartments', [ApartmentController::class, 'addApartment']);
});
