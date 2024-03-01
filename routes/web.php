<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
/* Authentication Routes*/
// Login and Logout Routes...
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class,'login']);
Route::get('logout',  [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

// Registration Routes...
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'reset'])->name('password.update');

// Confirm Password
Route::get('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

// Email Verification Routes...
Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::get('email/resend',  [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');


Route::get('/',[\App\Http\Controllers\IndexController::class,'home'])->name('index');

/*
|-----------------------
| Authenticated Routes
|-----------------------
*/
//Route::middleware(['auth','verified'])->group(function () {
Route::middleware(['auth'])->group(function () {

    /*
    |---------------
    | USER ROUTES
    |---------------
    */
    Route::middleware(['public_user'])->group(function () {
        Route::get('/home', [\App\Http\Controllers\Public\HomeController::class, 'index'])->name('home');
    });



    /*
    |--------------
    | ADMIN ROUTES
    |--------------
    */
    Route::prefix('admin/')->middleware(['admin_user'])->name('admin.')->group(function () {
        //  Admin Routes
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');

        // Access Control routes
        Route::resource('admins',  App\Http\Controllers\Auth\AdminController::class);
        Route::resource('users',  App\Http\Controllers\Auth\UserController::class);
        Route::resource('roles',  App\Http\Controllers\Auth\RoleController::class);
        Route::resource('permissions',  App\Http\Controllers\Auth\PermissionController::class);

        //  Location Routes
        Route::resource('countries', \App\Http\Controllers\Admin\Location\CountryController::class);
        Route::get('/address',[\App\Http\Controllers\Admin\Location\AddressController::class, 'index'])->name('addresses');

        //  User Logs
        Route::resource('activity-logs',  \App\Http\Controllers\Admin\UserLog\ActivityLogController::class);
        Route::resource('authentication-logs',  \App\Http\Controllers\Admin\UserLog\AuthenticationLogController::class);

        // Backups Routes
        Route::prefix('backups/')->name('backups.')->group(function () {
            Route::get('/', [ \App\Http\Controllers\Admin\System\BackupController::class, 'index'])->name('index');
            Route::get('create', [ \App\Http\Controllers\Admin\System\BackupController::class, 'create'])->name('create');
            Route::DELETE('destroy/{backup}', [ \App\Http\Controllers\Admin\System\BackupController::class, 'destroy'])->name('destroy');
            Route::get('download/{backup}', [ \App\Http\Controllers\Admin\System\BackupController::class, 'download'])->name('download');
        });

        // Configurations Routes
        Route::prefix('config')->name('configs.')->group(function () {
            Route::get('/', [ \App\Http\Controllers\Admin\System\ConfigController::class, 'index'])->name('index');
            // Email
            Route::get('email/edit', [ \App\Http\Controllers\Admin\System\ConfigController::class, 'emailEdit'])->name('email.edit');
            Route::post('email/update', [ \App\Http\Controllers\Admin\System\ConfigController::class, 'emailUpdate'])->name('email.update');
            // DATABASE
            Route::get('db/edit', [ \App\Http\Controllers\Admin\System\ConfigController::class, 'dbEdit'])->name('db.edit');
            Route::post('db/update', [ \App\Http\Controllers\Admin\System\ConfigController::class, 'dbUpdate'])->name('db.update');
            // APPLICATION
            Route::get('app/edit', [ \App\Http\Controllers\Admin\System\ConfigController::class, 'appEdit'])->name('app.edit');
            Route::post('app/update', [ \App\Http\Controllers\Admin\System\ConfigController::class, 'appUpdate'])->name('app.update');
        });

    });

});


