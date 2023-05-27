<?php

namespace App\Events;

use App\Models\TopicMessage;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, TopicMessage $message)
    {
        $this->user = $user;
        $this->message = $message;
        if ($message->replyTo) {
            $this->message->reply_to = $message->replyTo;
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('DisasterPrevention_' . $this->message->topic_id);
    }

    public function broadcastAs()
    {
        return 'MessageSent';
    }
}
