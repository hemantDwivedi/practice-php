<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'welcomePage'])->name("welcome");
Route::get('/login', [AuthController::class, 'loginPage'])->name("login");
Route::post('/login', [AuthController::class, 'handleLogin'])->name("login.post");
Route::get('/register', [AuthController::class, 'registerPage'])->name("register");
Route::post('/register', [AuthController::class, 'handleRegister'])->name("register.post");
Route::get('/contact', [AuthController::class, 'contactPage']);