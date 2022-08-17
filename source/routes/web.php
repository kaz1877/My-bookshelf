<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;

Route::resource('/book',bookController::class);
