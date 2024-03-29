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
Route::middleware(['web'])->group(function () {
    // ...
});
// Route::get('/', function () {
//     return view('main');
// });
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/mypage_list', function () {
    return view('mypage_list');
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

// カテゴリからトピックまでのルーティング
Route::get("/category", [App\Http\Controllers\CategoryController::class, 'index']);
Route::post("/create", [App\Http\Controllers\CategoryController::class, 'create']);
Route::get('/category/{id}/topic', [App\Http\Controllers\TopicController::class, 'index']);
Route::post('/topic/create', [App\Http\Controllers\TopicController::class, 'create']);
Route::get('/topic/topic_message/{category_id}/{id}', [App\Http\Controllers\TopicMessageController::class,'index'])->name('topic_message.index');
Route::post('/topic_message', [App\Http\Controllers\TopicMessageController::class, 'sendMessage'])->name('message.send');
Route::post('/update-display-flag', [App\Http\Controllers\UserDisplayController::class, 'updateDisplayFlag']);
Route::get('/get-replies/{messageId}', [App\Http\Controllers\ReplyMessageController::class, 'getReplies']);
Route::post('/message/{category_id}/{id}/delete', [App\Http\Controllers\TopicMessageController::class,'destroy']);
Route::get('/emojis', [App\Http\Controllers\EmojiController::class,'index']);
Route::post('/emojis/create', [App\Http\Controllers\EmojiController::class, 'create']);

// 利用規約
Route::get("/rules", function () {
    return view('rules');
});
// プライバシーポリシー
Route::get("/privacy", function () {
    return view('privacy_policy');
});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 自治体登録画面、検索、保存
Route::get('/localgovernment', [App\Http\Controllers\LocalGovernmentController::class, 'index'])->name('local_government.index');
Route::post('/localgovernment_search', [App\Http\Controllers\LocalGovernmentController::class, 'search'])->name('local_government.search');
Route::post('/localgovernment_save', [App\Http\Controllers\LocalGovernmentController::class, 'save'])->name('local_government.save');


// Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']);

// 相互フォロー /testusersで実験可能
Route::post('/follow',[App\Http\Controllers\BuddyUserController::class, 'addFollow'])->name('addFollow');
Route::get('/testusers',[App\Http\Controllers\BuddyUserController::class, 'index'])->name('FollowIndex');
Route::get('/testfollow',[App\Http\Controllers\BuddyUserController::class, 'addFollower'])->name('addFollower');
//検索画面→ユーザー画面→フォロー
Route::get('/addFollowFromUserPage', [App\Http\Controllers\UserPage::class, 'showUser'])->name('addFollowFromUserPage');
Route::post('/userpage/{id}', [App\Http\Controllers\UserPage::class, 'showUser'])->name('addFollowFromUserPage');

// 解除
Route::post('/deletefollow',[App\Http\Controllers\BuddyUserController::class, 'deleteFollow'])->name('deleteFollow');

//ユーザー検索(仮置き)
Route::get('/usersearch',[App\Http\Controllers\BuddyUserController::class, 'searchIndex'])->name('searchIndex');

//ユーザーマイページ
// Route::get('/mypage', [App\Http\Controllers\UserPage::class, 'show'])->name('mypage');
Route::get('/userpage/{id}', [App\Http\Controllers\UserPage::class, 'showUser'])->name('showUser');
Route::post('/userpage/{id}', [App\Http\Controllers\UserPage::class, 'showUser'])->name('showUser');
Route::get('/userpage/{id}/edit', [App\Http\Controllers\UserPage::class, 'edit'])->name('edit');
Route::post('/userpage/{id}/update', [App\Http\Controllers\UserPage::class, 'update'])->name('update');

//テスト用ページ一覧
Route::get('/testpagelist', function(){
    return view('o-test.pagelist');
});
