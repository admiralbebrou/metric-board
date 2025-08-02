<?php

use App\Http\Controllers\InertiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InertiaController::class, 'index']);
