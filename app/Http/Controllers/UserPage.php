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
        $user = User::find($request->id);
        $followUserIdArray = auth()->user()->follows()->pluck('users.id')->toArray();
        return view('userpage', compact('user','followUserIdArray'));
    }
}
