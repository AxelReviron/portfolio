<?php

use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactRequestController::class, 'store'])->name('contact.store');
