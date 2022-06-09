<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewoUserController;
use App\Http\Controllers\CreatorController;
// use App\Http\Controllers\HomeController; 
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\CrudController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OttMediaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MultiplexController;

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
    return view('auth.login');   
});
/*Route::get('/register', function () {
    return view('auth.register');   
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::view("/dashboard", 'dashboard')->name('dashboard');
// Route::view("/dashboard", [NewoUserController::class, 'dashboard'])->name('dashboard');
Route::view("/add", 'adduser');
Route::get("/newouser",[NewoUserController::class, 'newouser'])->name('newouser');

Route::get("/imagemaster",[NewoUserController::class, 'imgmaster'])->name('imagemaster');
Route::get("/addimage",[NewoUserController::class, 'addimage'])->name('addimage');

Route::get("/user",[NewoUserController::class, 'usersubscription'])->name('user');
Route::get("/media",[NewoUserController::class, 'usermedia'])->name('media');
Route::post("/adduser",[NewoUserController::class, 'adduser']);

Route::get("/dreamnewosubscribers",[NewoUserController::class, 'dreamnewosubscribers'])->name('dream-newo-subscribers');
// Route::view("viewdetails","viewdetails");
Route::get("/viewdetails/{id}",[NewoUserController::class,'showView']);

Route::view("/adddata", 'adddatapage');

Route::get("/userpayment",[NewoUserController::class, 'userpayment'])->name('userpayment');



Route::get("/crudurl",[CrudController::class,'crud']);

Route::get("/application_detail",[CrudController::class, 'application_detail'])->name('application_detail');
Route::get("/application_view_details/{id}",[CrudController::class, 'application_view_details']);

Route::post("search",[CrudController::class, 'application_detail']);

// Route::get("/application_detail",[CrudController::class, 'application_detail'])->name('application_detail');

//Route for creator section
Route::get("/creator",[CreatorController::class, 'showCreator'])->name('creator');
Route::get("/creator-video-list",[CreatorController::class, 'CreatorVideoList'])->name('video-list');
Route::get("/creator-view-details/{id}",[CreatorController::class, 'CreatorViewDetailst']);



//Route for User section
Route::get("/users",[UserController::class, 'UserList'])->name('user-list');
Route::get("/addview",[UserController::class, 'UserAddView'])->name('addview');
Route::get("/userrole",[UserController::class, 'userRole'])->name('user-role'); 
Route::get("/adduserrole",[UserController::class, 'UserAddRole'])->name('addUserRole');
Route::post("/adduser",[UserController::class, 'AddUser'])->name('adduser');
Route::post("/adduserroleaction",[UserController::class, 'AddUserRoleAction'])->name('adduserroleaction');
Route::get('userroledelete/{role_id}',[UserController::class, 'userroledelete'])->name('userroledelete');
Route::get('userrolestatuschange/{role_id}',[UserController::class, 'userrolestatuschange'])->name('userrolestatuschange');

//Route for Ott Media section
Route::get("/ottlist",[OttMediaController::class, 'ottMediaList'])->name('ottmedia-list');
Route::get("/ottaddview",[OttMediaController::class, 'addOttMedia'])->name('ottadd_view');
Route::post("/ottadd",[OttMediaController::class, 'addMedia'])->name('ottadd');
Route::get("/ottupdateview/{id}",[OttMediaController::class, 'updateOttMedia'])->name('ottupdate_view');
Route::post("/ottupdate",[OttMediaController::class, 'updateMedia'])->name('ottupdate');
Route::get('/ott/destroy/{id}',[OttMediaController::class, 'destroyOtt'])->name('destroy');
Route::get('ottstatuschng/{ott_id}',[OttMediaController::class, 'ottstatuschng'])->name('ottstatuschng');


//Route for Blog section
Route::get("/bloglist",[BlogController::class, 'blogList'])->name('blog-list');
Route::get("/blogaddview",[BlogController::class, 'blogAddView'])->name('blogadd-view');
Route::post("/blogadd",[BlogController::class, 'blogAdd'])->name('blogadd'); 
// Route::post("/blogstatuschng",[BlogController::class, 'updateBlogStatus'])->name('blogstatus');
Route::get('blogstatuschng/{role_id}',[BlogController::class, 'updateBlogStatus'])->name('blogstatuschng');

Route::get('/blog/destroy/{blog_id}',[BlogController::class, 'destroyBlog'])->name('destroy');

//Route for Image Gallery section
Route::get("/imagegallerylist",[ImageGalleryController::class, 'imageGalleryList'])->name('imagegallery-list');
Route::get("/imageaddview",[ImageGalleryController::class, 'imageAddView'])->name('imageadd-view');
Route::post("/imageadd",[ImageGalleryController::class, 'imageAdd'])->name('imageadd'); 

//Route for Game section
Route::get("/gamelist",[GameController::class, 'gameList'])->name('game-list');
Route::get("/gameaddview",[GameController::class, 'gameAddView'])->name('game-add-view');
Route::post("/gameadd",[GameController::class, 'gameAdd'])->name('game-add');
Route::get("/gameupdateview/{id}",[GameController::class, 'gameUpdateView'])->name('gameupdate_view');
Route::post("/gameupdate",[GameController::class, 'updateGame'])->name('gameupdate');
Route::get('/gamedestroy/{id}',[GameController::class, 'destroyGame'])->name('destroyGame');
Route::get('gamestatuschng/{game_id}',[GameController::class, 'gamestatuschng'])->name('gamestatuschng');

//Route for Multiplex section
Route::get("/creatorlist",[MultiplexController::class, 'creatorList'])->name('creator-list');
Route::get("/viewcreatordetails/{id}",[MultiplexController::class,'viewCreatorDetails']);
Route::get("/multiplexlist",[MultiplexController::class, 'multiplexList'])->name('multiplex-list');
Route::get("/viewmultiplexdetails/{id}",[MultiplexController::class,'viewMultiplexDetails']);
