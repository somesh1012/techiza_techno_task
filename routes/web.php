<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::get('/', [TestController::class, 'index'])->name('home');
Route::get('/create', [TestController::class, 'create'])->name('home.create');
Route::post('/store', [TestController::class, 'store'])->name('home.store');
Route::post('/update', [TestController::class, 'updateStatus'])->name('home.update');

