<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ListTourController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('language/{language}', [LanguageController::class, 'index'])->name('language');
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('tours', TourController::class)->only([
    'index', 'show',
]);

Route::middleware('role')->prefix('admin')->group(function () {
    Route::resource('/', AdminController::class)->only([
        'index',
    ]);
    Route::resource('/adminreviews', ReviewManagementController::class)->only([
        'index',
        'destroy',
    ]);
    Route::resource('/admintours', ListTourController::class)
        ->middleware('role');

    Route::resource('/categories', CategoryController::class)->except([
        'show', 'destroy',
    ]);
    Route::resource('/user', UserManagementController::class)->except([
        'show', 'store', 'create',
    ]);

    Route::get('/revenue', [RevenueController::class, 'revenue'])->name('revenue');
});

Route::get('search/', [TourController::class, 'search'])->name('search');

Route::middleware(['auth'])->group(function () {

    Route::resource('profile', UserController::class)->only([
        'index', 'show', 'store', 'update',
    ]);
});
