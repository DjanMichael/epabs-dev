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
use App\PpmpComments;
use Auth;
use Illuminate\Support\Str;
class NotifyUserPpmpStatus  implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $program_id;
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
        $this->program_id = $wfp->program_id;
        if($event_name == "PPMP Update"){
            if($title == "PPMP Submit"){
                $this->icon = 'flaticon2-file';
                $this->icon_level = 'info';
            }else if($title == "PPMP Approve"){
                $this->icon = 'flaticon2-file';
                $this->icon_level = 'success';
            }else if($title == "PPMP Revise"){
                $this->icon = 'flaticon2-file';
                $this->icon_level = 'danger';
            }
            $this->title = $title;
            $this->desc = $desc;
            $this->isRead ='N';

            $wfp_code = ["wfp_code" => $wfp->code];
            $wfp_code = json_encode($wfp_code);

            $e = new TableSystemEvents;
            $e->notif_type = 'NOTIFICATION';
            $e->from_user_id = Auth::user()->id;
            $e->to_program_id =  $this->program_id;
            $e->icon = $this->icon;
            $e->icon_level = $this->icon_level;
            $e->event_name = $event_name;
            $e->event_title = $this->title;
            $e->event_description = $this->desc;
            $e->payload = $wfp_code;
            $e->isRead = $this->isRead;
            $e->save();

        }else if($event_name == "PPMP Comment"){
            $this->icon = 'flaticon-chat';
            $this->icon_level = 'primary';
            $this->title = $title;
            $this->desc =  '<b>'  . Str::title(Auth::user()->name) . '</b>' . ' commented on your PPMP';
            $this->isRead ='N';

            $wfp_code = ["wfp_code" => $wfp->code];
            $wfp_code = json_encode($wfp_code);


            $e = new TableSystemEvents;
            $e->notif_type = 'NOTIFICATION';
            $e->from_user_id = Auth::user()->id;
            $e->to_program_id =  $this->program_id;
            $e->icon = $this->icon;
            $e->icon_level = $this->icon_level;
            $e->event_name = $event_name;
            $e->event_title = $this->title;
            $e->event_description = $this->desc;
            $e->payload = $wfp_code;
            $e->isRead = $this->isRead;
            $e->save();
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('wfp.notify.user.ppmp.'. $this->program_id);
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
