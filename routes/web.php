<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController, 
    TransactionController,
    HomeController,
    RoomController,
};

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('/user', UserController::class)->middleware('is_admin');
    Route::resource('/transaction', TransactionController::class)->only(['index'])->middleware('is_admin');
    Route::resource('/transaction', TransactionController::class)->only(['show', 'store']);
    Route::get('transaction/create/{room}', [TransactionController::class, 'create'])->name('transaction.create');
    Route::resource('/rooms', RoomController::class)->only(['create', 'store', 'show']);
});