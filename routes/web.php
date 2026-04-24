<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::post('/subscribe', [LandingController::class, 'subscribe'])->name('landing.subscribe');
