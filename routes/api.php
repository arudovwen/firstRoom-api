<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\LinkedSocialAccountController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Auth routes
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('logout/{user}', [UserController::class, 'logout']);
Route::post('forgot-password', [UserController::class, 'forgotpassword']);
Route::post('reset-password', [UserController::class, 'resetpassword']);
Route::post('request-otp', [UserController::class, 'requestotp']);
Route::post('reset-by-otp', [UserController::class, 'changePasswordByOtp']);
Route::post('verify-email', [UserController::class, 'verifyemail']);

// Auth admin
Route::middleware('auth:sanctum', 'ability:role-admin')->get('/user', function (Request $request) {
    return $request->user();
});


// Social login api
Route::get('/auth/login/{provider}', [LinkedSocialAccountController::class, 'handleRedirect']);
Route::post('/auth/{provider}/callback', [LinkedSocialAccountController::class, 'handleCallback']);

//Guest api

Route::middleware('auth:sanctum')->group(function () {
    //User routes




    //Admin api
    Route::middleware('ability:role-admin')->group(function () {


    });
});
