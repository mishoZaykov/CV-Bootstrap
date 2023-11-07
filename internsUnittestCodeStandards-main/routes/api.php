<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CarController;


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

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::controller(CarController::class)->group(function(){
    Route::get('cars', 'getAllCars');
    Route::get('cars/{id}', 'getSingleCar');
    Route::post('cars', 'createCar');
});


Route::middleware('auth:sanctum')->group( function () {
    Route::controller(CarController::class)->group(function(){
        Route::post('cars', 'createCar');
        Route::delete('cars/{id}', 'deleteCar');
    });
});

Route::middleware('auth:sanctum')->group( function () {
    Route::controller(RegisterController::class)->group(function(){
        Route::get('users', 'getUsers');
    });
});


