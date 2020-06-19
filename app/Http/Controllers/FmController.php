<?php

namespace App\Http\Controllers;

use App\Dr_Case;
use App\Escalation_Hierarchy;
use App\Activity;
use App\Item_Team; 
use App\Item;
use App\Activity_Name;
use App\Document_Upload;
use App\Retention_Document;
use App\Absent;
use App\Retention;
use App\Retention_Approved_Product;
use App\Retention_Unapproved_Product;
use App\Fm_City_info;
use App\Fm_Other_info;
use App\Fm_Payment_info;
use App\Fm_Relative_in_Pharma_info;
use App\Fm_Team_info;
use App\MSO_Work_Plan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use PDF;
use Validator,Redirect,Response,File;

class FmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "Pending Cases";
        $data['page_description'] = "Welcome to Admin Dashboard";
        return view('fm.teamzone')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_case(Request $request)
    {
        $data['page_title'] = "Create Case";
        $data['page_description'] = "Welcome to Admin Dashboard";
        $ccrsid = Auth::user()->ccrsid;
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();   
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
        //dd($zmccrsid);
        
        $case = \DB::table('zone_station_details')->where('ccrsid', $ccrsid)->first();
        $activity_names = \DB::table('activity_names')->orderBy('activity_name', 'Asc')->get();
        $qualification = \DB::table('qualifications')->orderBy('id')->get();
        $designation = \DB::table('designations')->orderBy('id')->get();
        $users = oci_connect('ccrs', 'ARIKONS', '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 10.10.1.18)(PORT = 1521)) (CONNECT_DATA = (SERVICE_NAME = ORCL)))');
         
        $ss = oci_parse($users, "SELECT DOCTORID,DOCTORNAME, CITY FROM v_doctor_list_mv
                                     where AMID = $ccrsid 
                                     order by DOCTORID ASC");
        oci_execute($ss);
        
        while($row = oci_fetch_array($ss, OCI_ASSOC)) {
                $dr_detail[] = $row['DOCTORNAME'];
                $dr_id[] = $row['DOCTORID'];
        }
        $data['case'] = $case;
        $request->session()->forget('case_id');
        
        return view('fm.create_case')
        ->with($data)
        ->with('activity_names', $activity_names)
        ->with('qualification', $qualification)
        ->with('designation', $designation)
        ->with('zmccrsid', $absent_id)
        ->with('dr_detail', $dr_detail)
        ->with('dr_id', $dr_id);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fm_escalation_record(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first(); 
        
        $fm_absent_record = DB::select(" SELECT * FROM `absents` WHERE absent_ccrsid = $ccrsid 
                                         order by ID DESC "); 
        //dd($fm_absent_record);
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
        $fm_escalation_record = DB::select("SELECT  eh.zmccrsid,
                                        GROUP_CONCAT(b.name ORDER BY b.id) zmname
                                            FROM    escalation_hierarchies eh
                                                    INNER JOIN users b
                                                        ON FIND_IN_SET(b.ccrsid, eh.zmccrsid) > 0
                                                        where eh.fmccrsid = $ccrsid
                                            GROUP   BY eh.zmccrsid " );
 
       //dd($fm_escalation_record);
        $values = [];
        foreach ($fm_escalation_record as $product) {
            foreach(explode(',', $product->zmccrsid) as $value) {
                $values[] = trim($value);
            }
        }
        $values = array_unique($values);
        
        $data['values'] = $values;  
        return view('fm.fm_absents')
        ->with($data)
        ->with('zmccrsid', $absent_id)
        ->with('fm_absent_record', $fm_absent_record);

    }

    public function fm_absents(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        if(isset($_POST['submit'])){
            $fm_absent = Absent::create([
                'assign_ccrsid' => $request->input('assign_ccrsid'),
                'absent_ccrsid' => $ccrsid,
                'from_date' => $request->input('from_date'),
                'to_date' => $request->input('to_date'),
                'date' => now(),
            ]);

        }
        $notification = array(
            'message' => 'Record add SucessFully', 
            'alert-type' => 'success'
        );
        return redirect('fm/fm_escalation_record')->with($notification);
         

    }

    public function store(Request $request)
    {       
            
            $ccrsid = Auth::user()->ccrsid;
        
            $case = \DB::table('escalation_hierarchies')->where('fmccrsid', $ccrsid)->first();

            $nsm_array = explode(",", $case->nsmccrsid);

            $nsm_teams = \DB::table('zone_station_details')->select(DB::raw("group_concat(team) as teams"))
                ->where('role', 'nsm')->whereIn('ccrsid', $nsm_array)->first();
            $pm_ccrsid_array = array();
            foreach(explode(",", $nsm_teams->teams) as $key => $team)
            {
                $pm_ccrsid = \DB::table('zone_station_details')->select("ccrsid")->whereRaw('FIND_IN_SET("'.$team.'",team)')->where('role', 'pm')->first();
                $pm_ccrsid_array[] = $pm_ccrsid->ccrsid;
            }
            $pm_ids = implode(",", array_unique($pm_ccrsid_array));
            
            
            
            if(isset($_POST['submit'])){
                
                $value = Session::get('case_id');
                //dd($value);  
                if($value != Null ){
                    $update_case = DB::table('dr_cases')->where('id', $value)
                                    ->update(['is_fm_save_case'=> 0]);
                $notification = array(
                                        'message' => 'Case Submit SucessFully', 
                                        'alert-type' => 'success'
                                    );
                 return redirect('fm/create_case')->with($notification);
                }else{
                if($request->input('accompanied_person_fm') != null){
                    $accompanied_fm = implode(",",$request->input('accompanied_person_fm'));
                }else{
                    $accompanied_fm = '';
                }
                $date = str_replace('/', '-',$request->input('last_visit_date') );
                $newDate = date("Y-m-d", strtotime($date));
                $dr_case_id = Dr_Case::create([
                'case_catagory' => $request->input('case_catagory'),
                'discription' => $request->input('discription'),
                'team' => $request->input('team'),
                'zone' => $request->input('zone'),
                'district' => $request->input('district'),
                'station' => $request->input('station'),
                'dr_name' => $request->input('dr_name'),
                'dr_address' => $request->input('dr_address'),
                'dr_contact_number' => $request->input('dr_contact_number'),
                'dr_code' => $request->input('dr_code'),
                'hospital_name' => $request->input('hospital_name'),
                'pharmacy_name' => $request->input('pharmacy_name'),
                'discount_details' => $request->input('discount_details'),
                'qualification_id' => $request->input('qualification_id'),
                'dr_designation' => $request->input('dr_designation'),
                'salutation' => $request->input('salutation'),
                'salutation_specify' => $request->input('salutation_specify'),
                'ppb' => $request->input('ppb'),
                'last_visit_date' => $newDate,
                'accompanied_person_fm' => $accompanied_fm,
                'case_type' => $request->input('case_type'),
                'committed_biz' => 0,
                'actual_biz' => 0,
                'spb_amt' => 0,
                'committed_time' => 0,
                'actual_time' => 0,
                'coa' => 0,
                't_coa' => $request->input('t_coa'),
                'success' => 0,
                'activity_name' => $request->input('activity_name'),
                'ytd_spb_rate' => $request->input('ytd_spb_rate'),
                'ytd_Sale' => $request->input('ytd_Sale'),
                'ytd_spb_c_y' => $request->input('ytd_spb_c_y'),
                'ytd_ratio' => $request->input('ytd_ratio'),
                'duration_month' => $request->input('duration_month'),
                'concerned_zm' => $case->zmccrsid,
                'concerned_nsm'=> $case->nsmccrsid,
                'is_fm_save_case' => 0,
                'concerned_pm'=> $pm_ids,
                'current_case_handler' => 'zm',
                'fmccrsid' => $ccrsid,
                'spb_sum'=> $request->input('spb_sum'),
                'current_biz_sum' => $request->input('current_biz_sum'),
                'proj_biz_sum' => $request->input('proj_biz_sum'),
                'tot_proj_sum' => $request->input('tot_proj_sum'),
               ]);
                $case_id = $dr_case_id->id;
                if($request->input('case_type') == 'retention'){
                    $aproval_date = str_replace('/', '-',$request->input('date_of_approval'));
                    $aproval_date_newDate = date("Y-m-d", strtotime($aproval_date));
                    $projected_date_of_completion = str_replace('/', '-',$request->input('projected_date_of_completion'));
                    $projected_date_of_completion_newDate = date("Y-m-d", strtotime($projected_date_of_completion));
                    $actual_date_of_completion = str_replace('/', '-',$request->input('actual_date_of_completion'));
                    $actual_date_of_completion_newDate = date("Y-m-d", strtotime($actual_date_of_completion));
                    
                    $retention = Retention::create([
                        'case_id' => $case_id,
                        'date_of_approval'=> $aproval_date_newDate,
                        'project_duration'=> $request->input('project_duration'),
                        'projected_date_of_completion'=> $projected_date_of_completion_newDate,
                        'actual_duration'=> $request->input('actual_duration'),
                        'actual_date_of_completion'=> $actual_date_of_completion_newDate,
                        'total_spb_value'=> $request->input('total_spb_value'),
                        'pro_total_biz_units'=> $request->input('pro_total_biz_units'),
                        'total_biz_units_month'=> $request->input('total_biz_units_month'),
                        'actual_total_biz_units'=> $request->input('actual_total_biz_units'),
                        'total_coa'=> $request->input('total_coa'),
                        'total_success'=> $request->input('total_success'),
                        'unapproved_total_biz_units'=> $request->input('unapproved_total_biz_units'),
                    ]);
               
                    $case_id = $dr_case_id->id;
                    $retention = $retention->id;
                    // dd($case_id);
                    
                        foreach($request->input('product_name') as $key => $product_name){
                            $approved_product_case = new Retention_Approved_Product;
                                if(!empty($request->input('product_name')[$key])){
                            
                                    
                                    $approved_product_case->case_id = $case_id;
                                    $approved_product_case->retention_id = $retention;
                                    $approved_product_case->product_name = $request->input('product_name')[$key];
                                    $approved_product_case->rate = $request->input('approved_tp')[$key];
                                    $approved_product_case->spb_value = $request->input('spb_value')[$key];
                                    $approved_product_case->biz_units_month  = $request->input('biz_units_month')[$key];
                                    $approved_product_case->biz_units  = $request->input('biz_units')[$key];
                                    $approved_product_case->actual_biz_unit = $request->input('actual_biz_unit')[$key];
                                    $approved_product_case->coa  = $request->input('coa')[$key];
                                    $approved_product_case->success  = $request->input('success')[$key];
                                    $approved_product_case->save();
                        
                                }
                        }
                
                    $case_id = $dr_case_id->id;
                // $retention = $retention->id;
                 
                    foreach($request->input('product_names') as $key => $product_names){
                        $unapproved_product_case = new Retention_Unapproved_Product;
                        if(!empty($request->input('product_names')[$key])){
                    
                            
                            $unapproved_product_case->case_id = $case_id;
                            $unapproved_product_case->retention_id = $retention;
                            $unapproved_product_case->product_name = $request->input('product_names')[$key];
                            $unapproved_product_case->rate = $request->input('unapproved_tp')[$key];
                            $unapproved_product_case->total_biz_units = $request->input('total_biz_units')[$key]; 
                            $unapproved_product_case->comments = $request->input('comments')[$key]; 
                            $unapproved_product_case->save();
                        }
                    
                    }
                } 
                $case_id = $dr_case_id->id;
                foreach($request->input('product') as $key => $product){
                    $fm_acitivity_case = new Activity;
                
                        
                        $fm_acitivity_case->case_id = $case_id;
                        $fm_acitivity_case->product = $request->input('product')[$key];
                        $fm_acitivity_case->rate = $request->input('tp')[$key];
                        $fm_acitivity_case->spb_amt = $request->input('spb_amt')[$key];
                        $fm_acitivity_case->current_biz  = $request->input('current_biz')[$key];
                        $fm_acitivity_case->proj_biz  = $request->input('proj_biz')[$key];
                        $fm_acitivity_case->tot_proj = $request->input('tot_proj')[$key];
                        $fm_acitivity_case->cost_of_activity  = $request->input('cost_of_activity')[$key];
                        $fm_acitivity_case->save();
                
                }

                
                $images = $request->file('filenames'); 
                if($images == NULL){

                }else{ 
                foreach($images as $key => $image) {
                    if ($request->hasFile('filenames')[$key] or $request->file('filenames')[$key]->isValid()) {
                        // store image to directory.
                        
                        $path = rand() . '_' . $image->getClientOriginalName();
                        
                        $path = $image->move('upload', $path);
                        
                        //dd($path);
                        // store image to database.
                        $r_image = new Document_Upload();
                        $r_image->case_id = $case_id;
                        $r_image->image_path = $path;
                        $r_image->save();
                    } else {
                        return redirect()->back()->with('errors', 'Invalid Image file found!');
                    }
                }

                }
                
                $retention_image = $request->file('retention_image');  
                    if($retention_image == NULL){

                    }else{ 
                            foreach($retention_image as $key => $retention_image) {
                                if ($request->hasFile('retention_image')[$key] or $request->file('retention_image')[$key]->isValid()) {
                                    // store image to directory.
                                    
                                    $path = rand() . '_' . $retention_image->getClientOriginalName(); 
                                    $path = $retention_image->move('retention_files', $path); 
                                    // store image to database.
                                    $ret_image = new Retention_Document();
                                    $ret_image->case_id = $case_id;
                                    $ret_image->image_path = $path;
                                    $ret_image->save();
                                } else {
                                    return redirect()->back()->with('errors', 'Invalid Image file found!');
                                }
                            }
                            
                    }
 
             } 
            }else if(isset($_POST['save'])){
                if($request->input('accompanied_person_fm') != null){
                    $accompanied_fm = implode(",",$request->input('accompanied_person_fm'));
                }else{
                    $accompanied_fm = '';
                }
                $date = str_replace('/', '-',$request->input('last_visit_date') );
                $newDate = date("Y-m-d", strtotime($date));
                $dr_case_id = Dr_Case::create([
                'case_catagory' => $request->input('case_catagory'),
                'discription' => $request->input('discription'),
                'team' => $request->input('team'),
                'zone' => $request->input('zone'),
                'district' => $request->input('district'),
                'station' => $request->input('station'),
                'dr_name' => $request->input('dr_name'),
                'dr_address' => $request->input('dr_address'),
                'dr_contact_number' => $request->input('dr_contact_number'),
                'dr_code' => $request->input('dr_code'),
                'hospital_name' => $request->input('hospital_name'),
                'pharmacy_name' => $request->input('pharmacy_name'),
                'discount_details' => $request->input('discount_details'),
                'qualification_id' => $request->input('qualification_id'),
                'dr_designation' => $request->input('dr_designation'),
                'salutation' => $request->input('salutation'),
                'salutation_specify' => $request->input('salutation_specify'),
                'ppb' => $request->input('ppb'),
                'last_visit_date' => $newDate,
                'accompanied_person_fm' => $accompanied_fm,
                'case_type' => $request->input('case_type'),
                'committed_biz' => 0,
                'actual_biz' => 0,
                'spb_amt' => 0,
                'committed_time' => 0,
                'actual_time' => 0,
                'coa' => 0,
                't_coa' => $request->input('t_coa'),
                'success' => 0,
                'activity_name' => $request->input('activity_name'),
                'ytd_spb_rate' => $request->input('ytd_spb_rate'),
                'ytd_Sale' => $request->input('ytd_Sale'),
                'ytd_spb_c_y' => $request->input('ytd_spb_c_y'),
                'ytd_ratio' => $request->input('ytd_ratio'),
                'duration_month' => $request->input('duration_month'),
                'concerned_zm' => $case->zmccrsid,
                'concerned_nsm'=> $case->nsmccrsid,
                'is_fm_save_case' => 1,
                'concerned_pm'=> $pm_ids,
                'current_case_handler' => 'zm',
                'fmccrsid' => $ccrsid,
                'spb_sum'=> $request->input('spb_sum'),
                'current_biz_sum' => $request->input('current_biz_sum'),
                'proj_biz_sum' => $request->input('proj_biz_sum'),
                'tot_proj_sum' => $request->input('tot_proj_sum'),
                ]);
                $case_id = $dr_case_id->id;
                if($request->input('case_type') == 'retention'){
                    $aproval_date = str_replace('/', '-',$request->input('date_of_approval'));
                    $aproval_date_newDate = date("Y-m-d", strtotime($aproval_date));
                    $projected_date_of_completion = str_replace('/', '-',$request->input('projected_date_of_completion'));
                    $projected_date_of_completion_newDate = date("Y-m-d", strtotime($projected_date_of_completion));
                    $actual_date_of_completion = str_replace('/', '-',$request->input('actual_date_of_completion'));
                    $actual_date_of_completion_newDate = date("Y-m-d", strtotime($actual_date_of_completion));
                    $retention = Retention::create([
                        'case_id' => $case_id,
                        'date_of_approval'=> $aproval_date_newDate,
                        'project_duration'=> $request->input('project_duration'),
                        'projected_date_of_completion'=> $projected_date_of_completion_newDate,
                        'actual_duration'=> $request->input('actual_duration'),
                        'actual_date_of_completion'=> $actual_date_of_completion_newDate,
                        'total_spb_value'=> $request->input('total_spb_value'),
                        'pro_total_biz_units'=> $request->input('pro_total_biz_units'),
                        'total_biz_units_month'=> $request->input('total_biz_units_month'),
                        'actual_total_biz_units'=> $request->input('actual_total_biz_units'),
                        'total_coa'=> $request->input('total_coa'),
                        'total_success'=> $request->input('total_success'),
                        'unapproved_total_biz_units'=> $request->input('unapproved_total_biz_units'),
                    ]);
                
                    $case_id = $dr_case_id->id;
                    $retention = $retention->id;
                    
                    
                    foreach($request->input('product_name') as $key => $product_name){
                        $approved_product_case = new Retention_Approved_Product;
                            if(!empty($request->input('product_name')[$key])){
                        
                                
                                $approved_product_case->case_id = $case_id;
                                $approved_product_case->retention_id = $retention;
                                $approved_product_case->product_name = $request->input('product_name')[$key];
                                $approved_product_case->rate = $request->input('approved_tp')[$key];
                                $approved_product_case->spb_value = $request->input('spb_value')[$key];
                                $approved_product_case->biz_units_month  = $request->input('biz_units_month')[$key];
                                $approved_product_case->biz_units  = $request->input('biz_units')[$key];
                                $approved_product_case->actual_biz_unit = $request->input('actual_biz_unit')[$key];
                                $approved_product_case->coa  = $request->input('coa')[$key];
                                $approved_product_case->success  = $request->input('success')[$key];
                                $approved_product_case->save();
                    
                            }
                    }
                        $case_id = $dr_case_id->id;
                        // $retention = $retention->id;
                        
                            foreach($request->input('product_names') as $key => $product_names){
                                $unapproved_product_case = new Retention_Unapproved_Product;
                                if(!empty($request->input('product_names')[$key])){
                            
                                    
                                    $unapproved_product_case->case_id = $case_id;
                                    $unapproved_product_case->retention_id = $retention;
                                    $unapproved_product_case->product_name = $request->input('product_names')[$key];
                                    $unapproved_product_case->rate = $request->input('unapproved_tp')[$key];
                                    $unapproved_product_case->total_biz_units = $request->input('total_biz_units')[$key]; 
                                    $unapproved_product_case->comments = $request->input('comments')[$key]; 
                                    $unapproved_product_case->save();
                                }
                            
                            }
                }   
                    $case_id = $dr_case_id->id;
                    foreach($request->input('product') as $key => $product){
                        $fm_acitivity_case = new Activity;
                    
                            
                            $fm_acitivity_case->case_id = $case_id;
                            $fm_acitivity_case->product = $request->input('product')[$key];
                            $fm_acitivity_case->rate = $request->input('tp')[$key];
                            $fm_acitivity_case->spb_amt = $request->input('spb_amt')[$key];
                            $fm_acitivity_case->current_biz  = $request->input('current_biz')[$key];
                            $fm_acitivity_case->proj_biz  = $request->input('proj_biz')[$key];
                            $fm_acitivity_case->tot_proj = $request->input('tot_proj')[$key];
                            $fm_acitivity_case->cost_of_activity  = $request->input('cost_of_activity')[$key];
                            $fm_acitivity_case->save();
                    
                    }

                    
                    $images = $request->file('filenames'); 
                    if($images == NULL){

                    }else{ 
                    foreach($images as $key => $image) {
                        if ($request->hasFile('filenames')[$key] or $request->file('filenames')[$key]->isValid()) {
                            // store image to directory.
                            
                            $path = rand() . '_' . $image->getClientOriginalName();
                            
                            $path = $image->move('upload', $path);
                            
                            //dd($path);
                            // store image to database.
                            $r_image = new Document_Upload();
                            $r_image->case_id = $case_id;
                            $r_image->image_path = $path;
                            $r_image->save();
                        } else {
                            return redirect()->back()->with('errors', 'Invalid Image file found!');
                        }
                    }

                    }
                    
                    $retention_image = $request->file('retention_image');  
                        if($retention_image == NULL){

                        }else{ 
                            foreach($retention_image as $key => $retention_image) {
                                if ($request->hasFile('retention_image')[$key] or $request->file('retention_image')[$key]->isValid()) {
                                    // store image to directory.
                                    
                                    $path = rand() . '_' . $retention_image->getClientOriginalName(); 
                                    $path = $retention_image->move('retention_files', $path); 
                                    // store image to database.
                                    $ret_image = new Retention_Document();
                                    $ret_image->case_id = $case_id;
                                    $ret_image->image_path = $path;
                                    $ret_image->save();
                                } else {
                                    return redirect()->back()->with('errors', 'Invalid Image file found!');
                                }
                            }
                            
                        }
                    Session::put('case_id', $dr_case_id->id);
                    $view_case = Dr_Case::find($dr_case_id->id);
                   
                    $view_case_product = \DB::table('activities')->where('case_id', $dr_case_id->id)->get();
                    $retention = \DB::table('retentions')->where('case_id', $dr_case_id->id)->get(); 
                    $approved_product = \DB::table('retention_approved_products')->where('case_id', $dr_case_id->id)->get(); 
                    $unapproved_product = \DB::table('retention_unapproved_products')->where('case_id', $dr_case_id->id)->get();
                    $fm_name = \DB::table('users')->where('ccrsid', $view_case->fmccrsid)->get();
                    $nsm_name = \DB::table('users')->where('ccrsid', $view_case->concerned_nsm)->get();
                    $zm_name = \DB::table('users')->where('ccrsid', $view_case->zmccrsid)->get();
                    $qualification = \DB::table('qualifications')
                    ->select('qualifications.*')
                    ->leftJoin('dr_cases', 'qualifications.id', '=', 'dr_cases.qualification_id')
                    ->where('dr_cases.id', $dr_case_id->id)->get();
                    

                    $pdf = PDF::loadView('fm.fm_pdf_case_report', ['view_case'  => $view_case,
                                                                   'retention' =>  $retention,
                                                                   'approved_product' => $approved_product,
                                                                    'unapproved_product' => $unapproved_product,
                                                                    'view_case_product'  => $view_case_product,
                                                                    'fm_name' => $fm_name,
                                                                    'zm_name' => $zm_name,
                                                                    'nsm_name' => $nsm_name,
                                                                    'qualification' => $qualification]);  
                    
                    // return $pdf->download('standpharm.pdf');
                    return redirect()->action('FmController@generatePDF', ['id' => $dr_case_id->id]);
                    
                  
            }
            
            $notification = array(
                    'message' => 'Case Submit SucessFully', 
                    'alert-type' => 'success'
                );
        
        return redirect('fm/create_case')->with($notification);
        // return view('fm.create_case');
    }

    // public function generatePDF($id)
    // {
    //     // dd($id);
    //     $view_case = Dr_Case::find($id);
    //     // dd($view_case->id);
    //     $view_case_product = \DB::table('activities')->where('case_id', $view_case->id)->get();
    //                 $fm_name = \DB::table('users')->where('ccrsid', $view_case->fmccrsid)->get();
    //                 $nsm_name = \DB::table('users')->where('ccrsid', $view_case->concerned_nsm)->get();
    //                 $zm_name = \DB::table('users')->where('ccrsid', $view_case->zmccrsid)->get();
    //                 $qualification = \DB::table('qualifications')
    //                 ->select('qualifications.*')
    //                 ->leftJoin('dr_cases', 'qualifications.id', '=', 'dr_cases.qualification_id')
    //                 ->where('dr_cases.id', $view_case->id)->get();
    //                 $pdf = PDF::loadView('fm.fm_pdf_case_report', ['view_case'  => $view_case,
    //                                                             'view_case_product'  => $view_case_product,
    //                                                             'fm_name' => $fm_name,
    //                                                             'zm_name' => $zm_name,
    //                                                             'nsm_name' => $nsm_name,
    //                                                             'qualification' => $qualification]); 
    //                 // dd($pdf);   
    //                 return $pdf->download('standpharm.pdf');
    //     //}
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        //dd($request);
        
        $fm_case = \DB::table('items')
        ->leftjoin('items_teams', 'items.item_code', '=', 'items_teams.item_code')
        ->leftjoin('teams', 'items_teams.team_id', '=', 'teams.id')
        ->Select('items.item_name', 'teams.team_code', 'items.sale_price')
        ->where('teams.team_code', $request->input('item_name'))->get();
        return response()->json($fm_case);
         
    }

    public function dr_detail(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        //dd($request);
        
        $fm_dr_detail = \DB::table('su_stations')
        ->leftjoin('dr_details', 'su_stations.station_id', '=', 'dr_details.station_id') 
        ->Select('dr_details.id','dr_details.dr_name', 'dr_details.clinic_name', 'dr_details.address','dr_details.phone_number', 'dr_code')
        ->where('su_stations.station_code', $request->input('station_name'))->get();
        //dd($fm_dr_detail);
        return response()->json($fm_dr_detail);
         
    }

    public function dr_name(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        $dr_name = $request->input('dr_name'); 
        
        $users = oci_connect('ccrs', 'ARIKONS', '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 10.10.1.18)(PORT = 1521)) (CONNECT_DATA = (SERVICE_NAME = ORCL)))');
         
        $fm_dr_name = oci_parse($users, "SELECT DOCTORID FROM v_doctor_list
                                            where AMID = '$ccrsid'
                                            and  DOCTORNAME = '$dr_name' ");
        oci_execute($fm_dr_name);
        
        while($row = oci_fetch_array($fm_dr_name, OCI_ASSOC)) { 
                $dr_id = $row; 
        }
         
        return response()->json($dr_id);
         
    }

    public function designation_show(Request $request)
    {
         
        $dr_desig = \DB::table('designations')
        ->where('designation', $request->input('dr_designations'))->get(); 
        return response()->json($dr_desig);
         
    }

    public function rejected_case_check(Request $request)
    {
        $ss = $request->input('dr_name'); 
        $reject_cases = DB::select("SELECT dr_name, created_at FROM dr_cases WHERE dr_name = '$ss'
                                    and (is_rejected_zm = 1
                                    or is_rejected_nsm = 1
                                    or is_rejected_pm = 1)" ); 
         
        return response()->json($reject_cases);
         
    }

    public function view_save_cases()
    {
        $data['page_title'] = "View Save Cases";
        $data['page_description'] = "Welcome to Admin Dashboard";
        $ccrsid = Auth::user()->ccrsid;
        
        $case = \DB::table('dr_cases')->where('fmccrsid', $ccrsid)->where('is_fm_save_case', '!=', 1)->get();
        // $view_case_product = \DB::table('activities')->where('case_id', $id)->get();
        $data['case'] = $case;
        return view('fm.view_save_cases')->with($data);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ccrsid = Auth::user()->ccrsid;
        
            $case = \DB::table('escalation_hierarchies')->where('fmccrsid', $ccrsid)->first();

            $nsm_array = explode(",", $case->nsmccrsid);

            $nsm_teams = \DB::table('zone_station_details')->select(DB::raw("group_concat(team) as teams"))
                ->where('role', 'nsm')->whereIn('ccrsid', $nsm_array)->first();
            $pm_ccrsid_array = array();
            foreach(explode(",", $nsm_teams->teams) as $key => $team)
            {
                $pm_ccrsid = \DB::table('zone_station_details')->select("ccrsid")->whereRaw('FIND_IN_SET("'.$team.'",team)')->where('role', 'pm')->first();
                $pm_ccrsid_array[] = $pm_ccrsid->ccrsid;
            }
            $pm_ids = implode(",", array_unique($pm_ccrsid_array));
        $dr_case_id = DB::table('dr_cases')->where('id', $id)
        ->update(['team' => $request->input('team'),
            'zone' => $request->input('zone'),
            'district' => $request->input('district'),
            'station' => $request->input('station'),
            'dr_name' => $request->input('dr_name'),
            'dr_address' => $request->input('dr_address'),
            'dr_contact_number' => $request->input('dr_contact_number'),
            'hospital_name' => $request->input('hospital_name'),
            'pharmacy_name' => $request->input('pharmacy_name'),
            'discount_details' => $request->input('discount_details'),
            'dr_designation' => $request->input('dr_designation'),
            'salutation' => $request->input('salutation'),
            'salutation_specify' => $request->input('salutation_specify'),
            'ppb' => $request->input('ppb'),
            'last_visit_date' => $request->input('last_visit_date'),
            'accompanied_person_fm' => $request->input('accompanied_person_fm'),
            'case_type' => $request->input('case_type'),
            'committed_biz' => $request->input('committed_biz'),
            'actual_biz' => $request->input('actual_biz'),
            'spb_amt' => $request->input('spb_amount'),
            'committed_time' => $request->input('committed_time'),
            'actual_time' => $request->input('actual_time'),
            'coa' => $request->input('coa'),
            't_coa' => $request->input('t_coa'),
            'success' => $request->input('success'),
            'activity_name' => $request->input('activity_name'),
            'ytd_spb_rate' => $request->input('ytd_spb_rate'),
            'ytd_Sale' => $request->input('ytd_Sale'),
            'ytd_spb_c_y' => $request->input('ytd_spb_c_y'),
            'ytd_ratio' => $request->input('ytd_ratio'),
            'duration_month' => $request->input('duration_month'),
            'concerned_zm' => $case->zmccrsid,
            'concerned_nsm'=> $case->nsmccrsid,
            'is_fm_save_case' => 1,
            'concerned_pm'=> $pm_ids,
            'current_case_handler' => 'zm',
            'fmccrsid' => $ccrsid,
            'spb_sum'=> $request->input('spb_sum'),
            'current_biz_sum' => $request->input('current_biz_sum'),
            'proj_biz_sum' => $request->input('proj_biz_sum'),
            'tot_proj_sum' => $request->input('tot_proj_sum'),
        ]);
        return redirect('fm/view_save_cases');
    }


    public function update_save_case($id)
    {   

        $ccrsid = Auth::user()->ccrsid;
        $case = \DB::table('zone_station_details')->where('ccrsid', $ccrsid)->first();
        $activity_names = \DB::table('activity_names')->orderBy('activity_name', 'Asc')->get();

        $data['case'] = $case;

        $view_case = Dr_Case::find($id);
        
        $view_case_product = \DB::table('activities')->where('case_id', $id)->get();
        return view('fm.update_save_case')->with($data)->with('view_case', $view_case)->with('view_case_product', $view_case_product)->with('activity_names', $activity_names);;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function case_lists(Request $request)
    {
        $data['page_title'] = "Cases List";
        $ccrsid = Auth::user()->ccrsid;
        $fm_case_record = DB::select("Select dr.*, us.name as f_name from dr_cases dr 
        inner join users us on us.ccrsid = dr.fmccrsid
        where dr.fmccrsid = $ccrsid
        and dr.is_rejected_zm != 1 
        and dr.is_rejected_zm != 3
        and dr.is_rejected_nsm != 1 
        and dr.is_rejected_pm != 1
        and is_fm_save_case != 1  
        order by id DESC" );
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();  
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
        $data['fm_case_record'] = $fm_case_record;
        return view('fm.fm_list') ->with($data)
        ->with('zmccrsid', $absent_id);
    }

    public function reject_case_lists(Request $request)
    {
        $data['page_title'] = "Cases List";
        $ccrsid = Auth::user()->ccrsid;
        $fm_case_record = DB::select("Select * from dr_cases 
        where (fmccrsid = $ccrsid)
        and (is_rejected_zm != 0 
        or is_rejected_nsm != 0 
        or is_rejected_pm != 0 )
        order by id DESC ");
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();    
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
        $data['fm_case_record'] = $fm_case_record;
        return view('fm.fm_reject_list') ->with($data)
        ->with('zmccrsid', $absent_id);
    }

    public function view_case($id)
    {
        $view_case = Dr_Case::find($id); 
        $ccrsid = Auth::user()->ccrsid; 
        $retention = \DB::table('retentions')->where('case_id', $id)->get(); 
        $approved_product = \DB::table('retention_approved_products')->where('case_id', $id)->get(); 
        $unapproved_product = \DB::table('retention_unapproved_products')->where('case_id', $id)->get();
        $view_case_product = \DB::table('activities')->where('case_id', $id)->get();
        $fm_name = \DB::table('users')->where('ccrsid', $view_case->fmccrsid)->get();
        $nsm_name = \DB::table('users')->where('ccrsid', $view_case->nsmccrsid)->get();
        $zm_name = \DB::table('users')->where('ccrsid', $view_case->zmccrsid)->get();
        $pm_name = \DB::table('users')->where('ccrsid', $view_case->pmccrsid)->get();
        $case_document = \DB::table('document_uploads')->where('case_id', $id)->get();
        $retention_document = \DB::table('retention_documents')->where('case_id', $id)->get();
        $qualification = \DB::table('qualifications')
        ->select('qualifications.*')
        ->leftJoin('dr_cases', 'qualifications.id', '=', 'dr_cases.qualification_id')
        ->where('dr_cases.id', $id)->get();
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();   
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
  
        return view('fm.fm_view_case')->with('view_case', $view_case)
        ->with('retention', $retention)
        ->with('approved_product', $approved_product)
        ->with('unapproved_product', $unapproved_product)
        ->with('view_case_product', $view_case_product)
        ->with('fm_name', $fm_name)
        ->with('nsm_name', $nsm_name)
        ->with('zm_name', $zm_name)
        ->with('pm_name', $pm_name)
        ->with('qualification', $qualification)
        ->with('zmccrsid', $absent_id)
        ->with('case_document', $case_document)
        ->with('retention_document', $retention_document);
    }
    
    public function download_documents($id)
    {
           
        $case_document = \DB::table('document_uploads')->where('id', $id)->get();
        $retention_document = \DB::table('retention_documents')->where('id', $id)->get();
        foreach($case_document as $case_document){
         $path = public_path().'/'. $case_document->image_path;
          return response()->download($path);
        }
        foreach($retention_document as $retention_document){
            $path = public_path().'/'. $retention_document->image_path;
             return response()->download($path);
           }
    }

    public function retention_documents($id)
    {
            
        $retention_document = \DB::table('retention_documents')->where('id', $id)->get();
         
        foreach($retention_document as $retention_document){
            $path = public_path().'/'. $retention_document->image_path;
             return response()->download($path);
           }
    }
    
    public function zm_case_lists(Request $request)
    {
        $data['page_title'] = "Cases List";
        $ccrsid = Auth::user()->ccrsid; 
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();  
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
        $zm_case_record = \DB::table('dr_Cases')->whereRaw('FIND_IN_SET("'.$zmccrsid->absent_ccrsid.'",concerned_zm)')
        ->where('current_case_handler', 'zm')
        ->where('is_rejected_zm','!=',  1) 
        ->orderBy('id', 'DESC')->get();
       // dd($zm_case_record);
        $data['zm_case_record'] = $zm_case_record;
        return view('fm.zm_list') ->with($data)
        ->with('zmccrsid', $absent_id);
    }


    public function zm_view_case($id)
    {
        $ccrsid = Auth::user()->ccrsid; 
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();  
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
       
        $case_view = Dr_Case::find($id);
        $case_view2 = Dr_Case::find($id); 
        return view('fm.zm_case_Action')
        ->with('case_view', $case_view)
        ->with('zmccrsid', $absent_id);
    }

    public function update_zm_case(Request $request, $id)
    {
        $ccrsid = Auth::user()->ccrsid;
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();    
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
        
        if(isset($_POST['approved'])){
            if($request->input('accompanied_person_zm') != null){
                $accompanied_zm = implode(",",$request->input('accompanied_person_zm'));
            }else{
                   $accompanied_zm = '';
            }
            $update_zm_case = DB::table('dr_cases')->where('id', $id)
                            ->update(['zm_remarks'=> $request->input('zm_remarks'),
                                    'verified_zm'=> $request->input('verified_zm'),
                                    'accompanied_person_zm'=> $accompanied_zm, 
                                    'is_approved_zm' => 1,
                                    'zm_approved_date' =>now(),
                                    'current_case_handler' => 'nsm',
                                    'zm_visit_no_visit' => $request->input('zm_visit_no_visit'),
                                    'zm_last_visit_date' => $request->input('zm_last_visit_date'),
                                    'zmccrsid' => $zmccrsid->absent_ccrsid]);
        }else if(isset($_POST['rejected'])){
            if($request->input('accompanied_person_zm') != null){
                $accompanied_zm = implode(",",$request->input('accompanied_person_zm'));
            }else{
                   $accompanied_zm = '';
            }
            $update_zm_case = DB::table('dr_cases')->where('id', $id)
                            ->update(['zm_remarks'=> $request->input('zm_remarks'),
                                    'verified_zm'=> $request->input('verified_zm'),
                                    'accompanied_person_zm'=> $accompanied_zm, 
                                    'is_rejected_zm' => 1,
                                    'zm_approved_date' =>now(),
                                    'zm_visit_no_visit' => $request->input('zm_visit_no_visit'),
                                    'zm_last_visit_date' => $request->input('zm_last_visit_date'),
                                    'zmccrsid' => $zmccrsid->absent_ccrsid]);
        } 
        $notification = array(
            'message' => 'Record add SucessFully', 
            'alert-type' => 'success'
        );
        return redirect("fm/zm_case_lists")->with($notification);
    }

    public function generatePDF($id)
    {   
        //dd($id);
        $view_case = Dr_Case::find($id);
        $view_case_product = \DB::table('activities')->where('case_id', $id)->get();
        $retention = \DB::table('retentions')->where('case_id', $id)->get(); 
        $approved_product = \DB::table('retention_approved_products')->where('case_id', $id)->get(); 
        $unapproved_product = \DB::table('retention_unapproved_products')->where('case_id', $id)->get();
        $fm_name = \DB::table('users')->where('ccrsid', $view_case->fmccrsid)->get();
        $nsm_name = \DB::table('users')->where('ccrsid', $view_case->concerned_nsm)->get();
        $zm_name = \DB::table('users')->where('ccrsid', $view_case->concerned_zm)->get();
        $pm_name = \DB::table('users')->where('ccrsid', $view_case->concerned_pm)->get();
        $qualification = \DB::table('qualifications')
                    ->select('qualifications.*')
                    ->leftJoin('dr_cases', 'qualifications.id', '=', 'dr_cases.qualification_id')
                    ->where('dr_cases.id', $id)->get();
         
        $pdf = PDF::loadView('fm.fm_pdf_case_report', ['view_case'  => $view_case,
                                         'view_case_product'  => $view_case_product,
                                         'retention' =>  $retention,
                                         'approved_product' => $approved_product,
                                         'unapproved_product' => $unapproved_product,
                                         'fm_name' => $fm_name,
                                         'zm_name' => $zm_name,
                                         'nsm_name' => $nsm_name,
                                         'pm_name' => $pm_name,
                                         'qualification' => $qualification]); 
        //dd($pdf);
        
        return $pdf->download('standpharm.pdf');
     
    }

    //complete pdf

    public function generate_new_pdf($id)
    {   
        //dd($id);
        $view_case = Dr_Case::find($id);
        $view_case_product = \DB::table('activities')->where('case_id', $id)->get();
        $retention = \DB::table('retentions')->where('case_id', $id)->get(); 
        $approved_product = \DB::table('retention_approved_products')->where('case_id', $id)->get(); 
        $unapproved_product = \DB::table('retention_unapproved_products')->where('case_id', $id)->get();
        $fm_name = \DB::table('users')->where('ccrsid', $view_case->fmccrsid)->get();
        $nsm_name = \DB::table('users')->where('ccrsid', $view_case->concerned_nsm)->get();
        $zm_name = \DB::table('users')->where('ccrsid', $view_case->concerned_zm)->get();
        $pm_name = \DB::table('users')->where('ccrsid', $view_case->concerned_pm)->get();
        $qualification = \DB::table('qualifications')
                    ->select('qualifications.*')
                    ->leftJoin('dr_cases', 'qualifications.id', '=', 'dr_cases.qualification_id')
                    ->where('dr_cases.id', $id)->get();
         
        $pdf = PDF::loadView('fm.fm_pdf_complete', ['view_case'  => $view_case,
                                         'view_case_product'  => $view_case_product,
                                         'retention' =>  $retention,
                                         'approved_product' => $approved_product,
                                         'unapproved_product' => $unapproved_product,
                                         'fm_name' => $fm_name,
                                         'zm_name' => $zm_name,
                                         'nsm_name' => $nsm_name,
                                         'pm_name' => $pm_name,
                                         'qualification' => $qualification]); 
        //dd($pdf);
        
        return $pdf->download('standpharm.pdf');
     
    }

    public function dr_database_oracle(){
 
        $users = oci_connect('ccrs', 'ARIKONS', '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 10.10.1.18)(PORT = 1521)) (CONNECT_DATA = (SERVICE_NAME = ORCL)))');
        if (!$users) {
            dd("no coonection");

          }else{
            $ss = oci_parse($users, 'SELECT * FROM v_doctor_list_mv
                            where AMID = 5400 ');
            oci_execute($ss);
            while($row = oci_fetch_array($ss, OCI_ASSOC)) {
                dd($row);
             }
          }
           
 
        
    }


    public function fm_team(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first(); 
        
        $fm_absent_record = DB::select(" SELECT * FROM `absents` WHERE absent_ccrsid = $ccrsid 
                                         order by ID DESC "); 
        //dd($fm_absent_record);
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
        $zone = \DB::table('zone_station_details')->where('ccrsid', $ccrsid)->first();
        // $activity_names = \DB::table('activity_names')->orderBy('activity_name', 'Asc')->get();
        $qualification = \DB::table('qualifications')->orderBy('id')->get();
        $designation = \DB::table('designations')->orderBy('id')->get();
        
        $notification = array(
            'message' => 'Submit SucessFully', 
            'alert-type' => 'success'
        );
         
        return view('fm.fm_team.fm_team_record') 
        ->with('zmccrsid', $absent_id)
        ->with('fm_absent_record', $fm_absent_record)
        ->with('zone', $zone)
        ->with('qualification', $qualification)
        ->with('designation', $designation);

    }    


    public function add_team(Request $request)
    {       
             
            $ccrsid = Auth::user()->ccrsid;
            
            if(isset($_POST['submit'])){
               
                $date = str_replace('/', '-',$request->input('joining_date') );
                $newDate = date("Y-m-d", strtotime($date));

                $date_of_birth = str_replace('/', '-',$request->input('dob') );
                $date_of_births = date("Y-m-d", strtotime($date_of_birth));

                $eobi_join_date = str_replace('/', '-',$request->input('eobi_join_date') );
                $eobii_join_date = date("Y-m-d", strtotime($eobi_join_date));

                $confirm_date = str_replace('/', '-',$request->input('confirm_date') );
                $confirmm_date = date("Y-m-d", strtotime($confirm_date));

                $add_fm_team_id = Fm_Team_info::create([
                'company' => $request->input('company'),
                'employee_name' => $request->input('employee_name'),
                'father_name' => $request->input('father_name'),
                'dob' => $date_of_births,
                'joining_date' => $newDate,
                'eobi_join_date' => $eobii_join_date,
                'eobi' => $request->input('eobi'),
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
                'cnic_no' => $request->input('cnic_no'),
                'permanent_address' => $request->input('permanent_address'),
                'temporary_address' => $request->input('temporary_address'),
                'current_address' => $request->input('current_address'),
                'postal_code' => $request->input('postal_code'),
                'email' => $request->input('email'),
                'department' => $request->input('department'),
                'function_name' => $request->input('function_name'),
                'concerned_manager' => $request->input('concerned_manager'), 
                'team' => $request->input('team'),   
                'station' => $request->input('station'),
                'district' => $request->input('district'),
                'zone' => $request->input('zone'),
                'ccrsid' => $request->input('ccrsid'),
                'designation' => $request->input('designation'),
                'employee_type' => $request->input('employee_type'),
                'confirm_date' => $confirmm_date,
                'applied_for_job' => $request->input('applied_for_job'), 
                'comments'=> $request->input('comments'),
                'attandance_id' => $request->input('attandance_id'),
                'emp_no' => $request->input('emp_no'),
                'mobile_no' => $request->input('mobile_no'),
                'emergency_ph_no' => $request->input('emergency_ph_no'),
                'residence_ph_no' => $request->input('residence_ph_no'),
                'company_ph_no' => $request->input('company_ph_no'),
                'contact_person' => $request->input('contact_person'),
                'martial_status' => $request->input('martial_status'), 
                'no_of_children' => $request->input('no_of_children'), 
                'above_5_year'=> $request->input('above_5_year'),
                'blood_group' => $request->input('blood_group'),
                'religion' => $request->input('religion'),
                'speify_other' => $request->input('speify_other'),
                'service_type' => $request->input('service_type'), 
                'is_manager' => $request->input('is_manager'), 
                'created_at'=> now(),
                'is_deleted' => 0, 
               ]);
                $add_fm_team_id = $add_fm_team_id->id;
                 
                    // $aproval_date = str_replace('/', '-',$request->input('date_of_approval'));
                    // $aproval_date_newDate = date("Y-m-d", strtotime($aproval_date));
                    // $projected_date_of_completion = str_replace('/', '-',$request->input('projected_date_of_completion'));
                    // $projected_date_of_completion_newDate = date("Y-m-d", strtotime($projected_date_of_completion));
                    // $actual_date_of_completion = str_replace('/', '-',$request->input('actual_date_of_completion'));
                    // $actual_date_of_completion_newDate = date("Y-m-d", strtotime($actual_date_of_completion));
                    
                $fm_payment_info = Fm_Payment_info::create([
                    'fm_team_info_id' => $add_fm_team_id, 
                    'payment_type'=> $request->input('payment_type'), 
                    'payment_mode'=> $request->input('payment_mode'), 
                    'category'=> $request->input('category'),
                    'emp_acc_no'=> $request->input('emp_acc_no'),
                    'bank_name'=> $request->input('bank_name'),
                    'branch_station'=> $request->input('branch_station'),
                    'branch_address'=> $request->input('branch_address'),
                    'transfer_from'=> $request->input('transfer_from'),
                    'no_of_letters'=> $request->input('no_of_letters'),
                ]);
                $fm_payment_info_id = $fm_payment_info->id;

                $fm_other_info = Fm_Other_info::create([
                    'fm_team_info_id' => $add_fm_team_id, 
                    'fm_payment_infos_id' => $fm_payment_info_id, 
                    'mother_language'=> $request->input('mother_language'), 
                    'other_language'=> $request->input('other_language'), 
                    'caste'=> $request->input('caste'),
                    'transport_type'=> $request->input('transport_type'),
                    'license'=> $request->input('license'),
                    'vehicle_no'=> $request->input('vehicle_no'),
                    'political_affiliation'=> $request->input('political_affiliation'),
                    'affiliation_with'=> $request->input('affiliation_with'),
                    'family_depend_on'=> $request->input('family_depend_on'),
                    'present_company'=> $request->input('present_company'), 
                    'gross_salary'=> $request->input('gross_salary'), 
                    'benefits'=> $request->input('benefits'),
                    'reason_of_change'=> $request->input('reason_of_change'),
                    'morning_evening_work'=> $request->input('morning_evening_work'),
                    'pay_training_expense'=> $request->input('pay_training_expense'),
                    'suerty_bond'=> $request->input('suerty_bond'),
                    'referred_by'=> $request->input('referred_by'),
                    'interviewed_by'=> $request->input('interviewed_by'),
                    'auth_by'=> $request->input('auth_by'),
                    'city'=> $request->input('city'),
                ]);
                $fm_other_info_id = $fm_other_info->id;
                
                foreach($request->input('station_id') as $key => $city){
                    $fm_city_info = new Fm_City_info;
                
                        
                        $fm_city_info->fm_team_info_id = $add_fm_team_id;
                        $fm_city_info->fm_payment_infos_id = $fm_payment_info_id;
                        $fm_city_info->fm_other_info_id = $fm_other_info_id; 
                        $fm_city_info->station_id  = $request->input('station_id')[$key];  
                        $fm_city_info->save();
                
                }

                foreach($request->input('relationship') as $key => $relationship){
                    $fm_relative_info = new Fm_Relative_in_Pharma_info;
                
                        
                        $fm_relative_info->fm_team_info_id = $add_fm_team_id;
                        $fm_relative_info->fm_payment_infos_id = $fm_payment_info_id;
                        $fm_relative_info->fm_other_info_id = $fm_other_info_id;
                        $fm_relative_info->relationship = $request->input('relationship')[$key];
                        $fm_relative_info->pharma_company  = $request->input('pharma_company')[$key];  
                        $fm_relative_info->save();
                
                }

                 
 
        }
        
        return redirect('fm/fm_team');    
    }

    public function fm_team_list(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        $data['page_title'] = "Fm Lists";
        $ccrsid = Auth::user()->ccrsid;
        $fm_team_list = DB::select("SELECT id,employee_name,ccrsid,team,zone  FROM `fm_team_infos` 
                                    where ccrsid = $ccrsid 
                                    and is_deleted = '0'
                                    order by id DESC ");
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();    
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
        
        $data['fm_team_list'] = $fm_team_list;
        return view('fm.fm_team.fm_team_list') ->with($data)
        ->with('zmccrsid', $absent_id);
    }
     
    public function update_team($id)
    {   

        $ccrsid = Auth::user()->ccrsid;
        $team_info = \DB::table('fm_team_infos')->where('id', $id)->first();
        $zone = \DB::table('zone_station_details')->where('ccrsid', $ccrsid)->first();
        $payment_info = \DB::table('fm_payment_infos')->where('fm_team_info_id', $team_info->id)->first();
        $other_info = \DB::table('fm_other_infos')->where('fm_team_info_id', $team_info->id)
                      ->where('fm_payment_infos_id', $payment_info->id)->first();
        $city_info = DB::select("Select id, station_id from fm_personal_city_infos 
                                    where fm_team_info_id =  $team_info->id
                                    and fm_payment_infos_id = $payment_info->id
                                    and fm_other_info_id =  $other_info->id 
                                    order by id Asc " ); 
        //dd($city_info);
        $reletive_info = DB::select("Select * from fm_relative_in_pharma_infos 
                                    where fm_team_info_id =  $team_info->id
                                    and fm_payment_infos_id = $payment_info->id
                                    and fm_other_info_id =  $other_info->id
                                    order by id Asc  " );  


        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();    
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
       
        return view('fm.fm_team.update_team')
               ->with('team_info', $team_info)
               ->with('payment_info', $payment_info)
               ->with('other_info', $other_info)
               ->with('city_info', $city_info)
               ->with('reletive_info', $reletive_info)
               ->with('zmccrsid', $absent_id)
               ->with('zone', $zone); 

    }

    public function update_fm_team(Request $request, $id)
    {
        $ccrsid = Auth::user()->ccrsid;
        $date = str_replace('/', '-',$request->input('joining_date') );
        $newDate = date("Y-m-d", strtotime($date));

        $date_of_birth = str_replace('/', '-',$request->input('dob') );
        $date_of_births = date("Y-m-d", strtotime($date_of_birth));

        $eobi_join_date = str_replace('/', '-',$request->input('eobi_join_date') );
        $eobii_join_date = date("Y-m-d", strtotime($eobi_join_date));

        $confirm_date = str_replace('/', '-',$request->input('confirm_date') );
        $confirmm_date = date("Y-m-d", strtotime($confirm_date));
        $update_fm_team_info = DB::table('fm_team_infos')->where('id', $id)
        ->update(['company' => $request->input('company'),
        'employee_name' => $request->input('employee_name'),
        'father_name' => $request->input('father_name'),
        'dob' => $date_of_births,
        'joining_date' => $newDate,
        'eobi_join_date' => $eobii_join_date,
        'eobi' => $request->input('eobi'),
        'age' => $request->input('age'),
        'gender' => $request->input('gender'),
        'cnic_no' => $request->input('cnic_no'),
        'permanent_address' => $request->input('permanent_address'),
        'temporary_address' => $request->input('temporary_address'),
        'current_address' => $request->input('current_address'),
        'postal_code' => $request->input('postal_code'),
        'email' => $request->input('email'),
        'department' => $request->input('department'),
        'function_name' => $request->input('function_name'),
        'concerned_manager' => $request->input('concerned_manager'), 
        'team' => $request->input('team'),  
        'station' => $request->input('station'),
        'district' => $request->input('district'),
        'zone' => $request->input('zone'),
        'ccrsid' => $request->input('ccrsid'),
        'designation' => $request->input('designation'),
        'employee_type' => $request->input('employee_type'),
        'confirm_date' => $confirmm_date,
        'applied_for_job' => $request->input('applied_for_job'), 
        'comments'=> $request->input('comments'),
        'attandance_id' => $request->input('attandance_id'),
        'emp_no' => $request->input('emp_no'),
        'mobile_no' => $request->input('mobile_no'),
        'emergency_ph_no' => $request->input('emergency_ph_no'),
        'residence_ph_no' => $request->input('residence_ph_no'),
        'company_ph_no' => $request->input('company_ph_no'),
        'contact_person' => $request->input('contact_person'),
        'martial_status' => $request->input('martial_status'), 
        'no_of_children' => $request->input('no_of_children'), 
        'above_5_year'=> $request->input('above_5_year'),
        'blood_group' => $request->input('blood_group'),
        'religion' => $request->input('religion'),
        'speify_other' => $request->input('speify_other'),
        'service_type' => $request->input('service_type'), 
        'is_manager' => $request->input('is_manager'),   
       ]);
        $add_fm_team_id = $id; 
        $fm_payment_info = DB::table('fm_payment_infos')->where('fm_team_info_id', $add_fm_team_id)->update([
            'payment_type'=> $request->input('payment_type'), 
            'payment_mode'=> $request->input('payment_mode'), 
            'category'=> $request->input('category'),
            'emp_acc_no'=> $request->input('emp_acc_no'),
            'bank_name'=> $request->input('bank_name'),
            'branch_station'=> $request->input('branch_station'),
            'branch_address'=> $request->input('branch_address'),
            'transfer_from'=> $request->input('transfer_from'),
            'no_of_letters'=> $request->input('no_of_letters'),
        ]); 
        // $fm_payment_info_id = $fm_payment_info->id;
        $fm_other_info = DB::table('Fm_Other_infos')->where('fm_team_info_id', $add_fm_team_id)->update([   
            'mother_language'=> $request->input('mother_language'), 
            'other_language'=> $request->input('other_language'), 
            'caste'=> $request->input('caste'),
            'transport_type'=> $request->input('transport_type'),
            'license'=> $request->input('license'),
            'vehicle_no'=> $request->input('vehicle_no'),
            'political_affiliation'=> $request->input('political_affiliation'),
            'affiliation_with'=> $request->input('affiliation_with'),
            'family_depend_on'=> $request->input('family_depend_on'),
            'present_company'=> $request->input('present_company'), 
            'gross_salary'=> $request->input('gross_salary'), 
            'benefits'=> $request->input('benefits'),
            'reason_of_change'=> $request->input('reason_of_change'),
            'morning_evening_work'=> $request->input('morning_evening_work'),
            'pay_training_expense'=> $request->input('pay_training_expense'),
            'suerty_bond'=> $request->input('suerty_bond'),
            'referred_by'=> $request->input('referred_by'),
            'interviewed_by'=> $request->input('interviewed_by'),
            'auth_by'=> $request->input('auth_by'),
            'city'=> $request->input('city'),
        ]);

        $station_id = $request->input('city_info');
        foreach($station_id as $row){
            $station = Fm_City_info::find($row['id']); 
            $station->station_id = $row['station_id'];  
            $station->save(); 
        }
         
        $relation_id = $request->input('reletive_info'); 
        foreach($relation_id as $row){
            $relation = Fm_Relative_in_Pharma_info::find($row['id']); 
            $relation->relationship = $row['relationship']; 
            $relation->pharma_company = $row['pharma_company']; 
            $relation->save(); 
        }
         
     return redirect('fm/fm_team_list');   
    }

    public function monthly_work_plan()
    {
        $ccrsid = Auth::user()->ccrsid;
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();    
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
        $data['page_title'] = "Add Monthlhy Plan";
        return view('fm.fm_schedule.fm_monthly_work_plan')->with($data)
        ->with('zmccrsid', $absent_id);
    }


    public function mso_work_plan_store(Request $request){
         
        $ccrsid = Auth::user()->ccrsid; 
        foreach($request->input('date') as $key => $mso_id){
            $mso_id = new MSO_Work_Plan;
            
            $date = str_replace('/', '-',$request->input('date')[$key]);
            $newDate = date("Y-m-d", strtotime($date));
            $mso_id->date = $newDate;
            $mso_id->area = $request->input('area')[$key];
            $mso_id->mso_id = $request->input('mso_name')[$key];
            $mso_id->contact_point = $request->input('contact_point')[$key];
            $mso_id->time = $request->input('time')[$key];
            $mso_id->fm_id =$ccrsid;
            $mso->status = '1';
            $mso_id->save();
        }
        return redirect('fm/monthly_work_plan');
    }

    public function view_mso_plan(){
        $ccrsid = Auth::user()->ccrsid;
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();    
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }
        $data['page_title'] = "View MSO Plan";
        return view('fm.fm_schedule.view_mso_pan')->with($data)
        ->with('zmccrsid', $absent_id);
    }

    public function mso_plan(Request $request){
         
        $ccrsid = Auth::user()->ccrsid; 
        $todayDate = date("Y-m-d");  
        $zmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();    
         
        if($zmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $zmccrsid->absent_ccrsid;
        }

        $date = str_replace('/', '-',$request->input('from_date') );
        $from_date = date("Y-m-d", strtotime($date));

        $dates = str_replace('/', '-',$request->input('to_date') );
        $to_date = date("Y-m-d", strtotime($dates));

        $mso_id = $request->input('mso_id');

        $mso_lists = DB::select("select * from mso_work_plans
                                    where date BETWEEN '".$from_date."'  And  '".$to_date."'
                                    and mso_id = $mso_id
                                    and status = '1'
                                    order by id ASC "); 
         
        $data['mso_lists'] = $mso_lists;
        
        return view('fm.fm_schedule.mso_plan')->with($data)
               ->with('mso_lists', $mso_lists)
               ->with('zmccrsid', $absent_id);

    }

    public function edit_mso_plan(Request $request){
        $date = str_replace('/', '-',$request->input('date') );
        $newDate = date("Y-m-d", strtotime($date));
        $update_vendor = DB::table('mso_work_plans')->where('id', $request->input('id'))
                            ->update(['date'=> $newDate,
                                      'area'=> $request->input('area'),
                                      'mso_id' => $request->input('mso_id'),
                                      'contact_point' => $request->input('contact_point'), 
                                      'time' => $request->input('time')]);
        
        $update_plan = \DB::table('mso_work_plans')
                        ->Select('mso_work_plans.id', 'mso_work_plans.date','mso_work_plans.area',
                        'mso_work_plans.mso_id','mso_work_plans.contact_point','mso_work_plans.time')
                        ->where('mso_work_plans.id',$request->input('id'))->get();
        return response()->json($update_plan);                              
         
    }

}
