<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
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
Route::get('/listing/create', [ListingController::class, 'create']);

// Store Listing Data
Route::post('/listing', [ListingController::class, 'store']);

// Single Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);
