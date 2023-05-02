<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocalGovernmentRequest;
use App\Http\Requests\UpdateLocalGovernmentRequest;
use App\Models\LocalGovernment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LocalGovernmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()) {
            return redirect('login');
        }
        return view('local_government.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $local_governments = LocalGovernment::where('name', 'like', "%$query%")->get();
        return view('local_government.index', compact('local_governments'));
    }

    public function save(Request $request)
    {
        $user = Auth::user();
        $user->local_government_id = $request->local_government_id;
        $user->save();
        if(($user->save())) {
            return redirect('home');
        }
        return route('local_government.index');
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
