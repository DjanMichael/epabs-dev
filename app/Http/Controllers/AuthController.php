<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use Session;
use DB;
use App\RefUnits;
use App\UserProfile;
use App\UserRoles;
use App\GlobalSystemSettings;
use Cache;
class AuthController extends Controller
{
    //
    function index()
    {
        $data["division"] = RefUnits::where('status','ACTIVE')
                                    ->where('division','!=','Admin')
                                    ->select('division') ->distinct('division')->get()->toArray();
        $data["section"] = RefUnits::where('status','ACTIVE')
                                    ->where('section','!=','Admin')
                                    ->select('section')->distinct('section')->get()->toArray();
        $data["roles"] = UserRoles::where('role_id','!=','-1')->get()->toArray();
        return view('pages.auth.login',['data'=>$data]);
    }

    function getSection(Request $req){
        if($req->ajax()){
            $data = RefUnits::where('status','ACTIVE')->where('division',$req->division)->get()->toArray();

            return view('pages.auth.select_section',['data'=>$data]);
        }else{
            abort(403);
        }
    }

    function getUnitId(Request $req){
        if($req->ajax()){
            $data = RefUnits::where('status','ACTIVE')
                            ->where('division',$req->division)
                            ->where('section',$req->section)
                            ->first();
            return $data->id;
        }else{
            abort(403);
        }

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
                $key = env('APP_NAME') . ' Personal Access Client';
                // dd($key);

                $tokenResult = $user->createToken($key);

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
                $data["unit"] = (Auth::user()->role->roles =="PROCUREMENT" ? "PROCUREMENT" : null);
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
            // $c = UserProfile::where('unit_id',$req->unit_id)->first();
            if($a){
                return response()->json(['message'=>'email address already taken']);
            }

            if($b){
                return response()->json(['message'=>'username already taken']);
            }

            // if($c){
            //     return response()->json(['message'=>'Program Manager is already registered']);
            // }

            try {
                DB::beginTransaction();

                $data['email']    = $req->email;
                $data['name']    = $req->name;
                $data['username'] = $req->username;
                $data['password'] = bcrypt($req->password);
                $data['role_id'] = $req->role_id;

                $user = User::create($data);

                $data2["user_id"] = $user->id;
                $data2["unit_id"] = $req->unit_id;
                $data2["contact"] = $req->contactno;
                $data2["pic"] = '';
                $data2["designation"] = $req->designation;

                UserProfile::create($data2);
                // $c = UserProfile::where('unit_id',$req->unit_id)->first();

                // if($c){
                //     return response()->json(['message'=>'Unit account already registered']);
                // }else{
                //     UserProfile::create($data2);
                // }

                $g = new GlobalSystemSettings;
                $g->user_id = $user->id;
                $g->save();
                DB::commit();
                $ACCESS_TOKEN = $user->createToken( env('APP_NAME') .' Personal Access Client')->accessToken;

                Auth::loginUsingId($user->id);

                return response()->json(['access_token'=>$ACCESS_TOKEN]);

            } catch (Throwable $e) {
                DB::rollback();
            }


        }else{
            abort(404);
        }
    }

    public function logoutUser(Request $req){
        Cache::forget('user-is-online-' . Auth::user() ?? Auth::user()->id);
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('login');
    }

}
