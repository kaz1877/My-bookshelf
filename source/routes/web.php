<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\ApiController;

Route::resource('/book',bookController::class);
Route::get('/api',[ApiController::class,'index']);
Route::post('/api',[ApiController::class,'apiCreate']);
