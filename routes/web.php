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
Route::get('/buddy', function () {
    return view('buddy');
});
Route::get("/category", [App\Http\Controllers\CategoryController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/view_localgovernment', [App\Http\Controllers\LocalGovernmentController::class, 'addUser']);
Route::post('/save_localgovernment', [App\Http\Controllers\LocalGovernmentController::class, 'addLocalGovernment']);

// Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']);