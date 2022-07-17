<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuddyRequest;
use App\Http\Requests\UpdateBuddyRequest;
use App\Models\Buddy;

class BuddyController extends Controller
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
