<?php
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

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\WeightMgmtsController;

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(['middleware' => 'auth'], function() {

    
//DisplayControlloer
Route::get('/search',[DisplayController::class, 'search'])->name('search');
//UsersControlloer
Route::resource('users','UsersController');
// Route::get('/profile',[UsersController::class, 'show'])->name('profile');
Route::get('/editprofile',[UsersController::class, 'edit'])->name('editProfile');
Route::post('/editprofile_update/{post}',[UsersController::class, 'update'])->name('editProfile_update');
//PostController
//return redirectを指定しているときは下記の記述だけは必要。return viewであれば不要
Route::get('/',[PostsController::class, 'index']);
Route::resource('posts','PostsController');

// Route::get('/post',[PostsController::class, 'create'])->name('post');
// Route::post('/post_process',[PostsController::class, 'store'])->name('post_process');
// Route::get('/post_detail/{post}',[PostsController::class, 'show'])->name('postDetail');
//WeightMgmtsControlloer
Route::get('/weightRegister',[WeightMgmtsController::class, 'create'])->name('weightRegister');
Route::get('/weightUpdate',[WeightMgmtsController::class, 'edit'])->name('weightUpdate');
Route::get('/weightDetail_list',[WeightMgmtsController::class, 'index'])->name('weightDetail_list');
Route::get('/delete',[WeightMgmtsController::class, 'delete'])->name('weightLists_delete');



});




