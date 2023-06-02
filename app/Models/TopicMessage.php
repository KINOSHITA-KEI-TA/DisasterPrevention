<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopicMessage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['message', 'user_id', 'topic_id'];
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replyTo()
    {
        return $this->hasOne(ReplyMessage::class, 'reply_id');
    }
    public function replyMessages()
    {
        return $this->hasMany(ReplyMessage::class, 'message_id');
    }
    public function emojiMessages()
    {
        return $this->hasMany(TopicMessageEmoji::class, 'message_id');
    }

}
