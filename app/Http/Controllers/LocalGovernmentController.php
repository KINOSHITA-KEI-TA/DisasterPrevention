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
        return view('local_government.index');
    }

    public function addUser() {
        $local_governments = DB::table('local_governments')->get();
        return view('add_user_info',compact('local_governments'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // dd($query);

        $local_governments = LocalGovernment::where('name', 'like', "%$query%")->get();
        // dd($local_governments);
        return view('local_government.search', compact('local_governments'));
    }

    public function save(Request $request)
    {
        // $local_government_id = $request->input('local_government_id');

        // 保存処理を実装する
        $user = Auth::user();
        // $id = Auth::id();
        $user->local_government_id = $request->local_government;
        $user->save();
        return view('main');
    }

    public function addLocalGovernment(Request $request){
        $user = Auth::user();
        $id = Auth::id();
        $user->local_government_id = $request->local_government;
        $user->save();
        return view('main');
        //ポップアップ
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
