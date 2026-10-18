<?php
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/bookings', [BookingController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/bookings/{id}', [BookingController::class, 'show']);
Route::put('/bookings/{id}/pay', [BookingController::class, 'updatePayment']);
