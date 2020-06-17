<?php

namespace App\Http\Controllers;

use App\Dr_Case;
use App\Item;
use App\Item_Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ItemController extends Controller
{

    public function add_item_post(){
       
        $data["users"] = array();
        $data['page_title'] = "Add Item";
        $data['page_description'] = "Add Item";
        return view('admin.item.add_item')->with($data);
    }

    public function item_list(){
       
        $item_list = \DB::table('items')->where('is_deleted', '0')
                            ->orderBy('id', 'ASC')->get();
        $data['item_list'] = $item_list;
        return view('admin.item.item_list') ->with($data);
    }

    public function add_item(Request $request)
    {    
        $ccrsid = Auth::user()->ccrsid; 
        $check_item_code = \DB::table('items')->where('item_code', $request->input('item_code'))->first(); 
        if($check_item_code == Null){
            if(isset($_POST['submit'])){
            
                $add_item_record = Item::create([
                    'item_code' => $request->input('item_code'),
                    'item_name' => $request->input('item_name'),
                    'description' => $request->input('description'),
                    'sale_price' => $request->input('sale_price'),
                    'mrp' => $request->input('mrp'),
                    'finish_item_code' => $request->input('finish_item_code'),
                    'lock_yn' => $request->input('lock_yn'),
                    'brand_type_code' => $request->input('brand_type_code'), 
                    'moh' => 'N',
                    'shipper_qty' => $request->input('shipper_qty'),
                    'reg_no' => $request->input('reg_no'),
                    'date_con' => now(),
                    'user_name_con' => $ccrsid,
                    'is_approved' => 0,
                    'is_deleted' => 0
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
                'message' => 'Duplicate Item Code', 
                'alert-type' => 'error'
            );
        }
        
        
        return redirect('admin/add_item_post')->with($notification);
         

    }

    public function edit_item($id){
        $update_item = \DB::table('items')->where('id', $id)->first(); 
        $data['update_item'] = $update_item;
        return view('admin.item.update_item_list') ->with($data);
    }

    public function update_item(Request $request, $id){
        if(isset($_POST['update'])){
            $update_item = DB::table('items')->where('id', $id)
                            ->update(['item_code' => $request->input('item_code'),
                            'item_name' => $request->input('item_name'),
                            'description' => $request->input('description'),
                            'sale_price' => $request->input('sale_price'),
                            'mrp' => $request->input('mrp'),
                            'finish_item_code' => $request->input('finish_item_code'),
                            'lock_yn' => $request->input('lock_yn'),
                            'brand_type_code' => $request->input('brand_type_code'), 
                            'moh' => 'N',
                            'shipper_qty' => $request->input('shipper_qty'),
                            'reg_no' => $request->input('reg_no'),
                            'date_con' => now()]);
             $notification = array(
                                'message' => 'Case Submit SucessFully', 
                                'alert-type' => 'success'
                            );
        }else{
            $notification = array(
                'message' => 'Something Wrong', 
                'alert-type' => 'error'
            );
        }
        
        return redirect("admin/item_list")->with($notification);
    }
   
    public function delete_item($id){
        $user_delete_update = \DB::table('items')->where("id", "=" , $id)->update(['is_deleted' => 1]); 
        return redirect()->route('item_list');
    }

    public function item_team_list(){
       
        $item_list = \DB::table('items')->where('is_deleted', '0')
                            ->orderBy('id', 'ASC')->get();
        $team_list = \DB::table('teams')->orderBy('id', 'ASC')->get();
        return view('admin.item.item_team') 
        ->with('item_list', $item_list)
        ->with('team_list', $team_list);
    }

    public function item_team(Request $request)
    {    
        $ccrsid = Auth::user()->ccrsid; 
        $check_item_code = \DB::table('items_teams')->where('item_code', $request->input('item_code'))
        ->where('team_id', $request->input('team_id'))->first();  
        if($check_item_code == Null){
            if(isset($_POST['submit'])){
            
                $add_item_record = Item_Team::create([
                    'item_code' => $request->input('item_code'),
                    'team_id' => $request->input('team_id'),
                    'year_id' => $request->input('year_id'),
                    'item_code_ps' => $request->input('item_code_ps'),
                    'product_family' => $request->input('product_family'),
                    'finish_item_code' => $request->input('finish_item_code'),
                    'item_seq_no' => $request->input('item_seq_no'), 
                    'lock_yn' => 'N',
                    'maj_prd_share' => 'N'
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
                'message' => 'Duplicate Item Code', 
                'alert-type' => 'error'
            );
        }
        
        
        return redirect('admin/item_team_list')->with($notification);
         

    }


    //station Detail

    public function add_station_detail(){
        $data["users"] = array();
        $data['page_title'] = "Add Station";
        $data['page_description'] = "Add Station";
        return view('admin.station.add_station')->with($data);
    }

    public function add_station(Request $request)
    {    
        $ccrsid = Auth::user()->ccrsid; 
        $check_station_code = \DB::table('su_stations')->where('station_id', $request->input('station_id'))
        ->where('station_code', $request->input('station_code'))->first();  
        if($check_station_code == Null){
            if(isset($_POST['submit'])){
            
                $add_station_record = Su_Station::create([
                    'station_id' => $request->input('station_id'),
                    'station' => $request->input('station'),
                    'station_code' => $request->input('station_code'),
                    'teritory_code' => $request->input('teritory_code'),
                    'sale_seq' => $request->input('sale_seq'),
                    'order_seq_mso_hiraracy' => $request->input('order_seq_mso_hiraracy'),
                    'province' => $request->input('province') 
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
        
        
        return redirect('admin/add_station_detail')->with($notification);
         

    }
}
