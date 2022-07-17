<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckItemRequest;
use App\Http\Requests\UpdateCheckItemRequest;
use App\Models\CheckItem;

class CheckItemController extends Controller
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
     * @param  \App\Http\Requests\StoreCheckItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCheckItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CheckItem  $checkItem
     * @return \Illuminate\Http\Response
     */
    public function show(CheckItem $checkItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CheckItem  $checkItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckItem $checkItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCheckItemRequest  $request
     * @param  \App\Models\CheckItem  $checkItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCheckItemRequest $request, CheckItem $checkItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckItem  $checkItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckItem $checkItem)
    {
        //
    }
}
