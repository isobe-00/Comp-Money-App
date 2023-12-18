<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ShopController;
use App\http\Controllers\TransactionController;
// 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Laravel/task_test/routes/web.php
*/

// Route::get('/tests/test', [TestController::class, 'index']);

// Route::get('shops', [ShopController::class, 'index']);

// Route::resource('/contacts', ContactFormController::class);

// Route::get('/contacts/create', [TransactionController::class, 'create'])->name('transactions.index');Route::get('/transactions/create', [TransactionController::class, 'create']);
// 


Route::prefix('/transactions')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('transactions.index');
        Route::post('/create',  [TransactionController::class, 'create'])->name('transactions.create');
        Route::post('/',  [TransactionController::class, 'store'])->name('transactions.store');
        Route::get('/{id}', [TransactionController::class, 'show'])->name('transactions.show');
        Route::get('/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
        Route::post('/{id}', [TransactionController::class, 'update'])->name('transactions.update');
        Route::post('/{id}/destroy', [TransactionController::class, 'destroy'])->name('transactions.destroy');
    });

    Route::prefix('contacts')
    ->middleware(['auth'])
    ->name('contacts.')
    ->group(function () {
        Route::get('/', [ContactFormController::class, 'index'])->name('index');
        Route::get('/create', [ContactFormController::class, 'create'])->name('create');
    });
// routes/web.php


Route::prefix('transactions')
    ->middleware(['auth'])
    ->group(function () {
        Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    });



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
