<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\SportController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\ParentController;
use App\Http\Controllers\Api\CollageController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\FriendRequestController;
use App\Http\Controllers\Api\TermConditionController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\SkillController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// guest routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Verify User by OTP
Route::post('/verify-user-otp', [AuthController::class, 'verifyUserOTP']);

// forget password ====new to create a new controller for forget password=====
Route::post('/send-otp', [ForgotPasswordController::class, 'sendOTPCode']);
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOTP']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);
Route::post('/resend-otp', [ForgotPasswordController::class, 'resendOTP']);

// home page routes
Route::middleware('auth:api')->group(function () {
    // user logout
    Route::get('/logout', [AuthController::class, 'logout']);
    // user profile
    Route::get('/user-profile/{id}', [ProfileController::class, 'userProfile']);
    Route::post('/user-profile/{id}/update', [ProfileController::class, 'updateUserProfile']);

    // notification routes
    Route::get('/notification', [NotificationController::class, 'getNotification']);
});

// admin access routes
Route::middleware(['auth:api', 'admin'])->prefix('admin')->group(function () {
    Route::get('/user-counts', [AdminController::class, 'getUserCounts']);
});







