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
Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->middleware('auth');
Route::get('/dashboard/home', [UserDashboardController::class, 'home'])->name('dashboard.home')->middleware('auth');
Route::get('/dashboard/company', [UserDashboardController::class, 'company'])->name('dashboard.company')->middleware('auth');
Route::get('/dashboard/job-listings', [UserDashboardController::class, 'listings'])->name('dashboard.job-listings')->middleware('auth');
Route::get('/dashboard/job-applications', [UserDashboardController::class, 'applications'])->name('dashboard.job-applications')->middleware('auth');
Route::get('/dashboard/settings', [UserDashboardController::class, 'settings'])->name('dashboard.settings')->middleware('auth');

//User Logic

#Register the user
Route::post('/users', [UserController::class, 'store']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->name('dashboard.logout')->middleware('auth');
