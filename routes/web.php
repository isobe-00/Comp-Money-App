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




// transactions 関連のルート
Route::prefix('/transactions')
    ->middleware(['auth'])
    ->name('transactions.')
    ->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('/create',  [TransactionController::class, 'create'])->name('create');
        Route::post('/',  [TransactionController::class, 'store'])->name('store');
        Route::get('/{id}', [TransactionController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [TransactionController::class, 'edit'])->name('edit');
        Route::post('/{id}', [TransactionController::class, 'update'])->name('update');
        Route::post('/{id}/destroy', [TransactionController::class, 'destroy'])->name('destroy');
    });

// contacts 関連のルート
    Route::prefix('contacts')
    ->middleware(['auth'])
    ->name('contacts.')
    ->group(function () {
        Route::get('/', [ContactFormController::class, 'index'])->name('index');
        Route::get('/create', [ContactFormController::class, 'create'])->name('create');
        Route::post('/',  [ContactFormController::class, 'store'])->name('store');
        Route::get('/{id}', [ContactFormController::class, 'show'])->name('show'); 
        Route::get('/{id}/edit', [ContactFormController::class, 'edit'])->name('edit'); 
        Route::post('/{id}/destroy', [ContactFormController::class, 'destroy'])->name('destroy'); 
        Route::post('contacts/{id}', [ContactFormController::class, 'update'])->name('update'); 

    });


Route::get('/', function () {
    return view('welcome');
});

// 認証が必要なグループ内のルート
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// 認証関連のルートファイルを読み込み
require __DIR__.'/auth.php';
