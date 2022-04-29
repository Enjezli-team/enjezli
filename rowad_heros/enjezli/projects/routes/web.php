<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auths\CustomAuthController;
//admin
use App\Http\Controllers\admin\offersController;
use App\Http\Controllers\admin\SeekerController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProjectsController;
use App\Http\Controllers\admin\ProviderController;
use App\Http\Controllers\admin\SkillController;
//website
use App\Http\Controllers\website\OfferHistoryController;
use App\Http\Controllers\website\WorkController;
use App\Http\Controllers\website\ProjectController;
use App\Http\Controllers\website\OfferController;
use App\Http\Controllers\website\ProfileController;

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
Route::get('/verify', [CustomAuthController::class, 'verify'])->name('verify');
Route::get('/check_email/{id}', [CustomAuthController::class, 'check_email'])->name('check_email');
Route::get('/reset_password', [CustomAuthController::class, 'reset_password'])->name('reset_password');
Route::get('/forgit_password', [CustomAuthController::class, 'forgit_password'])->name('forgit_password');
Route::post('/forgit_check_email', [CustomAuthController::class, 'forgit_check_email'])->name('forgit_check_email');



Route::post('login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::post('register', [CustomAuthController::class, 'create'])->name('register.custom'); 
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::prefix('seeker')->group(function () {
    //   Route::resource('profile',ProfileController::class );
});


Route::group(['middleware' => ['auth']], function () {
    Route::resource('profiles',ProfileController::class);
    Route::resource('offers',OfferController::class );
    Route::resource('projects',ProjectController::class );
    Route::resource('works',WorkController::class );
});
/*
|--------------------------------------------------------------------------
| Admins Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin'] ], function () {
     Route::resource('users',UserController::class);
    Route::resource('setting',offersController::class );
});
