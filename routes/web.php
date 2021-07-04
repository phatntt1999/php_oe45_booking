<?php

use App\Http\Controllers\BookingTourController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ListTourController;
use App\Http\Controllers\Payment\CreatePaymentController;
use App\Http\Controllers\Payment\IpnVnpPaymentController;
use App\Http\Controllers\Payment\ReturnedResultPayment;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('language/{language}', [LanguageController::class, 'index'])->name('language');
Route::get('/', function () {
    return view('booking');
})->name('home');

Route::get('users/profile/{id}', [UserController::class, 'show_edit'])->name('edit_profile');

Route::resource('users', UserController::class)->only([
    'show', 'store', 'update',
]);
Route::resource('orders', UserController::class)->only([
    'show',
]);
Route::resource('tours', TourController::class)->only([
    'index', 'show',
]);
Route::resource('reviews', ReviewController::class)->only([
    'index', 'show',
]);

Route::middleware(['auth'])->group(function () {
    Route::get('booking', [BookingTourController::class, 'showBookingTour'])
        ->name('booking');
    Route::post('booking/payment', [BookingTourController::class, 'storeBookingTour'])
        ->name('storeBookingTour');

    Route::get('booking/payment/confirm', [CreatePaymentController::class, 'createVnpPayment'])
        ->name('createVnpPayment');
    Route::post('booking/payment/processing', [CreatePaymentController::class, 'handlePayment'])
        ->name('handleVnpPayment');
    Route::get('booking/returnPaymentResult', [ReturnedResultPayment::class, 'returnResultPayment'])
        ->name('redirectPaymentResult');
    Route::get('booking/ipn_vnpay', [IpnVnpPaymentController::class, 'getIpnPaymentResult'])
        ->name('ipn_vnpay');
});


/* Admin */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('admin/tours', ListTourController::class);

Route::get('search/', [TourController::class, 'search'])->name('search');
