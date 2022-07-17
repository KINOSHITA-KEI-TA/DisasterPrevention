<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFamilyHierarchyRequest;
use App\Http\Requests\UpdateFamilyHierarchyRequest;
use App\Models\FamilyHierarchy;

class FamilyHierarchyController extends Controller
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
     * @param  \App\Http\Requests\StoreFamilyHierarchyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFamilyHierarchyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FamilyHierarchy  $familyHierarchy
     * @return \Illuminate\Http\Response
     */
    public function show(FamilyHierarchy $familyHierarchy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FamilyHierarchy  $familyHierarchy
     * @return \Illuminate\Http\Response
     */
    public function edit(FamilyHierarchy $familyHierarchy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFamilyHierarchyRequest  $request
     * @param  \App\Models\FamilyHierarchy  $familyHierarchy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFamilyHierarchyRequest $request, FamilyHierarchy $familyHierarchy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FamilyHierarchy  $familyHierarchy
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamilyHierarchy $familyHierarchy)
    {
        //
    }
}
