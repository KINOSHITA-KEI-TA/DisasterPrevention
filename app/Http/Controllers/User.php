<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        return view('userpage', compact('user'));
    }
}
