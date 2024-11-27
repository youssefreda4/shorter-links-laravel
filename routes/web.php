<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShorterLinkController;

Route::get('/', [ShorterLinkController::class, 'index'])->name('home');
Route::post('/', [ShorterLinkController::class, 'store'])->name('link.store');
Route::get('/{code}', [ShorterLinkController::class, 'show'])->name('link.show');
