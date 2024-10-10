<?php


use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

//Admin Routes
Route::prefix('admin')->middleware('guest')->group(function ()
{
    Route::get('check/username/{username}', [AuthenticatedSessionController::class, 'checkusername']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('admin.loginview');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('admin.login');
    
});

Route::prefix('admin')->middleware('auth')->group(function () 
{
    
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('admin.logout');
});





//User Auth Routes

Route::middleware('guest')->group(function () {
    Route::get('check/username/{username}', [App\Http\Controllers\Frontend\Auth\AuthenticatedSessionController::class, 'checkusername']);
    Route::get('register', [App\Http\Controllers\Frontend\Auth\RegisteredUserController::class, 'create'])
        ->name('registerview');

    Route::post('register', [App\Http\Controllers\Frontend\Auth\RegisteredUserController::class, 'store']);

    Route::get('login', [App\Http\Controllers\Frontend\Auth\AuthenticatedSessionController::class, 'create'])->name('loginview');

    Route::post('login', [App\Http\Controllers\Frontend\Auth\AuthenticatedSessionController::class, 'store'])->name('login');

    Route::get('forgot-password', [App\Http\Controllers\Frontend\Auth\PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [App\Http\Controllers\Frontend\Auth\PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [App\Http\Controllers\Frontend\Auth\NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [App\Http\Controllers\Frontend\Auth\NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::middleware('auth:customer')->group(function () {
    Route::get('verify-email', [App\Http\Controllers\Frontend\Auth\EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [App\Http\Controllers\Frontend\Auth\VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [App\Http\Controllers\Frontend\Auth\EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [App\Http\Controllers\Frontend\Auth\ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [App\Http\Controllers\Frontend\Auth\ConfirmablePasswordController::class, 'store']);

    Route::get('logout', [App\Http\Controllers\Frontend\Auth\AuthenticatedSessionController::class, 'destroy'])
        ->name('customer.logout');
});