<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuddyUserRequest;
use App\Http\Requests\UpdateBuddyUserRequest;
use App\Models\BuddyUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuddyUserController extends Controller
{

    // 相互フォロー
    public function addFollow(Request $request)
    {
        $addFollowId = $request->get('addFollowId');
        // フォローする user_idはフォローされる側
        auth()->user()->follows()->attach(User::find($addFollowId));
        return back();
    }

    //検索画面→ユーザー画面→フォロー
    // public function addFollowFromUserPage(Request $request){
    //     $addFollowId = $request->get('addFollowId');
    //     // フォローする user_idはフォローされる側
    //     auth()->user()->follows()->attach(User::find($addFollowId));
    //     $user = User::find($request->id);
    //     return redirect(route('showUser', ['id' => $user->id]));
    //     // if($request->getMethod() == 'GET')
    //     // {
    //     //     return view('main');
    //     // }
    //     // elseif($request->getMethod() == 'POST')
    //     // {
    //     //     return back();
    //     // }
    //     // else
    //     // {

    //     // }
    // }


    // public function addFollower()
    // {
    //     // フォロワーを追加
    //     auth()->user()->followers()->attach(User::find(2));
    // }

    public function deleteFollow(Request $request)
    {
        $loginUserId = Auth::id();
        $followerUserId = $request->get('followerId');

        DB::table('follower_user')->where(
            [
                // ['user_id','=',$loginUserId],
                // ['follower_id','=', $followerUserId]
                ['user_id','=',$followerUserId],
                ['follower_id','=', $loginUserId]
            ])->delete();
        // dd(auth()->user()->followers());
        return back();

    }

    //ユーザー検索 削除予定
    public function searchIndex(Request $request)
    {
        //ユーザー一覧をページネイトで取得
        $users = User::paginate(20);
        //検索フォームで入力された値を取得する
        $search = $request->input('search');
        //クエリビルダ
        $query = User::query();
        if($search){
            //全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
            //単語を半角スペースで区切り、配列にする
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1,PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value){
                $query->where('name', 'like', '%'.$value.'%');
            }
            $users = $query->paginate(20);
        }

        //folloer_idはログインユーザー。user_idのユーザーを、ログインユーザーがフォローしている
        //フォローしている（follower_idがログインユーザーのidである）ユーザーを配列で取得
        $followUserIdArray = auth()->user()->follows()->pluck('users.id')->toArray();
        return view('o-test.user_search',compact('users','search','followUserIdArray'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        //フォローしている（follower_idがログインユーザーのidである）ユーザーを配列で取得
        $followUserIdArray = auth()->user()->follows()->pluck('users.id')->toArray();

        return view('o-test.follow-user',compact('user','users','followUserIdArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBuddyUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBuddyUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuddyUser  $buddyUser
     * @return \Illuminate\Http\Response
     */
    public function show(BuddyUser $buddyUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuddyUser  $buddyUser
     * @return \Illuminate\Http\Response
     */
    public function edit(BuddyUser $buddyUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBuddyUserRequest  $request
     * @param  \App\Models\BuddyUser  $buddyUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBuddyUserRequest $request, BuddyUser $buddyUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuddyUser  $buddyUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuddyUser $buddyUser)
    {
        //
    }
}
