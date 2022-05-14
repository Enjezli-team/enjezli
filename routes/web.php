<?php

use App\Http\Controllers\admin\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auths\CustomAuthController;
//admin
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\SkillController;



use App\Http\Controllers\HomeController;


//website
use App\Http\Controllers\website\OfferHistoryController;
use App\Http\Controllers\website\WorkController;
use App\Http\Controllers\website\ProjectController;
use App\Http\Controllers\website\OfferController;
use App\Http\Controllers\website\ProfileController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



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

/**home page */
Route::get('/home', [HomeController::class, "index"]);
// Route::get('users_dashboard', function () {
//     return view("website.users.user_dashboard.index");
// })->name('user_dashboard');
Route::get('user_projects', function () {
    return view("website.users.user_dashboard.myprojects");
})->name('user_projects');
Route::get('user_offer', function () {
    return view("website.users.user_dashboard.myoffers");
})->name('user_offer');
Route::get('user_review', function () {
    return view("website.users.user_dashboard.review");
})->name('user_review');

Route::get('providers', [ProfileController::class, 'index'])->name('providers');
Route::get('providers/{id}', [ProfileController::class, 'provider_data'])->name('provider_data');
Route::get('work_data/{id}', [WorkController::class, 'work_data'])->name('work_data');
// Route::get('user_work', function () {
//     return view("website.users.user_dashboard.user_works");
// })->name('user_work');
// Route::get('work_details', function () {
//     return view("website.users.user_dashboard.work_details");
// })->name('work_details');
Route::get('progects', [ProjectController::class, 'index_without_auth'])->name('progects');
Route::get('progects/{id}', [ProjectController::class, 'show_without_auth'])->name('progect_data');
Route::get('/users_dashbord', [ProfileController::class, 'index'])->name('user_dashboard');
Route::get('/user_work', [WorkController::class, 'index'])->name('user_work');
Route::get('/work_details/{id}', [WorkController::class, 'show'])->name('work_details');
/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
// Route::get('/', function () {
//     return view('admin.pages.Home.index');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
*/
/*_____________________________*/
route::get('dashboard',function(){return view('website.users.dashboard.index');})->name('dashboard');
route::get('wallet',function(){return view('website.users.wallet.index');})->name('wallet');

Route::get('providers', [ProfileController::class, 'index'])->name('providers');
Route::get('providers/{id}', [ProfileController::class, 'provider_data'])->name('provider_data');
Route::get('work_data/{id}', [WorkController::class, 'work_data'])->name('work_data');
/*_____________________________*/

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::get('/register', [CustomAuthController::class, 'registration'])->name('register');
Route::get('/verify_email/{token}', [CustomAuthController::class, 'verify'])->name('verify');
Route::get('/verify', [CustomAuthController::class, 'verifyy'])->name('verify');
Route::get('/check_email/{id}', [CustomAuthController::class, 'check_email'])->name('check_email');
Route::get('/reset_password', [CustomAuthController::class, 'reset_password'])->name('reset_password');
Route::post('/reset_password', [CustomAuthController::class, 'updatePassword'])->name('update-password');
Route::get('/conf', [CustomAuthController::class, 'forgit_password'])->name('forgit_password');
// Route::post('/forgit_check_email', [CustomAuthController::class, 'forgit_check_email'])->name('forgit_check_email');

//start forgot password routes
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email|exists:users'], [
        'email.required' => 'يجب ادخال البريد الالكتروني .',
        'email.exists' => '  هذا البريد الالكتروني غير موجود .',
        'email.email' => 'يجب ادخال البريد الالكتروني بشكل صحيح .',
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
    ], [
        'email.exists:users' => '  البريد الالكتروني غير موجود .',

        'password.required' => 'يجب ادخال كلمة السر.',
        'password.confirmed' => 'كلمة السر غير مطابقة .',
        'email.required' => 'يجب ادخال البريد الالكتروني .',
        'email.email' => 'يجب ادخال البريد الالكتروني بشكل صحيح .',



    ]);


    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect('/login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');

//end forgot password routes


Route::post('login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('register', [CustomAuthController::class, 'create'])->name('register.custom');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::prefix('seeker')->group(function () {
    //   Route::resource('profile',ProfileController::class );
});


Route::group(['middleware' => ['auth']], function () {
    Route::resource('profiles', ProfileController::class);
    // Route::resource('offers',OfferController::class );
    // Route::resource('projects',ProjectController::class );
    Route::resource('works', WorkController::class);
    Route::get('my_works/{user_id}', [WorkController::class, 'user_works'])->name("my_works");
    Route::resource('projects', ProjectController::class);
    Route::resource('offers', OfferController::class);
    Route::get('/change_status/{project_id}/{status}', [ProjectController::class, 'changeStatus'])->name('change_status');
});

Route::resource('projects', ProjectController::class);
/*
|--------------------------------------------------------------------------
| Admins Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin']], function () {
    Route::resource('users', UserController::class);
    Route::get('/user_block/{user_id}/{blockValue}',[UserController::class, 'blockUser']);
    Route::post('/userSearch',[UserController::class, 'search']);
    Route::resource('skills', SkillController::class);
    Route::post('/skillsSearch',[SkillController::class, 'search']);
    Route::get('/skill_status/{user_id}/{status}',[SkillController::class, 'change_status']);

    // Route::resource('setting', offersController::class);
    Route::get('index', [IndexController::class, 'index'])->name('index');
});


// Route::resource('projects',ProjectController::class );
Route::resource('offers', OfferController::class);

Route::get(
    '/change_status/{project_id}/{status}',
    [ProjectController::class, 'changeStatus']
)->name('change_status');

Route::post('/offer/accept', [OfferController::class, 'acceptOffer'])->name('acceptOffer');

Route::post(
    '/offer/cancel_confirm',
    [OfferController::class, 'cancelConfirm']
)->name('cancelConfirm');

Route::post(
    '/offer/cancel',
    [OfferController::class, 'cancelOffer']
)->name('cancelOffer');


Route::post('/offer/confirm', [OfferController::class, 'confirmOffer'])->name('confirmOffer');
Route::post('/finish', [OfferController::class, 'finishWork'])->name('finishWork');
Route::post('/acceptDelivery', [OfferController::class, 'confirmDelivery'])->name('confirmDelivery');
Route::get('/My_projects', [ProjectController::class, 'My_projects'])->name('My_projects');




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
