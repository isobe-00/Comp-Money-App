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


Route::prefix('/contacts')
    ->middleware(['auth'])
    ->controller(TransactionController::class)
    ->name('contacts.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create',  'create')->name('create');
        Route::post('/',  'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}', 'update')->name('update');
        Route::post('/{id}/destroy', 'destroy')->name('destroy');

        // Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

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
