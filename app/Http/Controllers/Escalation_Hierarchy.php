<?php

namespace App\Http\Controllers;

use App\User;
use App\Escalation_Hierarcie;
use App\Zone_Station_Detail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class Escalation_Hierarchy extends Controller
{
    public function add_escalation_detail(){
        $data["users"] = array();
        $data['page_title'] = "Add Escalation";
        $fmccrsid = \DB::table('users')
                    ->where('role', 'fm')
                    ->orderBy('id', 'ASC')->get();
        $zmccrsid = \DB::table('users')
                    ->where('role', 'zm')
                    ->orderBy('id', 'ASC')->get();
        $nsmccrsid = \DB::table('users')
                    ->where('role', 'nsm')
                    ->orderBy('id', 'ASC')->get();
        $data['page_description'] = "Add Escalation";
        return view('admin.escalation.add_escalation')->with($data)
        ->with('fmccrsid', $fmccrsid)
        ->with('zmccrsid', $zmccrsid)
        ->with('nsmccrsid', $nsmccrsid);
    }

    public function add_escalation(Request $request)
    {    //dd($request);
        $ccrsid = Auth::user()->ccrsid; 
        $check_ccrsid_code = \DB::table('escalation_hierarchies')->where('fmccrsid', $request->input('ccrsid'))
        ->where('zmccrsid', $request->input('ccrsid'))->first();  
        if($check_ccrsid_code == Null){
            if(isset($_POST['submit'])){ 
                $add_escalation_record = Escalation_Hierarcie::create([
                    'fmccrsid' => implode(",",$request->input('fmccrsid')),
                    'zmccrsid' => implode(",",$request->input('zmccrsid')),
                    'nsmccrsid' =>implode(",",$request->input('nsmccrsid')),
                    'created_at' => now(),
                    'updated_at' => now() 
                ]);
                $notification = array(
                    'message' => 'Record add SucessFully', 
                    'alert-type' => 'success'
                );
            }else{
                $notification = array(
                    'message' => 'Record add SucessFully', 
                    'alert-type' => 'error'
                );
            }
        } else{
            $notification = array(
                'message' => 'Duplicate Station Code', 
                'alert-type' => 'error'
            );
        }
        
        
        return redirect('admin/add_escalation_detail')->with($notification);
         

    }

    public function fm_zone_station_detail(){
        $data["users"] = array();
        $data['page_title'] = "FM Zone Satation";
        $fmccrsid = \DB::table('users')
        ->where('ccrsid','!=', '000000')
        ->orderBy('id', 'ASC')->get();
        $team = \DB::table('teams')->orderBy('id', 'ASC')->get();
        $station = \DB::table('su_stations')->orderBy('id', 'ASC')->get();
        $zone = \DB::table('zones')->orderBy('id', 'ASC')->get();
        $district = \DB::table('districts')->orderBy('id', 'ASC')->get();
        $data['page_description'] = "Add Escalation";
        return view('admin.escalation.fm_zone_station')->with($data)
        ->with('fmccrsid', $fmccrsid)
        ->with('team', $team)
        ->with('zone', $zone)
        ->with('district', $district)
        ->with('station', $station);
    }

    public function add_fm_zone_station(Request $request)
    {    //dd($request);
        $ccrsid = Auth::user()->ccrsid; 
         
         
            if(isset($_POST['submit'])){ 
                $add_escalation_record = Zone_Station_Detail::create([
                    'ccrsid' => implode(",",$request->input('ccrsid')),
                    'team' => implode(",",$request->input('team')),
                    'zone' => implode(",",$request->input('zone')),
                    'district' =>implode(",",$request->input('district')),
                    'station' =>implode(",",$request->input('station')),
                    'role' => $request->input('role'),
                    'created_at' => now(),
                    'updated_at' => now() 
                ]);
                $notification = array(
                    'message' => 'Record add SucessFully', 
                    'alert-type' => 'success'
                );
            }else{
                $notification = array(
                    'message' => 'Record add SucessFully', 
                    'alert-type' => 'error'
                );
            }
        
        
        
        return redirect('admin/fm_zone_station_detail')->with($notification);
         

    }

    public function zone_station_list(){
        $data["users"] = array();
        $data['page_title'] = "Zone Satation List";
        $zone_list = \DB::table('zone_station_details') 
                    ->orderBy('id', 'ASC')->get();  
        $data['page_description'] = "Zone Satation List";
        return view('admin.escalation.zone_station_list')->with($data)
        ->with('zone_list', $zone_list);
    }

    public function escalation_list(){
        $data["users"] = array();
        $data['page_title'] = "Escalation List";
        $escalation_list = \DB::table('escalation_hierarchies') 
                    ->orderBy('id', 'ASC')->get();  
        $data['page_description'] = "Escalation List";
        return view('admin.escalation.escalation_list')->with($data)
        ->with('escalation_list', $escalation_list);
    }
}
