<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\GoogleController;



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
    return view('welcome');
});
Route::get('loginnew',[LoginUserController::class,'newlogin']);
Route::post('loginnewuser',[LoginUserController::class,'newloginuser']);

Route::get('viewotp', [OtpController::class, 'otpview']);
Route::post('verifyotps', [LoginUserController::class, 'verifyotp']);

Route::post('statenameget',[RegisterController::class,'getstatename']);
Route::post('citynameget',[RegisterController::class,'getcityname']);

Auth::routes();


// Route::middleware('auth:web')->group(function(){
    Route::get('livewire', function () {
        return view('livewireshow');
    });

  
    

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('pro', [App\Http\Controllers\HomeController::class, 'profileview'])->name('profile');

Route::get('indexreview',[DashboardController::class,'indexviews'])->middleware('can:indexreview');



Route::get('createfile',[ManageUserController::class,'manage_user_create'])->name('createuser')->middleware('can:createuser');
Route::post('storefile',[ManageUserController::class,'manage_user_store']);

Route::get('all_user',[ManageUserController::class,'all_user_view'])->name('allUsers');
Route::get('user_edit/{id}',[ManageUserController::class,'edit_user'])->name('useredit');
Route::post('user_update/{id}',[ManageUserController::class,'manage_user_update']);
Route::get('user_delete/{id}',[ManageUserController::class,'manage_user_delete']);

Route::POST('getstates ', [ManageUserController::class, 'fetchState']);
Route::POST('getcities ', [ManageUserController::class, 'fetchCity']);

Route::POST('getstatesdata ', [ManageUserController::class, 'fetchStatedata']);
Route::POST('getcitiesdata ', [ManageUserController::class, 'fetchCitydata']);
Route::get('/changeStatus',[ManageUserController::class,'changeStatus']);

Route::get('countrydatas',[ManageUserController::class,'countrydata']);

Route::get('profileview',[ProfileController::class,'profile'])->name('profile');
Route::post('getstate',[ProfileController::class,'fetchstate']);
Route::post('getcity',[ProfileController::class,'fetchcity']);
Route::post('profileupdated/{id}',[ProfileController::class,'profileupdate']);

Route::get('adminchangepassword',[ProfileController::class,'changepassword']);
Route::post('updatedpassword',[ProfileController::class,'updatepassword']);


Route::get('blogadd',[BlogController::class,'addblog']);
Route::get('blogview',[BlogController::class,'viewblog']);

// comment foregin key 
Route::get('comments',[BlogController::class,'comment']);



Route::post('storeblog',[BlogController::class,'blogstore'])->name('storeblogdata');
Route::get('editblogs/{id}',[BlogController::class,'editblog']);
Route::post('updateblogs/{id}',[BlogController::class,'updateblog']);
Route::get('deletedblog/{id}',[BlogController::class,'deleted']);

Route::get('/changesStatus',[BlogController::class,'changesesStatus']);



Route::get('categoryadd',[CategoryController::class,'addcategory']);
Route::post('categorystore',[CategoryController::class,'categorystore']);
Route::get('viewcate',[CategoryController::class,'viewcategory']);
Route::post('subcategorys',[CategoryController::class,'subcategory']);
Route::get('/categorystatus',[CategoryController::class,'changecateStatus']);


Route::get('memberviews',[MemberController::class,'memberview']);
Route::post('studentdata',[MemberController::class,'studentstore']);

// Role & Permisssion Managment 
Route::get('addrole',[RoleController::class,'roleadd']);
Route::post('rolestore',[RoleController::class,'storerole']);
Route::get('viewrole',[RoleController::class,'roleview']);
Route::post('save_permi',[RoleController::class,'save_permission']);

Route::get('permissionadd',[RoleController::class,'addpermission']);
Route::post('storepermi',[RoleController::class,'permistore']);



// });
Route::get('views',[MailController::class,'view']);

Route::post('sendmail',[MailController::class,'send']);




// frontend 

Route::get('viewfile',[FrontendController::class,'frontview']);
Route::get('bannercreate',[BannerController::class,'banner']);
Route::get('contectus',[FrontendController::class,'contectview']);
Route::post('contectusstore',[FrontendController::class,'usstore']);
Route::get('contectview',[FrontendController::class,'viewcontect']);

Route::get('QRCODE',[QRCodeController::class,'index']);

Route::get('generate-pdf', [PdfController::class, 'generatePDF']);

Route::get('subscribeview', [SubscriberController::class, 'viewsubscribe']);
Route::post('subscribes', [SubscriberController::class, 'subscribe']);



// google map 
Route::get('google-autocomplete', [GoogleController::class, 'googleindex']);    