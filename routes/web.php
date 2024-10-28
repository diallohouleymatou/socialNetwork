<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
 Route::any('/register',[UserController::class,'register'])->name('register')->middleware('guest');
 Route::any('/login',[UserController::class,'login'])->name('login')->middleware('guest');
 Route::get('/',[UserController::class,'home'])->name('home')->middleware('guest');
 Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard')->middleware('auth');
 Route::get('/feed',[UserController::class,'feed'])->name('feed')->middleware('auth');
 Route::get('/deconnexion',[UserController::class,'deconnexion'])->name('deconnexion')->middleware('auth');
 Route::get('/results',[UserController::class,'search'])->name('search')->middleware('auth');


