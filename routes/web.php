<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;

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

Route::get('/tests/test', [TestController::class, 'index']);

// Route::resource('/contacts', ContactFormController::class);

Route::prefix('contacts')
    ->middleware(['auth'])
    ->name('contacts.')
    ->group(function () {
        Route::get('/', [ContactFormController::class, 'index'])->name('index');
        Route::get('/create', [ContactFormController::class, 'create'])->name('create');
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
