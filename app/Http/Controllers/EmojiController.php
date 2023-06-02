<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emoji;
use App\Models\TopicMessageEmoji;


class EmojiController extends Controller
{
    //
    public function index()
    {
        $emojis = Emoji::get();
        return response()->json($emojis);
    }

    public function create(Request $request)
    {
        $emoji = new TopicMessageEmoji;
        $emoji->message_id = $request->message_id;
        $emoji->emoji_id = $request->emoji_id;
        $emoji->user_id = $request->user_id;
        $emoji->save();

        return response()->json(['success' => 'Emoji saved successfully']);
    }
}
