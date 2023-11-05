<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\Newsleter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('contacts');
// });

Auth::routes();


//Admin Panel
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Frontend
// Middleware login users
Route::group(['middleware' => 'auth', 'middleware' => 'is-active'], function () {
    Route::get('/sendemail', [Newsleter::class, 'index'])->name('sendemail');
    Route::post('/sendemail', [Newsleter::class, 'send']); 
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactsController::class, 'index'])->name('contact');
Route::get('/contact', [ContactsController::class, 'index'])->name('contact');

Route::get('/email-verify', [ContactsController::class, 'email-vefiry'])->name('email-vefiry');