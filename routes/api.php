<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ExistingFlatMateController;
use App\Http\Controllers\ExtraInformationController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\LinkedSocialAccountController;
use App\Http\Controllers\NewFlatMateController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PropertyInformationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomInformationController;
use App\Http\Controllers\SavedSearchController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Property;

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
Route::get('get/properties', [PropertyController::class, 'index']);
Route::apiResource("properties", PropertyController::class);
Route::get('get-property/{id}', [PropertyController::class, 'getProperty']);

Route::apiResource("property-information", PropertyInformationController::class);

Route::apiResource("extra-information", ExtraInformationController::class);

Route::apiResource("existing-flatmate", ExistingFlatMateController::class);

Route::apiResource("new-flatmate", NewFlatMateController::class);

Route::apiResource("room-information", RoomInformationController::class);


Route::middleware('auth:sanctum')->group(function () {

  //Notifications
  Route::get("get-notifications", [NotificationController::class, "getAllNotifications"]);
  Route::get("mark-notification/{id}", [NotificationController::class, "markNotification"]);
  Route::get("mark-notifications", [NotificationController::class, "markAllNotifications"]);
  Route::delete("delete-notification/{id}", [NotificationController::class, "deleteNotification"]);
  Route::delete("delete-notifications", [NotificationController::class, "deleteAllNotification"]);


  Route::post("upload", [PropertyInformationController::class, "uploadFile"]);
  //User api

  Route::middleware('ability:role-client')->group(function () {

    Route::post('change-password', [UserController::class, 'changepassword']);
    Route::apiResource("user", UserController::class);

    // message api 
    Route::apiResource("messages", MessageController::class);
    Route::post('get/message/history', [MessageController::class, 'showMessageHistory']);
    Route::get('get/message/users/list', [MessageController::class, 'getMessageUsersList']);

    // property api



    Route::apiResource("reviews", ReviewController::class);
    Route::get('property/{property_id}/reviews', [ReviewController::class, 'getPropertyReviews']);

    Route::apiResource("interactions", InteractionController::class);

    Route::apiResource("favourites", FavouriteController::class);

    Route::apiResource("saved-searches", SavedSearchController::class);


    Route::get('get-plans', [PlanController::class, 'index']);

    Route::get('get-subscription', [SubscriptionController::class, 'getSubscription']);
    Route::post('subscribe-plan', [SubscriptionController::class, 'store']);
  });



  //Admin api
  Route::middleware('ability:role-admin')->group(function () {
    Route::apiResource("plans", PlanController::class);

    Route::apiResource("subscriptions", SubscriptionController::class);

    Route::post('disapprove-property', [PropertyController::class, 'disApproveProperty']);

    Route::post('approve-property', [PropertyController::class, 'approveProperty']);
  });
});
