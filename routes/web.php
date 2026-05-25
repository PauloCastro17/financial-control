<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
use App\Http\Middleware\UserCheckMiddleware;
use Illuminate\Support\Facades\Route;

//LOGIN
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');
Route::get('/sair', [LoginController::class, 'logout'])->name('auth.logout');

//REGISTRAR
Route::get('/criar-usuario', [RegisterController::class, 'index'])->name('register');
Route::post('/novo-usuario', [RegisterController::class, 'store'])->name('auth.register');

Route::middleware(['auth', UserCheckMiddleware::class])->group(function () {
    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('site.dashboard');
    //TRANSAÇÕES
    Route::get('/transacoes', [TransactionController::class, 'index'])->name('site.transactions');
    Route::post('/transacoes/nova', [TransactionController::class, 'store'])->name('create.new.transaction');
    Route::delete('/transacoes/deletar', [TransactionController::class, 'destroy'])->name('delete.transaction');
    Route::get('/transacoes/editar/{id}', [TransactionController::class, 'edit'])->name('edit.transaction');
    Route::put('/transacoes/atualizar', [TransactionController::class, 'update'])->name('update.transaction');
    Route::put('/transacoes/atualizar-pagamento', [TransactionController::class, 'updatePayment'])->name('update.payment.transaction');
    //CATEGORIAS
    Route::get('/categorias', [CategoryController::class, 'index'])->name('site.categories');
    Route::post('/nova-categoria', [CategoryController::class, 'store'])->name('create.new.category');
    Route::get('/categoria/editar/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::put('/categoria/atualizar', [CategoryController::class, 'update'])->name('update.category');
    Route::delete('/categoria/deletar', [CategoryController::class, 'destroy'])->name('delete.category');
    Route::patch('/categoria/alterar-active', [CategoryController::class, 'updateActive'])->name('update.active.category');
    //CARTEIRAS
    Route::get('/carteiras', [WalletController::class, 'index'])->name('site.wallets');
    Route::post('/carteiras/nova', [WalletController::class, 'store'])->name('create.new.wallet');
    Route::get('/carteiras/editar/{id}', [WalletController::class, 'edit'])->name('edit.wallet');
    Route::put('/carteiras/atualizar', [WalletController::class, 'update'])->name('update.wallet');
    Route::delete('/carteiras/deletar', [WalletController::class, 'destroy'])->name('delete.wallet');

});

