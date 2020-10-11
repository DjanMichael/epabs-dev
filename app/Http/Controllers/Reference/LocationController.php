<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefLocation;

class LocationController extends Controller
{
    //
    public function index(){ return view('pages.reference.demographic.location'); }

    public function getLocation()
    {
        $data = RefLocation::paginate(10);
        return view('pages.reference.demographic.table.display_location',['location'=> $data]);
    }

    public function getLocationByPage(Request $request){
        if($request->ajax())
        {
            $data = RefLocation::paginate(10);
            return view('pages.reference.demographic.table.display_location',['location'=> $data]);
        }
    }

    public function getLocationSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefLocation::where('region' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('province' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('city' ,'LIKE', '%'. $query .'%')
                                        ->paginate(10);
            }else{
                $data = RefLocation::paginate(10);
            }
            return view('pages.reference.demographic.table.display_location',['location'=> $data]);
        }
    }

    public function getAddForm(){
        return view('pages.reference.demographic.form.add_location');
    }

    public function store(Request $request) {

        $check = RefLocation::find($request->location_id)
                        ? RefLocation::where([
                                            ['region', $request->region],
                                            ['province', $request->province],
                                            ['city', $request->city],
                                            ['id', '<>', $request->location_id]
                                            ])->first()
                        : RefLocation::where([
                                            ['region', $request->region],
                                            ['province', $request->province],
                                            ['city', $request->city]
                                            ])->first();

        if ($check) {
            return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
        } else {
            $check = RefLocation::find($request->location_id);
            if ($check) {
                $check->update(['region' => $request->region, 'province' => $request->province,
                                'city' => $request->city, 'outside' => $request->outside,
                                'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                RefLocation::create($request->all());
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Something went wrong']);
            }
        }

    }

}
