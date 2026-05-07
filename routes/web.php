<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VisaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

Route::get('/form', function () {
    return view('form');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/store', [VisaController::class, 'store']);
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/inbox', [VisaController::class, 'index'])->name('admin.inbox');
    Route::get('/table', [VisaController::class, 'table'])->name('admin.table');
});


