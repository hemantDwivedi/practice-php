<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/signup', [AuthController::class, 'signUpView'])->name('signup');
Route::get('/signin', [AuthController::class, 'signInView'])->name('signin');
Route::post('/signin', [AuthController::class, 'handleSignIn'])->name("signin.post");
Route::post('/signup', [AuthController::class, 'handleSignUp'])->name("signup.post");

// Contact Routes
Route::get('/', [ContactController::class, 'index']);

Route::get('/contactus', [ContactController::class, 'contactUsView']);

Route::get('/contacts', [ContactController::class, 'contactBookView'])->name('viewContact');

Route::get('/addcontact', [ContactController::class, 'addContactView']);

Route::post('/savecontact', [ContactController::class, 'saveContact'])->name('savecontact.post');

Route::get('/contacts/edit/{id}', [ContactController::class, 'editContact']);

Route::put('/contacts/update/{id}', [ContactController::class, 'updateContact']);

Route::get('/contacts/{id}', [ContactController::class, 'deleteContact']);