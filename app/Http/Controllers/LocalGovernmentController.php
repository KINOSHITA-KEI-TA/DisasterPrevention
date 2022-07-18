<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocalGovernmentRequest;
use App\Http\Requests\UpdateLocalGovernmentRequest;
use App\Models\LocalGovernment;
use Illuminate\Support\Facades\DB;

class LocalGovernmentController extends Controller
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

    public function addUser() {
        $local_governments = DB::table('local_governments')->get();
        // dd($local_governments);
        foreach($local_governments as $local_government){
            // dd($local_government);
        }

        // return view('add_user_info');
        // return compact('add_user_info', $local_governments);
        return view('add_user_info',compact('local_governments'));
        // return view('add_user_info',compact($local_governments));
    }

    public function addLocalGovernment(){
        
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
     * @param  \App\Http\Requests\StoreLocalGovernmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocalGovernmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocalGovernment  $localGovernment
     * @return \Illuminate\Http\Response
     */
    public function show(LocalGovernment $localGovernment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocalGovernment  $localGovernment
     * @return \Illuminate\Http\Response
     */
    public function edit(LocalGovernment $localGovernment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocalGovernmentRequest  $request
     * @param  \App\Models\LocalGovernment  $localGovernment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocalGovernmentRequest $request, LocalGovernment $localGovernment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocalGovernment  $localGovernment
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocalGovernment $localGovernment)
    {
        //
    }
}
