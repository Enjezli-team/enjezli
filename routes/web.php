<?php
use App\Http\Controllers\ChatController;
use App\Http\Controllers\admin\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auths\CustomAuthController;
//admin
use App\Http\Controllers\admin\ComplainController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\ProjectsController;
use App\Http\Controllers\admin\offersController;



use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\reportsController;
//website
use App\Http\Controllers\website\OfferHistoryController;
use App\Http\Controllers\website\WorkController;
use App\Http\Controllers\website\ProjectController;
use App\Http\Controllers\website\OfferController;
use App\Http\Controllers\website\WalletController;

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
/** chats start */
Route::get('chats',[ChatController::class,'chats'])->name('chats');
Route::get('chats/{user}/{pro_id}',[ChatController::class,'chats_with'])->name('chats_with');
Route::get('chats_complaint/{pro_id}',[ChatController::class,'chats_complaint'])->name('chats_complaint');
Route::get('chats_problem/{pro_id}',[ChatController::class,'chats_problem'])->name('chats_problem');
Route::get('chats_solve/{pro_id}',[ChatController::class,'chats_solve'])->name('chats_solve');
Route::get('chatSend',[ChatController::class,'save']);
/**chats end  */
/**home page */
Route::get('/home', [HomeController::class, "index"]);
//contact page
Route::get('/contact',function(){ return view("website.layouts.pages.contact");})->name("contact");
//priv
Route::get('/priv',function(){ return view("website.layouts.pages.priv");})->name("oriv");


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
Route::get('/lesson/create', [NotificationController::class, 'hiNotification'])->name('home');
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
Route::get('/notify', [HomeController::class, 'notify'])->name('notify');

/* notify
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
*/
/*_____________________________*/
route::get('dashboard', function () {
    return view('website.users.dashboard.index');
})->name('dashboard');
route::get('wallet', function () {
    return view('website.users.wallet.index');
})->name('wallet');

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

    // Route::resource('setting', offersController::class);
    Route::get('index', [IndexController::class, 'index'])->name('index');
    // user
    Route::resource('users', UserController::class);
    Route::get('/user_block/{user_id}/{blockValue}',[UserController::class, 'blockUser']);
    Route::post('/userSearch',[UserController::class, 'search']);
    
    // Route::get('/usertype/{type}',[UserController::class, 'usertype']);
    
    Route::get('/user_status/{type?}',[UserController::class, 'user_upon_status']);


    
        // search
    Route::resource('skills', SkillController::class);
    Route::post('/skillsSearch', [SkillController::class, 'search']);
    Route::get('/skill_status/{user_id}/{status}', [SkillController::class, 'change_status']);
    
    // projects
    // Route::resource('projects', ProjectsController::class);
    Route::get('/project_status/{status}', [ProjectsController::class, 'project_upon_status']);
    Route::get('/project_block/{id}/{blockByAdmin}', [ProjectsController::class, 'blockProByAdmin']);
    Route::get('/project_activate/{id}/{status}', [ProjectsController::class, 'activatePro']);
    Route::post('/projectSearch', [ProjectsController::class, 'search']);
    Route::get('/project_details/{id}', [ProjectsController::class, 'show']);

    // offer
    Route::get('/offer_status/{status}', [offersController::class, 'offer_upon_status']);
    Route::get('/offer_block/{id}/{status}', [offersController::class, 'blockofferByAdmin']);
    Route::post('/offerSearch', [offersController::class, 'search']);


    // complain
    
Route::get('/Complains/unsolved', [ComplainController::class, 'loadUnsolved']); //unsoved issoved=0  شكوى
Route::get('/Complains/solved', [ComplainController::class, 'loadsolved']); //unsoved issoved=0  شكوى
Route::get('/conflict/solve/{id}', [ComplainController::class, 'loadsolutionForm'])->name('loadsolutionForm');  //issolved=1 قد حلت
Route::post('/solveConflict', [ComplainController::class, 'solveConflict'])->name('solveConflict');  
Route::post('/solveSearch', [ComplainController::class, 'search']);
Route::post('/unsolveSearch', [ComplainController::class, 'searchunsolved']);
Route::get('/complain_details/{id}', [ComplainController::class, 'show']);
Route::get('/complain_chat/{id}', [ComplainController::class, 'chat']);


});


