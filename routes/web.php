<?php

use Illuminate\Support\Facades\Route;
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
    return view('main');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/mypage', function () {
    return view('mypage');
});
// Route::get('/buddy', function () {
//     return view('buddy');
// });
Route::get('/buddy',[App\Http\Controllers\BuddyController::class,'myrequestlist'])->name('buddy_user.index');
// buddyテスト用
// Route::get('/test_buddy', function () {
//     return view('test_buddy');
// });
Route::get('test_buddy',[App\Http\Controllers\BuddyController::class,'create'])->name('buddy_test.create');
Route::get('test_buddy_index',[App\Http\Controllers\BuddyController::class,'index'])->name('buddy_test.index');
Route::post('test_buddy_create',[App\Http\Controllers\BuddyController::class,'create'])->name('buddy_register.create');
//ここまで

Route::get("/category", [App\Http\Controllers\CategoryController::class, 'index']);
Route::post("/create", [App\Http\Controllers\CategoryController::class, 'create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/view_localgovernment', [App\Http\Controllers\LocalGovernmentController::class, 'addUser']);
Route::post('/save_localgovernment', [App\Http\Controllers\LocalGovernmentController::class, 'addLocalGovernment']);

// Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']);

// 相互フォロー
Route::post('/follow',[App\Http\Controllers\BuddyUserController::class, 'addFollow'])->name('addFollow');
Route::get('/testusers',[App\Http\Controllers\BuddyUserController::class, 'index'])->name('index');
Route::get('/testfollow',[App\Http\Controllers\BuddyUserController::class, 'addFollower'])->name('addFollower');
// 解除
Route::post('/deletefollow',[App\Http\Controllers\BuddyUserController::class, 'deleteFollow'])->name('deleteFollow');

//ユーザー検索(仮置き)
Route::get('/usersearch',[App\Http\Controllers\BuddyUserController::class, 'searchIndex'])->name('searchIndex');

//ユーザーマイページ
