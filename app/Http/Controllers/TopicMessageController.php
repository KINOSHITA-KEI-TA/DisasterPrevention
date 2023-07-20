<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTopicMessageRequest;
use App\Http\Requests\UpdateTopicMessageRequest;
use App\Models\ReplyMessage;
use App\Models\TopicMessage;
use App\Models\Topic;
use App\Models\Category;
use App\Models\User;
use App\Models\MessageImage;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Emoji;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class TopicMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id, $id)
    {
        //
        $topic_messages = Topic::with(['messages' => function ($query) {
            $query->withTrashed();
            },
            'messages.user',
            'messages.replyTo',
            'messages.replyTo.originalMessage',
            'messages.replyMessages',
            'messages.emojiMessages',
            'messages.emojiMessages.emoji',
            'messages.images'
            ])->find($id);
            $switch = true;
            // dd($topic_messages->messages->pluck('replyTo.originalMessage'));
            // dd($topic_messages->messages);
            // dd($topic_messages->messages);
            $emojis = Emoji::get();
        $category = Category::with('topics')->find($category_id);
        // dd($category);
        $userDisplay = Auth::user()->userDisplay;
        if (!$userDisplay) {
            $userDisplay = ['display_flg' => false];
        }
        return view('topic_message', compact('topic_messages', 'category', 'id', 'switch', 'userDisplay', 'emojis'));
    }

    public function sendMessage(Request $request) : JsonResponse
    {

        $user = Auth::user();
        $message = new TopicMessage([
            'message' => $request->input('message'),
            'user_id' => $user->id,
            'topic_id' => $request->input('topic_id')
        ]);
        $message->save();
        $topic = $message->topic;

        $category_id = $topic->category->id;
        if ($request->input('is_reply') == 1 && $request->input('message_id')) {
            $reply = new ReplyMessage([
                'topic_id' => $request->input('topic_id'),
                'message_id' => $request->input('message_id'),
                'reply_id' => $message->id
            ]);
            $reply->save();
            $message->load('replyTo.originalMessage.user');
        }
        if ($request->has('image')) {
            $files = $request->file('image');
            foreach ($files as $file) {
                // ファイル名を生成 (ここでは時間とランダムな文字列、元の拡張子を使用)
                $filename = time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
                // S3に画像をアップロード
                try {
                    Storage::disk('s3')->put($filename, file_get_contents($file), 'public');
                } catch (\Exception $e) {
                    Log::error('Failed to upload image to S3: ' . $e->getMessage());
                    throw $e;
                }
                // 画像のURLを取得
                $image_url = Storage::disk('s3')->url($filename);
                // メッセージに関連する新しい画像レコードを作成
                $message->images()->create(['image_url' => $image_url]);
            }
        }

        event(new MessageSent($user, $message));

        return response()->json(['message' => $message->message]);
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
        // $message = new Message([
        //     'body' => $request->get('body')
        // ]);

        // $topic->messages()->save($message);

        // return response()->json($message);
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
     * @param  \App\Models\TopicMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(TopicMessage $topicMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTopicMessageRequest
     * @param  \App\Models\TopicMessage
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
    public function destroy($category_id, $id)
    {
        //
        // dd($id);
        $message = TopicMessage::find($id);
        $topic_id = $message->topic_id;
        if ($message->user_id != Auth::id()) {
            return redirect()->route('topic_message.index', ['category_id' => $category_id, 'id' => $topic_id]);
        }

        $message->delete();

        return redirect()->route('topic_message.index', ['category_id' => $category_id, 'id' => $topic_id]);
    }
}