// Route::resource('projects',ProjectController::class );
Route::resource('offers', OfferController::class);

Route::get(
    '/change_status/{project_id}/{status}',
    [ProjectController::class, 'changeStatus']
)->name('change_status');
//reports seeker and provider
Route::get('/reports', [reportsController::class, 'index'])->name('reportss');
Route::post('reports', [reportsController::class, 'filterdate'])->name('reports_filtter');
Route::post('reports', [reportsController::class, 'filter'])->name('report_filtter');

Route::get('/offer_reports', [reportsController::class, 'offers'])->name('offers');
Route::post('offer_reports', [reportsController::class, 'filteroffer'])->name('reports_filtter');
//end reports seeker and provider


Route::post(
    '/offer/cancel_confirm',
    [OfferController::class, 'cancelConfirm']
)->name('cancelConfirm');

Route::post(
    '/offer/cancel',
    [OfferController::class, 'cancelOffer']
)->name('cancelOffer');


    // Route::post('/offer/confirm', [OfferController::class, 'confirmOffer'])->name('confirmOffer');
    // Route::post('/finish', [OfferController::class, 'finishWork'])->name('finishWork');
    // Route::post('/acceptDelivery', [OfferController::class, 'confirmDelivery'])->name('confirmDelivery');

;

/**----------------------
 *    new
 *------------------------**/



Route::post('/offer/accept', [OfferController::class, 'acceptOffer'])->name('acceptOffer');
Route::post('/offer/cancel_confirm', [OfferController::class, 'cancelConfirm'])->name('cancelConfirm');
Route::get('/offer/cancel/{id}', [OfferController::class, 'cancelOffer'])->name('cancelOffer');
// Route::post('/offer/confirm', [OfferController::class, 'confirmOffer'])->name('confirmOffer');
Route::get('/offer/confirm/{offer_id}/{project_id}', [OfferController::class, 'confirmOffer'])->name('confirmOffer');


Route::post('/finish', [OfferController::class, 'finishWork'])->name('finishWork');
Route::post('/acceptDelivery', [OfferController::class, 'confirmDelivery'])->name('confirmDelivery');















Route::get('/My_projects', [ProjectController::class, 'My_projects'])->name('My_projects');
Route::group(['middleware' => 'role:seeker'], function () {
    Route::get('/My_projects', [ProjectController::class, 'My_projects'])->name('My_projects');
    Route::get('/change_status/{project_id}/{status}', [ProjectController::class, 'changeStatus'])->name('change_status');
    Route::get('projectCreate', [ProjectController::class, 'createProject'])->name('createProject');
});
Route::group(['middleware' => 'role:provider'], function () {
    Route::resource('offers', OfferController::class);
});

Route::resource('projects', ProjectController::class);
Route::get('testApi', [ProjectController::class, 'testApi']);
Route::get('/success/{response}', [OfferController::class, 'success']);
Route::get('/cancel', [OfferController::class, 'cancel']);
Route::post('/search', [ProjectController::class, 'search'])->name('search');
Route::get('/transactions', [WalletController::class, 'showTransactions'])->name('transactions');
Route::get('/transactions/{id}', [WalletController::class, 'showUserTransactions']);

Route::get('/reject/{id}', [OfferController::class, 'loadRejectForm'])->name('reject');
Route::post('rejectDelivery', [OfferController::class, 'rejectDelivery'])->name('rejectDelivery');
Route::get('/loadComplainForm/{id}', [OfferController::class, 'loadComplainForm'])->name('ComplainForm');
Route::post('Complain', [OfferController::class, 'Complain'])->name('Complain');





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
