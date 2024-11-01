<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\PublicationController;

 Route::any('/register',[UserController::class,'register'])->name('register')->middleware('guest');
 Route::any('/login',[UserController::class,'login'])->name('login')->middleware('guest');
 Route::get('/',[UserController::class,'home'])->name('home')->middleware('guest');
 Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard')->middleware('auth');
 Route::get('/feed',[UserController::class,'feed'])->name('feed')->middleware('auth');
 Route::get('/deconnexion',[UserController::class,'deconnexion'])->name('deconnexion')->middleware('auth');
 Route::any('/results',[UserController::class,'search'])->name('search')->middleware('auth');
 Route::post('/follow/{user}',[FollowController::class,'follow'])->name('follow')->middleware('auth');
 Route::post('/unfollow/{user}',[FollowController::class,'unfollow'])->name('unfollow')->middleware('auth');
 Route::any('/profile',[UserController::class,'profile'])->name('profile')->middleware('auth');
 Route::any('/edit',[UserController::class,'edit'])->name('edit')->middleware('auth');
 Route::any('/edit_password',[UserController::class,'edit_password'])->name('edit_password')->middleware('auth');
 Route::any('/publication',[PublicationController::class,'publication'])->name('publication')->middleware('auth');
 Route::any('/like/{id}',[LikeController::class,'like'])->name('like')->middleware('auth');
 Route::any('/unlike/{id}',[LikeController::class,'unlike'])->name('unlike')->middleware('auth');
 Route::any('/comment/{id}',[CommentaireController::class,'comments'])->name('comments')->middleware('auth');




