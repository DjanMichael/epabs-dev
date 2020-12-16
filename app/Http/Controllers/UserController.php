<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function index(){ return view('pages.reference.user.user'); }

    public function fetchUser(){
        $data = User::join('users_profile', 'users_profile.user_id', '=', 'users.id')
                    ->join('ref_units', 'ref_units.id', '=', 'users_profile.unit_id')
                    ->join('tbl_user_roles', 'tbl_user_roles.role_id', '=', 'users.role_id')
                    ->select('user_id as id', 'users.name', 'email', 'contact', 'roles', 'designation', 'division', 'section', 'users.status')
                    ->paginate(10);
        return $data;
    }

    public function getUser(){
        return view('pages.reference.user.table.display_user',['user'=> $this->fetchUser()]);
    }

    public function getUserByPage(Request $request){
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest){
            return view('pages.reference.user.table.display_user',['user'=> $this->fetchUser()]);
        } else {
            abort(403);
        }
    }

    public function getUserBySearch(Request $request){
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest){
            $query = $request->q;
            if($query != ''){
                $data = User::join('users_profile', 'users_profile.user_id', '=', 'users.id')
                            ->join('ref_units', 'ref_units.id', '=', 'users_profile.unit_id')
                            ->join('tbl_user_roles', 'tbl_user_roles.role_id', '=', 'users.role_id')
                            ->select('user_id as id', 'users.name', 'email', 'contact', 'roles', 'designation', 'division', 'section', 'users.status')
                            ->where('users.name' ,'LIKE', '%'. $query .'%')
                            ->orWhere('email' ,'LIKE', '%'. $query .'%')
                            ->orWhere('roles' ,'LIKE', '%'. $query .'%')
                            ->paginate(10);
            } else {
                $data = $this->fetchUser();
            }
            return view('pages.reference.user.table.display_user',['user'=> $data]);
        } else {
            abort(403);
        }
    }

    public function changeAccountStatus(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest){
            try {
                $userExist = User::find($request->id);
                if ($userExist) {
                    $userExist->update(['status' => $request->status]);
                    return response()->json(['message'=>'Successfully change account status','type'=>'update']);
                } else {
                    return response()->json(['message'=>'Sorry, looks like there are some errors detected, please try again.', 'type'=>'error']);
                }
            } catch (\Illuminate\Database\QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                return response()->json(['message'=>'Something went wrong', 'type'=>'error']);
            }
        } else {
            abort(403);
        }

    }

    public function resetPassword(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest){
            try {
                $check = User::find($request->id);
                if ($check) {
                    $check->update(['password' => bcrypt('123456')]);
                    return response()->json(['message'=>'Successfully reset password','type'=>'update']);
                } else {
                    return response()->json(['message'=>'Sorry, looks like there are some errors detected, please try again.', 'type'=>'error']);
                }
            } catch (\Illuminate\Database\QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                return response()->json(['message'=>'Something went wrong', 'type'=>'error']);
            }
        } else {
            abort(403);
        }

    }

}
