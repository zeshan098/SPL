<?php

namespace App\Http\Controllers;

use App\User;
use App\Item;
use App\Absent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    public function index() {
        $data['tasks'] = [
                [
                        'name' => 'Design New Dashboard',
                        'progress' => '87',
                        'color' => 'danger'
                ],
                [
                        'name' => 'Create Home Page',
                        'progress' => '76',
                        'color' => 'warning'
                ],
                [
                        'name' => 'Some Other Task',
                        'progress' => '32',
                        'color' => 'success'
                ],
                [
                        'name' => 'Start Building Website',
                        'progress' => '56',
                        'color' => 'info'
                ],
                [
                        'name' => 'Develop an Awesome Algorithm',
                        'progress' => '10',
                        'color' => 'success'
                ]
        ];
        $data['page_title'] = "Dashboard";
        $data['page_description'] = "Welcome to Admin Dashboard";
        return view('admin.index')->with($data);
    }
    
    public function users(){
        $data['page_title'] = "Users List";
        $data['page_description'] = "Users List";
        //update case of zm
        $return_case = DB::select(" SELECT * FROM `dr_cases` WHERE Date_Format(created_at, '%Y-%m-%d') = ( CURDATE() - INTERVAL 3 DAY )
                                   and current_case_handler = 'zm' " );
        foreach ($return_case as $return) { 
            $update_zm_case = DB::table('dr_cases')->where('id', $return->id)
                            ->update(['is_rejected_zm'=> 3]);
             
        }
        
        $user_record = \DB::table('users')->where("is_deleted", "=" , 0)->where("is_approved", "=" , 1)->get();
        $data['users'] = $user_record;
        return view('admin.users') ->with($data);
    }
    
    public function add_user_view(){
        $data["users"] = array();
        $data['page_title'] = "Add User";
        $data['page_description'] = "Add User";
        return view('admin.add_user')->with($data);
    }

    public function delete_user($id){
        $user_delete_update = User::find($id);
        $user_delete_update->is_deleted = 1;
        $user_delete_update->save();
        return redirect()->route('list_users');
    }
    
    public function add_user_post(Request $request){
        //dd($request);
        $data["users"] = array();
        $data['page_title'] = "Add User";
        $data['page_description'] = "Add User";
        return view('admin.add_user')->with($data);
    }

    public function pending_user(){
        $data['page_title'] = "Pending User";
        $user_record = \DB::table('users')->where("is_deleted", "=" , 0)->where("is_approved", "=" , 0)->get();
        $data['users'] = $user_record;
        return view('admin.pending_user') ->with($data);
    }

    public function update_pending_user($id){
        $pending_user_update = User::find($id);
        $pending_user_update->is_approved = 1;
        $pending_user_update->save();
        return redirect()->route('pending_user');
    }
    public function approved_product_list(){
        $data['page_title'] = "Approved List";
        $data['page_description'] = "Approved List";
        $product_record = \DB::table('items')->where("is_deleted", "=" , 0)->where("is_approved", "=" , 1)->get();
        $data['product_record'] = $product_record;
        return view('admin.approved_product_list') ->with($data);
    }

    public function product_list(){
        $data['page_title'] = "Product List";
        $product_record = \DB::table('items')->where("is_deleted", "=" , 0)->where("is_approved", "=" , 0)->get();
        $data['product_record'] = $product_record;
        return view('admin.product_list') ->with($data);
    }

    public function update_product_list($id){ 
        $update_list = \DB::table('items')->where("id", "=" , $id)->update(['is_approved' => 1]);
        return redirect()->route('product_list');
    }

    public function delete_product($id){
        $user_delete_update = \DB::table('items')->where("id", "=" , $id)->update(['is_deleted' => 1]); 
        return redirect()->route('approved_product_list');
    }


    //FM escalation_hierarchies 
    public function fm_escalation_record(Request $request)
    {
         
        $fm_escalation_record = DB::select("SELECT fmccrsid FROM escalation_hierarchies ");
        //dd($fm_escalation_record);
        $fm_absent_record = DB::select(" SELECT * FROM `absents`   
                                         order by ID DESC ");                                    
        $zm_escalation_record = DB::select("SELECT  eh.zmccrsid,
                                            GROUP_CONCAT(b.name ORDER BY b.id) zmname
                                             FROM escalation_hierarchies eh
                                             INNER JOIN users b
                                                         ON FIND_IN_SET(b.ccrsid, eh.zmccrsid) > 0 
                                             GROUP   BY eh.zmccrsid " );
       //dd($zm_escalation_record);
        $values = [];
        foreach ($zm_escalation_record as $product) {
            foreach(explode(',', $product->zmccrsid) as $value) {
                $values[] = trim($value);
            }
        }
        $values = array_unique($values);
        
        $data['values'] = $values;  
        return view('admin.assign_role.fm_absents')->with($data)
        ->with('fm_escalation_record', $fm_escalation_record)
        ->with('fm_absent_record', $fm_absent_record);

    }
    public function findZm(Request $request)
    {   
        $ccrsid = $request->input('fm_ccrsid');
        $fm_ccrsid = $query = DB::table('escalation_hierarchies')
                            ->select('zmccrsid')
                             ->whereRaw("FIND_IN_SET($ccrsid,fmccrsid)")
                             ->get();
        
        return response()->json($fm_ccrsid);
         
    }

    public function fm_absent(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        if(isset($_POST['submit'])){
            $fm_absent = Absent::create([
                'assign_ccrsid' => $request->input('assign_ccrsid'),
                'absent_ccrsid' => $request->input('absent_ccrsid'),
                'from_date' => $request->input('from_date'),
                'to_date' => $request->input('to_date'),
                'date' => now(),
                'admin_ccrsid' => $ccrsid
            ]);

        }
        $notification = array(
            'message' => 'Record add SucessFully', 
            'alert-type' => 'success'
        );
        return redirect('admin/fm_escalation_record')->with($notification);
         

    }


    //ZM escalation_hierarchies

    public function zm_escalation_record(Request $request)
    {
         
        $zm_escalation_record = DB::select("SELECT  eh.zmccrsid,
                                            GROUP_CONCAT(b.name ORDER BY b.id) zmname
                                            FROM escalation_hierarchies eh
                                            INNER JOIN users b
                                            ON FIND_IN_SET(b.ccrsid, eh.zmccrsid) > 0 
                                            GROUP   BY eh.zmccrsid ");
        //dd($fm_escalation_record);
        $zm_values = [];
        foreach ($zm_escalation_record as $product) {
            foreach(explode(',', $product->zmccrsid) as $value) {
                $zm_values[] = trim($value);
            }
        }
        $zm_values = array_unique($zm_values);

                                            
        $fm_escalation_record = DB::select("SELECT  eh.fmccrsid,
                                            GROUP_CONCAT(b.name ORDER BY b.id) zmname
                                             FROM escalation_hierarchies eh
                                             INNER JOIN users b
                                             ON FIND_IN_SET(b.ccrsid, eh.fmccrsid) > 0 
                                             GROUP   BY eh.fmccrsid " );
       //dd($zm_escalation_record);
        $values = [];
        foreach ($fm_escalation_record as $product) {
            foreach(explode(',', $product->fmccrsid) as $value) {
                $values[] = trim($value);
            }
        }
        $values = array_unique($values);
        
        $data['values'] = $values;  
        return view('admin.assign_role.zm_absents')->with($data)
        ->with('zm_escalation_record', $zm_values);

    }

    public function findFm(Request $request)
    {   $ccrsid = $request->input('zm_ccrsid');
        $fm_ccrsid = $query = DB::table('escalation_hierarchies')
                            ->select('fmccrsid')
                             ->whereRaw("FIND_IN_SET($ccrsid,zmccrsid)")
                             ->get();
        
        return response()->json($fm_ccrsid);
         
    }
    
    public function zm_absent(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        if(isset($_POST['submit'])){
            $fm_absent = Absent::create([
                'assign_ccrsid' => $request->input('assign_ccrsid'),
                'absent_ccrsid' => $request->input('absent_ccrsid'),
                'from_date' => $request->input('from_date'),
                'to_date' => $request->input('to_date'),
                'date' => now(),
                'admin_ccrsid' => $ccrsid
            ]);

        }
        $notification = array(
            'message' => 'Record add SucessFully', 
            'alert-type' => 'success'
        );
        return redirect('admin/zm_escalation_record')->with($notification);
         

    }

    //NSM escalation_hierarchies 
    public function nsm_escalation_record(Request $request)
    {
         
        $nsm_escalation_record = DB::select("SELECT nsmccrsid FROM escalation_hierarchies group by nsmccrsid ");
        //dd($fm_escalation_record);
          
        return view('admin.assign_role.nsm_absents') 
        ->with('nsm_escalation_record', $nsm_escalation_record);

    }
    public function find_Zm(Request $request)
    {   
        $ccrsid = $request->input('nsm_ccrsid');
        $fm_ccrsid = $query = DB::table('escalation_hierarchies')
                             ->select('zmccrsid')
                             ->whereRaw("FIND_IN_SET($ccrsid,nsmccrsid)")
                             ->groupBy('zmccrsid')
                             ->get();
        
        return response()->json($fm_ccrsid);
         
    }

    public function nsm_absent(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        if(isset($_POST['submit'])){
            $fm_absent = Absent::create([
                'assign_ccrsid' => $request->input('assign_ccrsid'),
                'absent_ccrsid' => $request->input('absent_ccrsid'),
                'from_date' => $request->input('from_date'),
                'to_date' => $request->input('to_date'),
                'date' => now(),
                'admin_ccrsid' => $ccrsid
            ]);

        }
        $notification = array(
            'message' => 'Record add SucessFully', 
            'alert-type' => 'success'
        );
        return redirect('admin/nsm_escalation_record')->with($notification);
         

    }

    //update password
    public function update_password($id){
        $ccrsid = User::find($id); 
         
        return view('admin.update_password.update_password') 
        ->with('ccrsid', $ccrsid);
    }
    public function password(Request $request, $id){
        
        if(isset($_POST['submit'])){
            $update_password = DB::table('users')->where('id', $id)
                            ->update(['password'=> Hash::make($request->input('password')) 
                            ]);
        }
        $notification = array(
            'message' => 'Password Update', 
            'alert-type' => 'success'
        );
         
        return redirect('admin/users')->with($notification);
    }
}
