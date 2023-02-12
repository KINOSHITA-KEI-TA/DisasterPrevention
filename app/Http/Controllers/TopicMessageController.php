<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicMessageRequest;
use App\Http\Requests\UpdateTopicMessageRequest;
use App\Models\TopicMessage;
use App\Models\Topic;

class TopicMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $topic_messages = Topic::with('messages')->find($id);
        // dd($messages);
        return view('topic_message', compact('topic_messages'));
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
    public function store( $topic, $request)
    {
        $message = new Message([
            'body' => $request->get('body')
        ]);

        $topic->messages()->save($message);

        return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopicMessage  $topicMessage
     * @return \Illuminate\Http\Response
     */
    public function show()
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
