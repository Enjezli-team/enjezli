<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auths\CustomAuthController;
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
/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::get('/register', [CustomAuthController::class, 'registration'])->name('register');

Route::get('/register', function () {
    return view('auth.register');
});
Route::post('login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::post('register', [CustomAuthController::class, 'create'])->name('register.custom'); 
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::prefix('seeker')->group(function () {
    //   Route::resource('profile',ProfileController::class );
});

/*
|--------------------------------------------------------------------------
| Admins Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Route::resource('users',UserController::class);
   // Route::resource('setting',SettingController::class );
});
