<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/home', '/admin');

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Login Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Logout Routes...
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Admin prefix
Route::prefix('admin')->as('admin.')->middleware('jwt.verify')->group(function () {
    // Admin HomeController
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');

    // LoginController
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // EmployeeController
    Route::resource('employee', EmployeeController::class);
});
