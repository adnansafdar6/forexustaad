<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//    Admin Routes.....
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Login Routes...
    Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');

    // Registration Routes...
    Route::get('register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register'])->name('register');

    // Logout Routes...
    Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

    // Password Verify Routes...
    Route::get('email/verify', [App\Http\Controllers\Admin\Auth\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Admin\Auth\VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [App\Http\Controllers\Admin\Auth\VerificationController::class, 'resend'])->name('verification.resend');

    // Password Confirmation Routes...
    Route::get('/password/confirm', [App\Http\Controllers\Admin\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('/password/confirm', [App\Http\Controllers\Admin\Auth\ConfirmPasswordController::class, 'confirm'])->name('password.confirm');
//    , 'admin.verified'
    route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

//        Post Routes
        Route::get('/post', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('post.index');
        Route::get('/post/{id}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('post.edit');
        Route::get('/post/{post:slug}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('post.show');
        Route::get('/post/{id}/status', [App\Http\Controllers\Admin\PostController::class, 'changeStatus'])->name('post.changeStatus');
        Route::get('/post/{id}/{type}', [App\Http\Controllers\Admin\PostController::class, 'status'])->name('post.status');
        Route::post('/post/uploadCkImage', [App\Http\Controllers\Admin\PostController::class, 'uploadCkImage'])->name('post.ckeditor');
        Route::put('/post/update/{id}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('post.update');
        Route::delete('/post/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('post.destroy');
//Training Routes
        Route::get('/training/{id}/edit', [App\Http\Controllers\Admin\TrainingController::class, 'edit'])->name('training.edit');
        Route::get('/training/{id}/status', [App\Http\Controllers\Admin\TrainingController::class, 'changeStatus'])->name('training.changeStatus');
        Route::get('/training/{training:slug}', [App\Http\Controllers\Admin\TrainingController::class, 'show'])->name('training.show');
        Route::resource('training', 'App\Http\Controllers\Admin\TrainingController', ['except' => ['show', 'edit']]);

        Route::resources([
            'permissions' => App\Http\Controllers\Admin\PermissionController::class,
            'role' => App\Http\Controllers\Admin\RoleController::class,
            'categories' => App\Http\Controllers\Admin\CategoryController::class,
            'subcategories' => App\Http\Controllers\Admin\SubCategoryController::class,
        ]);
    });
});


//   Front Routes.....
Route::group([], function () {

    Route::get('adnan', function () {
        return ['mes' => [], 'flag' => true];
    });


    Route::get('login', [App\Http\Controllers\Front\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Front\Auth\LoginController::class, 'login'])->name('login');
    Route::get('register', [App\Http\Controllers\Front\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [App\Http\Controllers\Front\Auth\RegisterController::class, 'register'])->name('register');
    Route::post('logout', [App\Http\Controllers\Front\Auth\LoginController::class, 'logout'])->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', [App\Http\Controllers\Front\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\Front\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [App\Http\Controllers\Front\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [App\Http\Controllers\Front\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

    // Password Confirmation Routes...
    Route::get('email/verify', [App\Http\Controllers\Front\Auth\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Front\Auth\VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [App\Http\Controllers\Front\Auth\VerificationController::class, 'resend'])->name('verification.resend');

    Route::get('/password/confirm', [App\Http\Controllers\Front\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('/password/confirm', [App\Http\Controllers\Front\Auth\ConfirmPasswordController::class, 'confirm'])->name('password.confirm');

    Route::group([], function () {
        Route::group(['prefix' => 'front', 'as' => 'front.'], function () {
            Route::group(['middleware' => ['auth', 'verified']], function () {
                Route::get('/home', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
            });
            Route::group(['middleware' => ['password.confirm']], function () {
            });
        });
    });
});