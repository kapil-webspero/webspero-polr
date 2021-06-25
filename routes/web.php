<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
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

Route::get('/', function () {
    // return view('welcome');
    return view('_home');
});

// Auth::routes();


Route::get('admin-login', [LoginController::class, function() {
  return view('pages.login');
}]);
// Route::post('login', [LoginController::class,'login']);
Route::get('login', [AuthController::class, function() {
  return view('pages.loginu');
}])->name('login');

Route::post('login', [AuthController::class,'performLogin']);
Route::get('logout', [AuthController::class,'logout']);

Route::get('signup', [RegisterController::class, function() {
  return view('pages.signup');
}]);

Route::post('register', [RegisterController::class,'register'])->name('register');


// Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::post('/shorten', [LinkController::class, 'performShorten']);
// Route::post('/shorten_result', [LinkController::class, 'performShorten']);
