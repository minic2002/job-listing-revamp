<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;

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

Route::get('/', [UserController::class, 'home']);

//User Pages
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');

//Dashboard Pages
Route::group([
    'as' => 'dashboard',
    'prefix' => 'dashboard',
    'middleware' => 'auth'
], function () {
    Route::get('/', [UserDashboardController::class, 'dashboard']);
    Route::get('home', [UserDashboardController::class, 'home'])->name('.home');
    Route::get('company', [UserDashboardController::class, 'company'])->name('.company');
    Route::get('job-listings', [UserDashboardController::class, 'listings'])->name('.job-listings');
    Route::get('job-applications', [UserDashboardController::class, 'applications'])->name('.job-applications');
    Route::get('settings', [UserDashboardController::class, 'settings'])->name('.settings');
});


//User Logic

#Dashboard
Route::post('/update/settings', [UserDashboardController::class, 'update_settings']);

#Register the user
Route::post('/users', [UserController::class, 'store']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->name('dashboard.logout')->middleware('auth');
