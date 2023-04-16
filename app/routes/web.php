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
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
//User
Auth::routes();

Route::group(['middleware' => ['auth','can:admin']], function () {
    Route::resource('hosts','HostsController');
    });

Route::group(['middleware' => 'auth','can:user'], function () {
    //DisplayControlloer
    Route::get('/search',[DisplayController::class, 'search'])->name('search');
    //UsersControlloer
    Route::get('/violation{Post}',[UsersController::class, 'violation'])->name('violation');
    Route::resource('users','UsersController');
    //Post
    //return redirectを指定しているときは下記の記述だけは必要。return viewであれば不要
    Route::resource('posts','PostsController');
    Route::resource('comments','CommentsController');
    //weight_mgmt
    Route::resource('weight_mgmts', 'WeightMgmtsController');
    //weight_goal
    Route::resource('weight_goals', 'WeightGoalsController');
    //like
    Route::post('/posts_like', 'PostsController@ajaxlike')->name('posts.ajaxlike');

});
//権限わけのためのルート
Route::get('/',[HomeController::class, 'index']);
//search
Route::get('/search',[DisplayController::class, 'search'])->name('search');


// Route::get('profile', function () {
//     // Only verified users may enter...
// })->middleware('verified');




