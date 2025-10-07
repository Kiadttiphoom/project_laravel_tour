<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tour/{id}', [TourController::class, 'show'])->name('tour.detail');
Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.page');
Route::get('/about', [AboutController::class, 'page'])->name('about');
Route::get('/contact', [ContactController::class, 'page'])->name('contact');