<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auths\CustomAuthController;
//admin
use App\Http\Controllers\admin\offersController;

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\ProjectsController;

// use App\Http\Controllers\admin\SeekerController;
// use App\Http\Controllers\admin\UserController;
// use App\Http\Controllers\admin\ProjectsController;
// use App\Http\Controllers\admin\ProviderController;
// use App\Http\Controllers\admin\SkillController;
// use App\Http\Controllers\HomeController;


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
Route::get('/home',[HomeController::class,"index"]);

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


Route::get('/', [HomeController::class,'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
*/
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
    $request->validate(['email' => 'required|email']);
 
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
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'token'),
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
    Route::resource('profiles',ProfileController::class);
    // Route::resource('offers',OfferController::class );
    // Route::resource('projects',ProjectController::class );
    Route::resource('works',WorkController::class );
    Route::get('my_works/{user_id}',[WorkController::class,'user_works'] );
    Route::resource('projects',ProjectController::class );
Route::resource('offers',OfferController::class );
Route::get('/change_status/{project_id}/{status}', [ProjectController::class, 'changeStatus'])->name('change_status');
});
Route::resource('projects',ProjectController::class );
/*
|--------------------------------------------------------------------------
| Admins Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin']], function () {
    // Route::resource('users', UserController::class);
    // Route::resource('setting', offersController::class);
    
    // Route::get('index', [IndexController::class, 'index'])->name('index');
    Route::get('index', [homeController::class, 'home'])->name('admin');
    Route::get('/admin', [homeController::class, 'home'])->name('admin');
Route::get('/admin/users', [homeController::class, 'users'])->name('admin_users');
Route::get('/admin/section', [sectionController::class, 'section'])->name('section');
Route::get('/admin/skills', [skillsController::class, 'index'])->name('skills');
Route::get('/admin/projects', [ProjectsController::class, 'index'])->name('Admin_projects');
Route::get('/admin/comments', [commentsController::class, 'index'])->name('comments');
Route::get('/admin/offers', [offersController::class, 'index'])->name('offers');
Route::get('/admin/complaint', [complaintController::class, 'index'])->name('complaint');


// section CRUD
Route::get('/admin/create_section', [sectionController::class, 'create'])->name('create_section');
Route::post('/admin/add_section', [sectionController::class, 'store'])->name('add_section');
Route::post('/admin/del_section/{id}', [sectionController::class, 'destroy'])->name('delete_section');
Route::get('/admin/edit_section/{id}', [sectionController::class, 'edit'])->name('edit_section');
Route::post('/admin/update_section/{id}', [sectionController::class, 'update'])->name('update_section');
Route::get('/admin/status-update_section/{id}', [sectionController::class, 'status_update'])->name('status_update');


// skills CRUD
Route::get('/admin/create_skills', [skillsController::class, 'create'])->name('create_skills');
Route::post('/admin/add_skills', [skillsController::class, 'store'])->name('add_skills');
Route::post('/admin/del_skills/{id}', [skillsController::class, 'destroy'])->name('delete_skills');
Route::get('/admin/edit_skills/{id}', [skillsController::class, 'edit'])->name('edit_skills');
Route::post('/admin/update_skills/{id}', [skillsController::class, 'update'])->name('update_skills');
Route::get('/admin/status-update_skills/{id}', [skillsController::class, 'status_update'])->name('status_update');


// complaint messages
Route::get('/admin/complaint/messages', [complaintController::class, 'show_message'])->name('complaint_msg');

// project report
Route::get('/admin/projects_report', [projectController::class, 'report'])->name('project_report');



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
