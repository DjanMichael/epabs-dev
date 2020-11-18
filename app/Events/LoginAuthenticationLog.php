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
use Auth;
use App\TableSystemEvents;
class LoginAuthenticationLog implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $icon;
    public $icon_level;
    public $title;
    public $desc;
    public $event_name;
    public $payload;
    public $created_at;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($event_name,$device)
    {
        //
        $this->event_name = $event_name;
        $this->icon = 'fas fa-robot';
        $this->icon_level = 'success';
        $this->title ='Authentication';
        $this->desc = '<b>' . Str::title(Auth::user()->name) . '</b>' . ' successfully logged in the system';
        $this->payload = json_encode([
                            'device'=> $device == "true" ? 'fas fa-mobile-alt' : 'fas fa-laptop',
                            'to_group' => 'ADMINISTRATORS,BUDGET,PLANNING'
                        ]);


        $e = new TableSystemEvents;
        $e->notif_type = 'LOGS';
        $e->from_user_id = Auth::user()->id;
        $e->to_program_id = 0;
        $e->icon = $this->icon;
        $e->icon_level = $this->icon_level;
        $e->event_name = $event_name;
        $e->event_title = $this->title;
        $e->event_description = $this->desc;
        $e->payload = $this->payload ;
        $e->isRead = 'Y';
        $e->save();

        $this->created_at = $e->created_at;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('system.events.logs');
    }

    public function broadcastWith(){
        return [
            "icon" => $this->icon,
            "icon_level" => $this->icon_level,
            "title" => $this->title,
            "desc" => $this->desc,
            "payload" => $this->payload,
            "created_at" => $this->created_at
        ];
    }
}
