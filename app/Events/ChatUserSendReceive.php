<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use App\UserChat;
use Auth;
class ChatUserSendReceive implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $msg;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id,$msg,$type)
    {
        //
        $this->user_id = $id;
        $this->msg = $msg;
        $this->type = $type;

        $a = new UserChat;
        $a->user_from = Auth::user()->id;
        $a->username = Auth::user()->username;
        $a->designation = 'TEMP';
        $a->user_to = $id;
        $a->message = $msg;
        $a->msg_type = $type;
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
            "from" => Auth::user()->id,
            "name" => Auth::user()->username,
            "name_1" => Str::Title(Str::substr(Str::words(Auth::user()->username,2),0,1)),
            "msg" => $this->msg,
            'type'=>  $this->type
        ];
    }
}
