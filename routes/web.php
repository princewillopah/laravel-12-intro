<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoderController;
use App\Http\Controllers\AuthController;    
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('main-pages.about');
}); 

// Route::get('/coder/{id}', function ($id) {
//     return view('main-pages.coders-show', ['coder_id' => $id]);
// });

// Authentication routes
// Guest routes (only accessible when NOT logged in)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/login', [AuthController::class, 'postLogin'])->name('login.store');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('register.store');
});
 
// Redirect guests to login instead of throwing an error when they try to logout while not logged in via the logout link
// Redirect guests trying to access logout via GET
Route::get('/logout', function () {
    return redirect()->route('login'); // Redirect guests trying to access logout via GET
})->name('logout.redirect');

// Authenticated routes (only accessible when logged in)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Route::get('', [CoderController::class,
// ''])->name('');
Route::middleware('auth')->controller(CoderController::class)->group(function () {
    Route::get('/coders',  'index')    -> name('coders.index');
    Route::get('/coder/{id}',  'show') -> name('coders.show');
    // Route::post('/programmer/store',  'store')->name('coders.store');
    // Route::delete('/programmer/{id}',  'destroy')->name('coders.destroy');
    // Route::get('/programmer/{id}/edit',  'edit')->name('coders.edit');
    // Route::put('/programmer/{id}',  'update')->name('coders.update');
});

Route::middleware(['auth', 'isAdmin'])->controller(CoderController::class)->group(function () {
    Route::get('/programmer/create',  'create')->name('coders.create');
    Route::post('/programmer/store',  'store')->name('coders.store');
    Route::delete('/programmer/{id}',  'destroy')->name('coders.destroy');
    Route::get('/programmer/{id}/edit',  'edit')->name('coders.edit');
    Route::put('/programmer/{id}',  'update')->name('coders.update');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});


Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');