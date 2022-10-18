<?php

use Illuminate\Support\Facades\Route;

Route::get('/setup', [\App\Http\Controllers\SetupController::class, 'setup'])->name('setup');
Route::post('/setup_process', [\App\Http\Controllers\SetupController::class, 'setup_process'])->name('setup_process');

Route::middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->middleware('auth')->name('index');
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');
});

Route::controller(\App\Http\Controllers\MiscController::class)->group(function () {
    Route::get('/uuid/{nickname}', 'uuid')->name('uuid');
    Route::post('/get/price', 'price')->name('price');
    Route::post('/qiwi/donate', 'link')->name('link');
    Route::post('/qiwi/handler', 'handler')->middleware('throttle:qiwi')->name('handler');
});




