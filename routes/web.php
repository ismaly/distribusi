<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistributionController;

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


Route::get('/', [DistributionController::class, 'index'])->name('index');
Route::get('input-data/{id?}', [DistributionController::class, 'inputdata'])->name('input-data');
Route::post('store', [DistributionController::class, 'store'])->name('store');
Route::delete('delete/{id}', [DistributionController::class, 'delete'])->name('delete');

Route::get('transaksi', [DistributionController::class, 'transaksi'])->name('transaksi');
