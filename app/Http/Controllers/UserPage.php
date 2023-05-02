<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserPage extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('userpage', compact('user'));
    }

    public function showUser(Request $request){
        if(Auth::check()){
        $user = User::find($request->id);
        $followUserIdArray = auth()->user()->follows()->pluck('users.id')->toArray();
        return view('userpage', compact('user','followUserIdArray'));
        }
        return redirect('/login');
    }

    public function edit(Request $request)
    {
        $userId = (int) $request->route('id');
        $user = User::where('id', $userId)->firstOrFail();
        return view('userpage_edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->nickname = $request->input('nickname');
        // $user->local_government_id = $request->input('local_government_id');
        $user->save();
        return redirect()->route('showUser', ['id' => $id])->with('success', '更新しました');
    }
}
