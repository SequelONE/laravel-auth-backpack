<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\SocialLoginController;

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

// Auth
Auth::routes();
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Profile
Route::group(['prefix' => 'profile'], function(){
    Route::get('/', [App\Http\Controllers\Auth\UserController::class, 'profile'])->name('profile')->middleware(['auth', '2fa', 'verified']);
    Route::post('/update',[App\Http\Controllers\Auth\UserController::class, 'profileUpdate'])->name('profile.update')->middleware(['auth', '2fa', 'verified']);
    Route::post('/avatar/update', [App\Http\Controllers\Auth\UserController::class, 'uploadCropImage'])->name('profile.avatar.update')->middleware(['auth', '2fa', 'verified']);
    Route::post('/avatar/delete', [App\Http\Controllers\Auth\UserController::class, 'deleteImage'])->name('profile.avatar.delete')->middleware(['auth', '2fa', 'verified']);
    Route::get('/2fa', [App\Http\Controllers\LoginSecurityController::class, 'show2faForm'])->name('profile.2fa')->middleware(['auth', 'verified']);
});

// Settings -> 2FA
Route::group(['prefix' => 'auth'], function(){
    Route::post('/2fa/generate/secret', [App\Http\Controllers\LoginSecurityController::class, 'generate2faSecret'])->name('generate2faSecret');
    Route::post('/2fa/enable', [App\Http\Controllers\LoginSecurityController::class, 'enable2fa'])->name('enable2fa');
    Route::post('/2fa/disable', [App\Http\Controllers\LoginSecurityController::class, 'disable2fa'])->name('disable2fa');
    Route::get('/2fa/scratch', [App\Http\Controllers\LoginSecurityController::class, 'show2faFormTotp'])->name('scratch2fa');
    Route::post('/2fa/scratch', [App\Http\Controllers\LoginSecurityController::class, 'totpValidate'])->name('totp2fa');
    Route::post('/2fa/generate/password', [App\Http\Controllers\LoginSecurityController::class, 'newPassword'])->name('newTotp2fa');

    // 2fa middleware
    Route::post('/2fa/validate', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
});

// General routes
Route::get('/', [App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);
Route::get('/users', [App\Http\Controllers\Auth\UserController::class, 'users'])->name('users')->middleware(['auth', '2fa', 'verified']);
Route::get('/user/{id}', [App\Http\Controllers\Auth\UserController::class, 'user'])->name('user.view')->middleware(['auth', '2fa', 'verified']);
Route::post('/user/follow', [App\Http\Controllers\Auth\UserController::class, 'followUserRequest'])->name('follow')->middleware(['auth', '2fa', 'verified']);
Route::post('/contacts',  [App\Http\Controllers\ContactController::class, 'store'])->name('contacts');
Route::get('/mailable', function () {
    return new App\Mail\UserAuthentification();
});

// Social providers
Route::get('oauth/social/provider/{provider}/callback',[SocialLoginController::class,'providerCallback']);
Route::get('oauth/social/provider/{provider}',[SocialLoginController::class,'redirectToProvider'])->name('social.redirect');

// Pages
Route::get('{page}', [App\Http\Controllers\PageController::class, 'index'])->name('page')->where(['page' => '^(.*)$']);
