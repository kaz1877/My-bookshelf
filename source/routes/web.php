<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\ApiController;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\topController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/',[topController::class,'index'])->name('home');

// Route::resource('/book',bookController::class)->except(['show'])->middleware('auth');
// Route::prefix('book')->group(function(){
//     Route::middleware('auth')->group(function(){
//         Route::get('search',[bookController::class,'searchBooks'])->name('book.search');
//         Route::get('{book}',[bookController::class,'show'])->name('book.show');
//     });
// });

// Auth::routes();
// Route::get('/login/guest', [LoginController::class,'guestLogin']);

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
