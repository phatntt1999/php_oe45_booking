<?php
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('language/{language}', [LanguageController::class, 'index'])->name('language');
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/destinations', function () {
    return view('destinations');
})->name('destinations');
Route::get('/tour', function () {
    return view('tour');
})->name('tour');