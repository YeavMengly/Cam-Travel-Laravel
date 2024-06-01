<?php

use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth:api');


// Route::post('/register', [RegisteredUserController::class, 'store']);
// Route::post('/login', [AuthenticatedSessionController::class, 'store']);
// Route::prefix('api/auth')->group(function () {

//     Route::post('forgot-password', [PasswordResetLinkController::class, 'store']);
//     Route::post('reset-password', [NewPasswordController::class, 'store']);

//     Route::middleware('auth:sanctum')->group(function () {
//         Route::post('logout', [AuthenticatedSessionController::class, 'destroy']);
//         Route::put('password', [PasswordController::class, 'update']);
//         Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//             ->middleware('throttle:6,1');
//         Route::get('confirm-password', [ConfirmablePasswordController::class, 'show']);
//         Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
//         Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//             ->middleware(['signed', 'throttle:6,1']);
//     });
// })->withoutMiddleware(['csrf']);

// Route::middleware(['auth', 'api', 'user'])->group(function () {
    Route::get('/products/index', [ProductController::class , 'apiIndex']);
    Route::get('/products/show/{id}', [ProductController::class , 'apiShow']);
    Route::post('/products/store', [ProductController::class , 'apiStore']);
    Route::post('/products/update/{id}', [ProductController::class , 'apiUpdate']);
    Route::post('/products/delete/{id}', [ProductController::class , 'apiDestroy']);
    Route::post('/products/search', [ProductController::class, 'apiSearch']);

// });
