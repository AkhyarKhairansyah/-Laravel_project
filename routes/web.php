<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'posts');

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    // User Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Posts Routes - only authenticated users can access all resource routes
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Public posts route (accessible without auth)
// Route::get('/posts/{user}', [DashboardController::class, 'userPosts'])->name('posts.user');
// Route::delete('/postsDelete/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


// Routes for guest users
Route::middleware('guest')->group(function () {
    // Register Routes
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Login Routes
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Reset Password Routes
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail']);
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
});
Route::middleware('auth')->group(function () {

 //Middleware for security one
    Route::get('/post/{user}', [DashboardController::class, 'userPosts'])
    ->name('posts.user');
});


Route::resource('posts', PostController::class);

// Route to view the authenticated user's posts only
Route::get('/my-posts', [PostController::class, 'showUserPosts'])
    ->middleware('auth')
    ->name('posts.my');

    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
