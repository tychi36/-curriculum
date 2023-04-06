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
Route::get('/violation',[UsersController::class, 'violation'])->name('vioration');
Route::resource('users','UsersController');
// Route::get('/editprofile',[UsersController::class, 'edit'])->name('editProfile');
// Route::post('/editprofile_update/{post}',[UsersController::class, 'update'])->name('editProfile_update');
//Post
//return redirectを指定しているときは下記の記述だけは必要。return viewであれば不要
Route::get('/',[PostsController::class, 'index']);
Route::resource('posts','PostsController');
//weight_mgmt
Route::resource('weight_mgmts', 'WeightMgmtsController');
//weight_goal
Route::resource('weight_goals', 'WeightGoalsController');
});




