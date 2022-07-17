<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicMessageRequest;
use App\Http\Requests\UpdateTopicMessageRequest;
use App\Models\TopicMessage;

class TopicMessageController extends Controller
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
     * @param  \App\Http\Requests\StoreTopicMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopicMessage  $topicMessage
     * @return \Illuminate\Http\Response
     */
    public function show(TopicMessage $topicMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TopicMessage  $topicMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(TopicMessage $topicMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTopicMessageRequest  $request
     * @param  \App\Models\TopicMessage  $topicMessage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicMessageRequest $request, TopicMessage $topicMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopicMessage  $topicMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopicMessage $topicMessage)
    {
        //
    }
}
