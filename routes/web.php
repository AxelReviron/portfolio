<?php

use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\HandleLocale;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/en');
});

Route::prefix('{locale}')->middleware(HandleLocale::class)->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::post('/contact', [ContactRequestController::class, 'store'])->name('contact.store');
