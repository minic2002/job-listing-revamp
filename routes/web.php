<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ListingController;
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

Route::get('/', [LandingController::class, 'home']);
Route::get('/contact', [LandingController::class, 'contact']);
Route::get('/about', [LandingController::class, 'about']);
Route::post('/store-message', [LandingController::class, 'store_message']);
Route::post('/store-email', [LandingController::class, 'store_email']);

//User Pages
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');

//Dashboard Pages
Route::group([
    'as' => 'dashboard',
    'prefix' => 'dashboard',
    'middleware' => ['auth', 'verified']
], function () {
    Route::get('/', [UserDashboardController::class, 'dashboard']);
    Route::get('home', [UserDashboardController::class, 'home'])->name('.home');
    Route::get('company', [UserDashboardController::class, 'company'])->name('.company');
    Route::get('company/create', [UserDashboardController::class, 'company_create'])->name('.company-create');
    Route::get('job-listings', [UserDashboardController::class, 'listings'])->name('.job-listings');
    Route::get('job-listings/{listing_id}/applicants', [UserDashboardController::class, 'job_applicants'])->name('.job-applicants');
    Route::get('job-listings/job-post', [UserDashboardController::class, 'listings_post'])->name('.job-listings-post');
    Route::get('job-applications', [UserDashboardController::class, 'applications'])->name('.job-applications');
    Route::get('my-resume', [UserDashboardController::class, 'resume'])->name('.my-resume');
    Route::get('my-resume/post-resume', [UserDashboardController::class, 'post_resume'])->name('.my-resume-post');
    Route::get('settings', [UserDashboardController::class, 'settings'])->name('.settings');
});

//Listing Page/s
Route::group([
    'as' => 'listings',
    'prefix' => 'listings'
], function () {
    Route::get('{listing}', [ListingController::class, 'show']);
    Route::post('apply', [ListingController::class, 'job_apply']);
});

Route::get('verify-notice', [UserController::class, 'verify_notice'])->name('verification.notice');
Route::post('email/verification-notification', [UserController::class, 'send_verification_email'])->name('verification.send');
Route::get('verify-email/{id}/{hash}', [UserController::class, 'verify_email'])->middleware(['signed'])->name('verification.verify');

//User Logic

#Dashboard
Route::post('/update/settings', [UserDashboardController::class, 'update_settings']);
Route::post('/store/company', [UserDashboardController::class, 'store_company']);
Route::post('/update/company', [UserDashboardController::class, 'update_company']);
Route::post('/store/job-post', [UserDashboardController::class, 'store_job_post']);
Route::post('/update/job-post', [UserDashboardController::class, 'update_job_post']);
Route::post('/store/resume', [UserDashboardController::class, 'store_resume']);
Route::post('/job-listings/{listing_id}/applicant/{applicant_id}/update-status',[UserDashboardController::class, 'update_application_status']);
Route::post('/company/{company_id}/trash', [UserDashboardController::class, 'destroy_company']);
#Register the user
Route::post('/users', [UserController::class, 'store']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->name('dashboard.logout')->middleware('auth');
