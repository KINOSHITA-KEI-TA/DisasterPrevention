<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDisasterCheckRequest;
use App\Http\Requests\UpdateDisasterCheckRequest;
use App\Models\DisasterCheck;

class DisasterCheckController extends Controller
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
     * @param  \App\Http\Requests\StoreDisasterCheckRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDisasterCheckRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DisasterCheck  $disasterCheck
     * @return \Illuminate\Http\Response
     */
    public function show(DisasterCheck $disasterCheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DisasterCheck  $disasterCheck
     * @return \Illuminate\Http\Response
     */
    public function edit(DisasterCheck $disasterCheck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDisasterCheckRequest  $request
     * @param  \App\Models\DisasterCheck  $disasterCheck
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDisasterCheckRequest $request, DisasterCheck $disasterCheck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DisasterCheck  $disasterCheck
     * @return \Illuminate\Http\Response
     */
    public function destroy(DisasterCheck $disasterCheck)
    {
        //
    }
}
