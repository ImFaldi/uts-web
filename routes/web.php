<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageConroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortofolioController;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [LandingPageConroller::class, 'index'])->name('landing-page');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio');
    Route::post('/portofolio/create', [PortofolioController::class, 'create'])->name('portofolio.store');
    Route::post('/portofolio/edit/{id}', [PortofolioController::class, 'update'])->name('portofolio.update');
    Route::get('/portofolio/delete/{id}', [PortofolioController::class, 'delete'])->name('portofolio.delete');
});