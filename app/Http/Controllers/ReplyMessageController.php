<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReplyMessageRequest;
use App\Http\Requests\UpdateReplyMessageRequest;
use App\Models\ReplyMessage;

class ReplyMessageController extends Controller
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
     * @param  \App\Http\Requests\StoreReplyMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReplyMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReplyMessage  $replyMessage
     * @return \Illuminate\Http\Response
     */
    public function show(ReplyMessage $replyMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReplyMessage  $replyMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(ReplyMessage $replyMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReplyMessageRequest  $request
     * @param  \App\Models\ReplyMessage  $replyMessage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReplyMessageRequest $request, ReplyMessage $replyMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReplyMessage  $replyMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReplyMessage $replyMessage)
    {
        //
    }
}
