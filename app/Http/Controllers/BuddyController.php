<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuddyRequest;
use App\Http\Requests\UpdateBuddyRequest;
use App\Models\Buddy;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use APP\Models\BuddyUser;

class BuddyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('test_buddy',['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $from_user = new User();
        $from_user = Auth::user();
        // dd($to_user);
        $to_user = Auth::user();
        $to_user_id = 2;

        $buddy = new Buddy();
        $buddy->name = 'test';
        $buddy->user_id = 1;
        $buddy->status = false;
        $buddy->save();
        // dd($from_user);

        // buddies()はuseモデルのfunction
        $from_user->buddies()->attach($buddy->id);




        // return BuddyUser::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     // 'local_government_id' => $data['id'],
        // ]);




        $test_users = Auth::id();
        // dd($test_users);
        //テスト用ルート
        return view('test_buddy_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBuddyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBuddyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buddy  $buddy
     * @return \Illuminate\Http\Response
     */
    public function show(Buddy $buddy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buddy  $buddy
     * @return \Illuminate\Http\Response
     */
    public function edit(Buddy $buddy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBuddyRequest  $request
     * @param  \App\Models\Buddy  $buddy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBuddyRequest $request, Buddy $buddy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buddy  $buddy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buddy $buddy)
    {
        //
    }
}
