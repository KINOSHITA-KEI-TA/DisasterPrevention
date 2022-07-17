<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserCategoryRequest;
use App\Http\Requests\UpdateUserCategoryRequest;
use App\Models\UserCategory;

class UserCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreUserCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function show(UserCategory $userCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCategory $userCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserCategoryRequest  $request
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserCategoryRequest $request, UserCategory $userCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCategory $userCategory)
    {
        //
    }
}
