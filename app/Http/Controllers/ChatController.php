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
            if($req->q != '' || $req->q != null){
                // $chat  = UserChat::join('users','users.id','tbl_users_chat_messages.user_from')
                //                 ->where('user_to', $this->user_id)
                //                 // ->orWhere('user_from', $this->user_id)
                //                 ->groupBy(['user_to','user_from'])
                //                 ->select(
                //                     'tbl_users_chat_messages.user_from',
                //                     'tbl_users_chat_messages.user_to',
                //                     'users.name',
                //                     'users.email'
                //                 )
                //                 ->where(fn($q) =>
                //                     $q->where('name', 'LIKE' , '%' .$req->q . '%')
                //                     ->orWhere('email', 'LIKE' , '%' .$req->q . '%')
                //                 )
                //                 ->get();

                $chat = User::where(fn($q) =>
                                    $q->where('name', 'LIKE' , '%' .$req->q . '%')
                                    ->orWhere('email', 'LIKE' , '%' .$req->q . '%')
                                )->get();
            }else{
                // $chat  = UserChat::where('user_to', $this->user_id)
                //                 ->orWhere('user_from', $this->user_id)
                //                 ->groupBy(['user_to','user_from'])
                //                 ->select('user_from','user_to')->get();
                $chat = User::all();
            }

            // dd($chat);
            //sort out all users to get all in and out message Ids for this user
            // $temp = [];
            // foreach($chat as $row){
            //     // //building the array for users convos ID
            //     if ($row->user_from == $this->user_id){
            //         if(!in_array($row->user_to,$temp)){
            //             array_push($temp, $row->user_to);
            //         }
            //     }else{
            //         if(!in_array($row->user_from,$temp)){
            //             array_push($temp, $row->user_from);
            //         }
            //     }
            // }

            $temp = [];
            foreach($chat as $row){
                if(!in_array($row->id,$temp)){
                    array_push($temp, $row->id);
                }
            }

            $data["chat_user_list"] = User::whereIn('id',$temp)
                                            ->where('id','!=',$this->user_id)
                                            ->get();

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

    public function updateUnreadMessageToRead(Request $req){
        if($req->ajax()){
            $a = new UserChat;
            $a->updateUnreadMessageToRead($req->from_id);
        }
    }
}
