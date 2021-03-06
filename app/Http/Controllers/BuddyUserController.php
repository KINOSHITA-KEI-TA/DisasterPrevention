<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuddyUserRequest;
use App\Http\Requests\UpdateBuddyUserRequest;
use App\Models\BuddyUser;

class BuddyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
