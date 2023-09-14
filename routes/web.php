<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserPageController;
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

// landing page route
Route::get('/', [PageController::class, 'landing_page'])->name('landing.page');

// Auth route
Route::get('/logout', [AuthController::class, 'doLogout'])->name('do.logout');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login.page');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('do.login');
});
Route::get('/dashboard-dosbim', function () {
    return view('pages.dosen.dashboard-dosbim');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-admin', [AdminPageController::class, 'dashboard_admin'])->name('dashboard.admin.page');
    Route::get('/dashboard-user', [UserPageController::class, 'dashboard_user'])->name('dashboard.user.page');
});
// tes
Route::get('/dashboard-user/profile', function () {
    return view('pages.profile.profile-user');
});
