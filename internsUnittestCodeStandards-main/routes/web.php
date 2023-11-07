<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/createuser', [UserController::class, 'create'])->name('create');
        Route::post('/createuser', [UserController::class, 'store'])->name('store');
        Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/edituser/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/deleteuser/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('car')->name('car.')->group(function () {
        Route::get('/management', [CarController::class, 'index'])->name('index');
        Route::get('/createcar', [CarController::class, 'create'])->name('create');
        Route::post('/createcar', [CarController::class, 'store'])->name('store');
        Route::get('/editcar/{id}', [CarController::class, 'edit'])->name('edit');
        Route::post('/editcar/{id}', [CarController::class, 'Update'])->name('update');
        Route::get('/deletecar/{id}', [CarController::class, 'Destroy'])->name('destroy');
    });
});