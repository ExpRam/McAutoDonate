<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');
    Route::get('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    Route::resource('/donates', \App\Http\Controllers\Admin\DonateController::class);
    Route::resource('/promocodes', \App\Http\Controllers\Admin\PromocodeController::class);
});


