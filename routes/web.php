<?php

use App\Http\Controllers\HomeController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');
