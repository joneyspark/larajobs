<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resources Routes
// index - show all listings
// show - show single listing
// create - show form to create new listing
// store - save new listing
// edit - show form to edit listing
// update - save edited listing
// destroy - delete listing


// All Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create form
Route::get('/listing/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listing', [ListingController::class, 'store'])->middleware('auth');

// Edit Listing Data
Route::get('/listing/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing Data
Route::put('/listing/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing Data
Route::delete('/listing/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Single Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);

// Mange Listing
Route::get('/listings/manage', [ListingController::class, 'manage']);

// User Registration
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Store User
Route::post('/users', [UserController::class, 'store']);

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Login User
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login
Route::post('/users/auth', [UserController::class, 'authenticate']);




