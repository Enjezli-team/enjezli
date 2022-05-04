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
Route::get('/', function () {
    return view('admin.pages.Home.index');
});
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
    // Route::resource('offers',OfferController::class );
    // Route::resource('projects',ProjectController::class );
    Route::resource('works',WorkController::class );
    Route::get('my_works/{user_id}',[WorkController::class,'user_works'] );
});
Route::resource('projects',ProjectController::class );
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

// Route::resource('projects',ProjectController::class );
Route::resource('offers',OfferController::class );
Route::get('/change_status/{project_id}/{status}', [ProjectController::class, 'changeStatus'])->name('change_status');
Route::post('/offer/accept', [OfferController::class, 'acceptOffer'])->name('acceptOffer');

Route::post('/offer/cancel_confirm', [OfferController::class, 'cancelConfirm'])->name('cancelConfirm');
Route::post('/offer/cancel', [OfferController::class, 'cancelOffer'])->name('cancelOffer');


Route::post('/offer/confirm', [OfferController::class, 'confirmOffer'])->name('confirmOffer');



// Route::get('/add_project', [ProjectsController::class, 'create']);
// Route::post('/save_project', [ProjectsController::class, 'store']);
// Route::get('/edit_project/{id}', [ProjectsController::class, 'edit'])->name('edit_project');
// Route::post('/update_project/{id}', [ProjectsController::class, 'update'])->name('update_project');
// Route::get('/change_status/{project_id}/{status}', [ProjectsController::class, 'changeStatus'])->name('change_status');
// Route::get('/offers', [OfferController::class, 'offers']);
// Route::get('/add_offer',[OfferController::class, 'create']);
// Route::post('/save_offer/{project_id}',[OfferController::class, 'store']);
// Route::get('/edit_offer/{offer_id}',[OfferController::class, 'edit']);
// Route::post('/edit_offer_save/{project_id}',[OfferController::class, 'update']);
