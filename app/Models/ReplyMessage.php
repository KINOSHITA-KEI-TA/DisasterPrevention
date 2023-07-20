<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic_id',
        'message_id',
        'reply_id'
    ];

    public function originalMessage()
    {
        return $this->belongsTo(TopicMessage::class, 'message_id')->withTrashed();
    }
    public function replyToMessage()
    {
        return $this->belongsTo(TopicMessage::class, 'reply_id')->withTrashed();
    }

}
