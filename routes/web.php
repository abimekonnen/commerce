<?php

use Illuminate\Support\Facades\Route;
use Auth\VerificationController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dataFetchController;
use App\Http\Controllers\WelcomeController ;
use App\Http\Controllers\EmailController;

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





Route::get('/', [WelcomeController ::class, 'index'])->name('welcome');
Route::get('checkout/{id}', [WelcomeController ::class, 'checkOut'])->name('checkout');
Route::get('category/{qr}', [WelcomeController ::class, 'getCategory'])->name('getCategory');
Route::get('type/{qr}', [WelcomeController ::class, 'getType'])->name('getTypes');
Route::get('search/', [WelcomeController ::class, 'getSearch'])->name('getSearch');
Route::get('search2/', [WelcomeController ::class, 'getSearch2'])->name('getSearch2');
Route::post('comment', [EmailController ::class, 'sendComment'])->name('comment');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('profile', ProfileController::class)->middleware(['auth']);

Route::resource('product', ProductController::class)->middleware(['auth']);

Route::get('fetchData/{categoryName}', [ProductController::class,'fetchData'])->name('fetchData');



Route::resource('productTyp', ProductTypeController::class)->middleware(['auth']);

Route::resource('category',CategoryController::class)->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

});
