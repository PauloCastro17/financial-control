<?php

use App\Http\Controllers\DashboardController as DashboardControllerAlias;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

//LOGIN
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');
Route::get('/sair', [LoginController::class, 'logout'])->name('auth.logout');

//REGISTRAR
Route::get('/criar-usuario', [RegisterController::class, 'index'])->name('register');
Route::post('/novo-usuario', [RegisterController::class, 'store'])->name('auth.register');

Route::middleware(['auth'])->group(function () {
    //DASHBOARD
    Route::get('/dashboard', [DashboardControllerAlias::class, 'index'])->name('site.dashboard');
});

