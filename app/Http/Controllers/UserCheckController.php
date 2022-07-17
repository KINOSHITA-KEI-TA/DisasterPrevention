<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserCheckRequest;
use App\Http\Requests\UpdateUserCheckRequest;
use App\Models\UserCheck;

class UserCheckController extends Controller
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
     * @param  \App\Http\Requests\StoreUserCheckRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserCheckRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCheck  $userCheck
     * @return \Illuminate\Http\Response
     */
    public function show(UserCheck $userCheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCheck  $userCheck
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCheck $userCheck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserCheckRequest  $request
     * @param  \App\Models\UserCheck  $userCheck
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserCheckRequest $request, UserCheck $userCheck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCheck  $userCheck
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCheck $userCheck)
    {
        //
    }
}
