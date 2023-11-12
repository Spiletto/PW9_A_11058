<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\KembalikanController;

//Login
Route::get('/', [LoginController::class,'login'])->name('login');
Route::post('actionLogin', [LoginController::class,'actionLogin'])->name('actionLogin');

//Register
Route::get('register', [RegisterController::class,'register'])->name('register');
Route::post('register/action', [RegisterController::class,'actionRegister'])->name('actionRegister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

//Logout
Route::get('logout', [LoginController::class,'actionLogout'])->name('actionLogout')->middleware('auth');

Route::get('home', [HomeController::class,'index'])->name('home')->middleware('auth');

Route::resource('/buku', BukuController::class);

Route::resource('/pinjam', PinjamController::class);
Route::post('/pinjam/{id}', [PinjamController::class, 'store'])->name('pinjam.store');

Route::resource('/kembalikan', KembalikanController::class);
Route::post('/kembalikan/{id}', [KembalikanController::class, 'store'])->name('kembalikan.store');