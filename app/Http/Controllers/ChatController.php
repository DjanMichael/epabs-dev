<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatUserSendReceive;
use App\UserChat;
use App\User;
use Auth;
class ChatController extends Controller
{
    public $user_id;

    public function __construct(){
        $this->middleware(function ($request, $next) {
            $this->user_id = Auth::user()->id;
            return $next($request);
        });
    }

    public function index(){
        return view('pages.chat.chat');
    }

    public function getChatUsersList(Request $req){
        if($req->ajax()){
            $chat  = UserChat::where('user_to', $this->user_id)
                            ->orWhere('user_from', $this->user_id)
                            ->groupBy(['user_to','user_from'])
                            ->select('user_from','user_to')->get();

            // dd($chat);
            //sort out all users to get all in and out message Ids for this user
            $temp = [];
            foreach($chat as $row){
                //building the array for users convos ID
                if ($row->user_from == $this->user_id){
                    if(!in_array($row->user_to,$temp)){
                        array_push($temp, $row->user_to);
                    }
                }else{
                    if(!in_array($row->user_from,$temp)){
                        array_push($temp, $row->user_from);
                    }
                }
            }

            $data["chat_user_list"] = User::whereIn('id',$temp)->get();

            // dd($data);
            return view('pages.chat.component.chat_user_list',['data'=>$data]);
        }else{
            abort(403);
        }
    }

    public function getChatConvoUsersById(Request $req){
        if($req->ajax()){
            $data["chat_user_content"] = UserChat::where(fn($q) =>
                                                        $q->where('user_from',$this->user_id)
                                                        ->where('user_to',$req->id)
                                                    )
                                                    ->orWhere(fn($q) =>
                                                        $q->where('user_from',$req->id)
                                                        ->where('user_to',$this->user_id)
                                                    )
                                                    ->get();

            return view('pages.chat.component.chat_user_content',['data'=>$data]);
        }else{
            abort(403);
        }
    }

    public function getChatInitDisplayContent(Request $req){
        if($req->ajax()){
            $data["chat_user_content"]= [];
            return view('pages.chat.component.chat_user_content',['data'=>$data]);
        }else{
            abort(403);
        }
    }

    public function sendMessageToUser(Request $req){

        if($req->ajax()){
            //send to receipient and not going to push to origin for duplicate pushing. using ->toOthers()
            broadcast(new ChatUserSendReceive($req->send_to,$req->msg))->toOthers();
        }else{
            abort(403);
        }

    }


}
