<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\ApiController;
use App\Http\Requests\BookRequest;

// Route::get('/book', [bookController::class, 'index'])->name('book.index');
// Route::get('/book/create', [bookController::class, 'create'])->name('book.create');
// Route::post('/book', [bookController::class, 'store'])->name('book.store');
// Route::get('/book/{id}', [bookController::class, 'show'])->name('book.show');
// Route::get('/book/{id}/edit', [bookController::class, 'edit'])->name('book.edit');
// Route::put('/book/{id}', [bookController::class, 'update'])->name('book.update');
// Route::delete('/book/{id}', [bookController::class, 'destroy'])->name('book.destroy');

Route::get('/',[bookController::class,'index'])->name('book.index');
Route::resource('/book',bookController::class)->except(['index','show']);
Route::prefix('book')->group(function(){
    Route::get('search',[bookController::class,'searchBooks'])->name('book.search');
    Route::get('{book}',[bookController::class,'show'])->name('book.show');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
