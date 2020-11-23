<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\UserChat;
use Auth;
class ChatUserSendReceive implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $msg;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id,$msg)
    {
        //
        $this->user_id = $id;
        $this->msg = $msg;

        $a = new UserChat;
        $a->user_from = Auth::user()->id;
        $a->username = Auth::user()->username;
        $a->designation = 'TEMP';
        $a->user_to = $id;
        $a->message = $msg;
        $a->pic = 'TEMP';
        $a->isRead = 'N';
        $a->save();

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.user.'. $this->user_id);
    }


    public function broadcastWith(){
        return [
            "msg" => $this->msg
        ];
    }
}
