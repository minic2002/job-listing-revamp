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

Route::get('/', function () {
    return view('welcome');
});

//User Pages
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');

//Dashboard Pages
Route::get('/dashboard', [UserDashboardController::class, 'dashboard']);
Route::get('/dashboard/home', [UserDashboardController::class, 'home'])->name('dashboard.home');
Route::get('/dashboard/company', [UserDashboardController::class, 'company'])->name('dashboard.company');
Route::get('/dashboard/job-listings', [UserDashboardController::class, 'listings'])->name('dashboard.job-listings');
Route::get('/dashboard/job-applications', [UserDashboardController::class, 'applications'])->name('dashboard.job-applications');
Route::get('/dashboard/settings', [UserDashboardController::class, 'settings'])->name('dashboard.settings');

//Logic
