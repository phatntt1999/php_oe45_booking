<?php
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

Route::get('language/{language}', [LanguageController::class, 'index'])->name('language');
Route::get('/', function () {
    return view('home');
})->name('home');
Route::resource('/destinations', TourController::class)->only([
    'index',

]);
Route::get('/tour', function () {
    return view('tour');
})->name('tour');