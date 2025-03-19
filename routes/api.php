<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/healthcheck', function(){
    return response()->json(['message' => 'API is working!']);
});

Route::post('/member-registration', [AuthController::class, 'memberRegistration']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user/{id}', [AuthController::class, 'user'])->middleware('auth:sanctum');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

/****************
 * Users
 * **********
 */
// get all users:
Route::get('/users', [UsersController::class, 'getUsers']);


// get all users:
// Route::get('/user/{id}', [UsersController::class, 'getUser']);

// create user:
Route::post('/create-user', [UsersController::class, 'createUser']);

// update user:
Route::put('/update-user/{id}', [UsersController::class, 'updateUser']);

// delete user:
Route::delete('/delete-user/{id}', [UsersController::class, 'deleteUser']);

Route::post('/event', [EventsController::class, 'store']);
Route::get('/events', [EventsController::class, 'events']);
Route::get('/event/{event}', [EventsController::class, 'getEvent']);
Route::put('/event/update/{id}', [EventsController::class, 'updateEvent']);

/****************
 * Bookings
 * **********
 */

// get all bookings:
Route::get('/bookings', [BookingsController::class, 'getAllbookings']);
Route::get('/booking/{id}', [BookingsController::class, 'getBooking']);
Route::post('/member-event-booking', [BookingsController::class, 'store']);
Route::get('/member-event-bookings/{id}', [BookingsController::class, 'getMemberbookings']);
Route::put('/booking/update/{id}', [BookingsController::class, 'updateBooking']);

//booking/update

