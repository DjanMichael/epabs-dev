<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Wfp;
use App\TableSystemEvents;

class NotifyUserWfpStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $icon;
    public $icon_level;
    public $title;
    public $desc;
    public $event_name;
    public $isRead;
    public $payload;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Wfp $wfp,$title,$desc,$event_name)
    {
            if($title =="WFP Submit"){
                $this->icon = 'flaticon2-file';
                $this->icon_level = 'info';
            }elseif($title =="WFP Approve"){
                $this->icon = 'flaticon2-file';
                $this->icon_level = 'success';
            }elseif($title =="WFP Revise"){
                $this->icon = 'flaticon2-file';
                $this->icon_level = 'danger';
            }

            $this->user_id = $wfp->user_id;
            $this->title = $title;
            $this->desc = $desc;
            $this->isRead ='N';

            $wfp_code = ["wfp_code" => $wfp->code];
            $wfp_code = json_encode($wfp_code);
            $e = new TableSystemEvents;
            $e->notif_type = 'NOTIFICATION';
            $e->from_user_id = '-2';
            $e->to_user_id =  $this->user_id;
            $e->icon = $this->icon;
            $e->icon_level = $this->icon_level;
            $e->event_name = $event_name;
            $e->event_title = $title;
            $e->event_description = $desc;
            $e->payload = $wfp_code;
            $e->isRead = $this->isRead;
            $e->save();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('wfp.notify.user.'. $this->user_id);
    }

    public function broadcastWith(){
        return [
            "icon" => $this->icon,
            "icon_level" => $this->icon_level,
            "title" => $this->title,
            "desc" => $this->desc,
            "payload" => $this->payload,
            "isRead" => $this->isRead
        ];
    }
}
