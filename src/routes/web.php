<?php

use App\Http\Controllers\MarketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/ty', [MarketController::class, 'tyPage'])->name('market.ty');
Route::get('/', [MarketController::class, 'market'])->name('market.market');
Route::post('/store', [MarketController::class, 'store'])->name('market.store');
Route::get('/cart', [MarketController::class, 'index'])->name('market.index');
// dev destroy
Route::get('/destroy/{id}', [MarketController::class, 'destroy'])->name('market.destroy');


Route::group(['prefix' => 'orders', 'middleware' => 'auth'], function(){
    Route::get('/', [OrderController:: class, 'index'])->name('orders.index');
    Route::post('/', [OrderController::class, 'store'])->name('orders.store');
    Route::delete('/', [OrderController::class, 'destroy'])->name('orders.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';