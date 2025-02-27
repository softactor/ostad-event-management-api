<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/healthcheck', function(){
    return response()->json(['message' => 'API is working!']);
});

/****************
 * Users
 * **********
 */
// get all users:
Route::get('/users', [UsersController::class, 'getUsers']);


// get all users:
Route::get('/user/{id}', [UsersController::class, 'getUser']);

// create user:
Route::post('/create-user', [UsersController::class, 'createUser']);

// update user:
Route::put('/update-user/{id}', [UsersController::class, 'updateUser']);

// delete user:
Route::delete('/delete-user/{id}', [UsersController::class, 'deleteUser']);

/****************
 * Bookings
 * **********
 */

// get all bookings:
Route::get('/bookings', [BookingsController::class, 'getAllbookings']);

