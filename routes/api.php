<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ExistingFlatMateController;
use App\Http\Controllers\ExtraInformationController;
use App\Http\Controllers\LinkedSocialAccountController;
use App\Http\Controllers\PropertyInformationController;
use App\Http\Controllers\RoomInformationController;

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
    //User api
 
      Route::middleware('ability:role-client')->group(function () {

        Route::post('change-password', [UserController::class, 'changepassword']);
        Route::apiResource("user", UserController::class);

        // message api 
        Route::apiResource("messages", MessageController::class);
        Route::post('get/message/history', [MessageController::class, 'showMessageHistory']);
        Route::get('get/message/users/list', [MessageController::class, 'getMessageUsersList']);

        // property api
        Route::apiResource("properties", PropertyController::class);
        Route::apiResource("property/information", PropertyInformationController::class);
        Route::apiResource("extra/information", ExtraInformationController::class);
        Route::apiResource("existing/flatmate", ExistingFlatMateController::class);
        Route::apiResource("room/information", RoomInformationController::class);


      });
   


    //Admin api
    Route::middleware('ability:role-admin')->group(function () {


    });
});
