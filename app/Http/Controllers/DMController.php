<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDMRequest;
use App\Http\Requests\UpdateDMRequest;
use App\Models\DM;

class DMController extends Controller
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
     * @param  \App\Http\Requests\StoreDMRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDMRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DM  $dM
     * @return \Illuminate\Http\Response
     */
    public function show(DM $dM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DM  $dM
     * @return \Illuminate\Http\Response
     */
    public function edit(DM $dM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDMRequest  $request
     * @param  \App\Models\DM  $dM
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDMRequest $request, DM $dM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DM  $dM
     * @return \Illuminate\Http\Response
     */
    public function destroy(DM $dM)
    {
        //
    }
}
