<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\CompanyProfileController;
use App\Http\Controllers\Profile\DeveloperProfileController;
use Illuminate\Support\Facades\Route;

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

Route::controller(HomeController::class)->group(static function () {
    Route::get('/', 'index')->name('home');
    Route::get('/hire', 'hire')->name('hire');
    Route::get('/choose-profile', 'chooseProfile')->name('choose-profile')->middleware('auth');
});

// Conversations
Route::post('/conversations/send-message', [ConversationController::class, 'sendMessage']);
Route::resource('conversations', ConversationController::class);

// Companies
Route::resource('companies', CompanyProfileController::class, ['names' => 'companies.profile']);

// Developers
Route::resource('developers', DeveloperProfileController::class, ['names' => 'developers.profile']);

// Auth
Route::controller(LoginController::class)->group(static function () {
    Route::get('login', 'create')->name('login')->middleware('guest');
    Route::post('login', 'store')->middleware('guest');
    Route::delete('logout', 'destroy')->name('logout');
});

// Register
Route::controller(RegisterController::class)->group(static function () {
    Route::get('register', 'create')->name('register');
    Route::post('register', 'store');
});
