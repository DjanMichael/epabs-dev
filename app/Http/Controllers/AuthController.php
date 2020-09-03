<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use Session;


class AuthController extends Controller
{
    //
    function index()
    {
        return view('pages.auth.login');
    }

    function loginUser(Request $req)
    {
        if($req->ajax())
        {
            try {
                $credentials = ['username'=> $req->username , 'password' => $req->password];
                
                if ($req->remember_me  == 'true'){
                    if(!Auth::attempt($credentials,true))
                    {
                        return response()->json([
                            'message' => 'Unauthorized'
                        ]);
                    }
                }else{
                    if(!Auth::attempt($credentials,false))
                    {
                        return response()->json([
                            'message' => 'Unauthorized'
                        ]);
                    }
                }

                //Logout other Devices
                // Auth::logoutOtherDevices($req->password);
                
                $user = Auth::user();

                // dd($user);
    
                $tokenResult = $user->createToken('Laravel Personal Access Client');
                $token = $tokenResult->token;
                // if ($req->remember_me  == 'true'){
                //     Auth::login($user,true);
    
                //     $token->expires_at = Carbon::now()->addWeeks(1);
                //     $data["expires_at"] = Carbon::parse(
                //         $tokenResult->token->expires_at
                //     )->toDateTimeString();
                // }else{
                //     Auth::login($user,false);
                // }
                // $token = $user->createToken('Laravel Personal Access Client')->accessToken;
                $token->save();
              
        
                $data["access_token"] =  $tokenResult->accessToken;
    
                return response()->json($data);
            } catch (Throwable $e) {
                // report($e);
        
                return false;
            }
           
        }else{
            abort(404);
        }
    }

    function signUpUser(Request $req)
    {
        if($req->ajax())
        {

            $a = User::where('email',$req->email)->first();
            $b = User::where('username',$req->username)->first();

            if($a){
                return response()->json(['message'=>'email address already taken']);
            }

            if($b){
                return response()->json(['message'=>'username already taken']);

            }
            $data['email']    = $req->email;
            $data['name']    = $req->name;
            $data['username'] = $req->username;
            $data['password'] = bcrypt($req->password);
            $data['role_id'] = '3';
        
            $user = User::create($data);
    
            $ACCESS_TOKEN = $user->createToken('Laravel Personal Access Client')->accessToken;
    
            return response()->json(['access_token'=>$ACCESS_TOKEN]);
        }else{
            abort(404);
        }
    }

   

}
