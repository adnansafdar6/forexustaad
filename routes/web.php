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
        Route::get('/test', function () {
            return view('admin.test');
        });
//        Post Routes
        Route::get('/post', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('post.index');
        Route::get('/post/{id}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('post.edit');
        Route::get('/post/{post:slug}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('post.show');
        Route::get('/post/{id}/status', [App\Http\Controllers\Admin\PostController::class, 'changeStatus'])->name('post.changeStatus');
        Route::get('/post/{id}/{type}', [App\Http\Controllers\Admin\PostController::class, 'status'])->name('post.status');
        Route::post('/post/uploadCkImage', [App\Http\Controllers\Admin\PostController::class, 'uploadCkImage'])->name('post.ckeditor');
        Route::put('/post/update/{id}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('post.update');
        Route::delete('/post/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('post.destroy');
//       Training Routes
        Route::get('/training/{id}/edit', [App\Http\Controllers\Admin\TrainingController::class, 'edit'])->name('training.edit');
        Route::get('/training/{id}/status', [App\Http\Controllers\Admin\TrainingController::class, 'changeStatus'])->name('training.changeStatus');
        Route::get('/training/{training:slug}', [App\Http\Controllers\Admin\TrainingController::class, 'show'])->name('training.show');
        Route::resource('training', 'App\Http\Controllers\Admin\TrainingController', ['except' => ['show', 'edit']]);
//        Logo Routes
        Route::get('/logo/{id}/edit', [App\Http\Controllers\Admin\LogoController::class, 'edit'])->name('logo.edit');
        Route::get('/logo/{id}/status', [App\Http\Controllers\Admin\LogoController::class, 'changeStatus'])->name('logo.changeStatus');
//        Route::get('/logo/{training:slug}', [App\Http\Controllers\Admin\TrainingController::class, 'show'])->name('training.show');
        Route::resource('logo', 'App\Http\Controllers\Admin\LogoController', ['except' => ['show', 'edit']]);
        //        Favicon Routes
        Route::get('/favicon/{id}/edit', [App\Http\Controllers\Admin\FaviconController::class, 'edit'])->name('favicon.edit');
        Route::get('/favicon/{id}/status', [App\Http\Controllers\Admin\FaviconController::class, 'changeStatus'])->name('favicon.changeStatus');
//        Route::get('/favicon/{training:slug}', [App\Http\Controllers\Admin\TrainingController::class, 'show'])->name('favicon.show');
        Route::resource('favicon', 'App\Http\Controllers\Admin\FaviconController', ['except' => ['show', 'edit']]);
        //        Sliding Image Routes
        Route::get('/slidingimage/{id}/edit', [App\Http\Controllers\Admin\SlidingimageController::class, 'edit'])->name('slidingimage.edit');
        Route::get('/slidingimage/{id}/status', [App\Http\Controllers\Admin\SlidingimageController::class, 'changeStatus'])->name('slidingimage.changeStatus');
//        Route::get('/favicon/{training:slug}', [App\Http\Controllers\Admin\TrainingController::class, 'show'])->name('favicon.show');
        Route::resource('slidingimage', 'App\Http\Controllers\Admin\SlidingimageController', ['except' => ['show', 'edit']]);
        //        Banners Routes
        Route::get('/banner/{id}/edit', [App\Http\Controllers\Admin\BannerController::class, 'edit'])->name('banner.edit');
        Route::get('/banner/{id}/changeStatus', [App\Http\Controllers\Admin\BannerController::class, 'changeStatus'])->name('banner.changeStatus');
        Route::get('/banner/{id}/status', [App\Http\Controllers\Admin\BannerController::class, 'Status'])->name('banner.status');
//        Route::get('/favicon/{training:slug}', [App\Http\Controllers\Admin\TrainingController::class, 'show'])->name('favicon.show');
        Route::resource('banner', 'App\Http\Controllers\Admin\BannerController', ['except' => ['show', 'edit']]);
        //        Apis Routes
        Route::get('/api/{id}/edit', [App\Http\Controllers\Admin\ApiController::class, 'edit'])->name('api.edit');
        Route::get('/api/{id}/changeStatus', [App\Http\Controllers\Admin\ApiController::class, 'changeStatus'])->name('api.changeStatus');
        Route::get('/api/{id}/status', [App\Http\Controllers\Admin\ApiController::class, 'Status'])->name('api.status');
//        Route::get('/favicon/{training:slug}', [App\Http\Controllers\Admin\TrainingController::class, 'show'])->name('favicon.show');
        Route::resource('api', 'App\Http\Controllers\Admin\ApiController', ['except' => ['show', 'edit']]);
        //        Sponsor Routes
        Route::get('/sponsor/{id}/edit', [App\Http\Controllers\Admin\SponsorController::class, 'edit'])->name('sponsor.edit');
        Route::get('/sponsor/{id}/changeStatus', [App\Http\Controllers\Admin\SponsorController::class, 'changeStatus'])->name('sponsor.changeStatus');
        Route::resource('/sponsor', 'App\Http\Controllers\Admin\SponsorController', ['except' => ['show', 'edit']]);
        //        Footer Routes
        Route::get('/footer/{id}/edit', [App\Http\Controllers\Admin\FooterController::class, 'edit'])->name('footer.edit');
        Route::get('/footer/{id}/changeStatus', [App\Http\Controllers\Admin\FooterController::class, 'changeStatus'])->name('footer.changeStatus');
        Route::resource('/footer', 'App\Http\Controllers\Admin\FooterController', ['except' => ['show', 'edit']]);

        //        Add User Routes
        Route::get('/adduser/{id}/edit', [App\Http\Controllers\Admin\AddUserController::class, 'edit'])->name('adduser.edit');
        Route::get('/adduser/{id}', [App\Http\Controllers\Admin\AddUserController::class, 'show'])->name('adduser.show');
        Route::get('/adduser/{id}/changeStatus', [App\Http\Controllers\Admin\AddUserController::class, 'changeStatus'])->name('adduser.changeStatus');
        Route::resource('/adduser', 'App\Http\Controllers\Admin\AddUserController', ['except' => ['show', 'edit']]);
  //        Signals Routes
        Route::get('/signal/{id}/edit', [App\Http\Controllers\Admin\SignalController::class, 'edit'])->name('signal.edit');
//        Route::get('/signal/{id}', [App\Http\Controllers\Admin\AddUserController::class, 'show'])->name('signal.show');
        Route::post('/signal/fetchPair', [App\Http\Controllers\Admin\SignalController::class, 'fetchPair'])->name('signal.fetchPair');
        Route::get('/signal/{id}/changeStatus', [App\Http\Controllers\Admin\SignalController::class, 'changeStatus'])->name('signal.changeStatus');
        Route::get('/signal/{id}/status', [App\Http\Controllers\Admin\SignalController::class, 'status'])->name('signal.status');
        Route::resource('/signal', 'App\Http\Controllers\Admin\SignalController', ['except' => ['show', 'edit']]);
  //        Pairs Routes
        Route::get('/pair/{id}/edit', [App\Http\Controllers\Admin\PairController::class, 'edit'])->name('pair.edit');
//        Route::get('/signal/{id}', [App\Http\Controllers\Admin\AddUserController::class, 'show'])->name('signal.show');
        Route::get('/pair/{id}/changeStatus', [App\Http\Controllers\Admin\PairController::class, 'changeStatus'])->name('pair.changeStatus');
        Route::resource('/pair', 'App\Http\Controllers\Admin\PairController', ['except' => ['show', 'edit']]);
  //        Broker Routes
        Route::get('/broker/{id}/edit', [App\Http\Controllers\Admin\BrokerController::class, 'edit'])->name('broker.edit');
        Route::get('/broker/{id}', [App\Http\Controllers\Admin\BrokerController::class, 'show'])->name('broker.show');
        Route::get('/broker/{id}/changeStatus', [App\Http\Controllers\Admin\BrokerController::class, 'changeStatus'])->name('broker.changeStatus');
        Route::resource('/broker', 'App\Http\Controllers\Admin\BrokerController', ['except' => ['show', 'edit']]);


        Route::resources([
            'permissions' => App\Http\Controllers\Admin\PermissionController::class,
            'role' => App\Http\Controllers\Admin\RoleController::class,
            'categories' => App\Http\Controllers\Admin\CategoryController::class,
            'subcategories' => App\Http\Controllers\Admin\SubCategoryController::class,
            'socialicon' => App\Http\Controllers\Admin\SocialIconController::class,
            'faq' => App\Http\Controllers\Admin\FaqController::class,
            'profile' => App\Http\Controllers\Admin\FaqController::class,
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
