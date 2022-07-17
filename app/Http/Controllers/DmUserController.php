<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDmUserRequest;
use App\Http\Requests\UpdateDmUserRequest;
use App\Models\DmUser;

class DmUserController extends Controller
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
     * @param  \App\Http\Requests\StoreDmUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDmUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DmUser  $dmUser
     * @return \Illuminate\Http\Response
     */
    public function show(DmUser $dmUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DmUser  $dmUser
     * @return \Illuminate\Http\Response
     */
    public function edit(DmUser $dmUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDmUserRequest  $request
     * @param  \App\Models\DmUser  $dmUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDmUserRequest $request, DmUser $dmUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DmUser  $dmUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(DmUser $dmUser)
    {
        //
    }
}
