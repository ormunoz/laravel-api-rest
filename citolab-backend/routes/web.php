<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'loginToFilemaker']);

Route::get('/', function () {
    return view('welcome');
});