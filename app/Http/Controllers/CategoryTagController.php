<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryTagRequest;
use App\Http\Requests\UpdateCategoryTagRequest;
use App\Models\CategoryTag;

class CategoryTagController extends Controller
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
     * @param  \App\Http\Requests\StoreCategoryTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryTagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryTag  $categoryTag
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryTag $categoryTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryTag  $categoryTag
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryTag $categoryTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryTagRequest  $request
     * @param  \App\Models\CategoryTag  $categoryTag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryTagRequest $request, CategoryTag $categoryTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryTag  $categoryTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryTag $categoryTag)
    {
        //
    }
}
