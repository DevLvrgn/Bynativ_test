<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BookingController::class, 'index'])->name('booking.index');
Route::post('/create', [BookingController::class, 'create'])->name('booking.create');
Route::get('/live', [BookingController::class, 'live'])->name('booking.live');
Route::get('/{booking}', [BookingController::class, 'show'])->name('booking.show');

Broadcast::channel('booking-live', \App\Broadcasting\BookingChannel::class);
