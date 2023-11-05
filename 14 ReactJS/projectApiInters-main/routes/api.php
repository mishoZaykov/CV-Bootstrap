<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CarsController;

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

Route::controller(CarsController::class)->group(function(){
    Route::get('getAllCars', 'getAllCars');
    Route::get('getCarById/{id}', 'getCarById');
    Route::post('addCar', 'addCar');
});

Route::middleware('auth:sanctum')->group(function(){

    Route::controller(RegisterController::class)->group(function(){
        Route::post('updateUserInfo/{id}', 'updateUserInfo');
        Route::get('getUserInfo/{id}', 'getUserInfo');
    });

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
