<?php

namespace App\Http\Controllers;

use App\User;
use App\Dr_Case;
use App\Activity;
use App\Escalation_Hierarchy;
use App\Document_Upload;
use App\Retention_Document;
use App\Absent;
use App\Retention;
use App\Retention_Approved_Product;
use App\Retention_Unapproved_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Session;
use DB;
use PDF;

class ZmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function case($id)
    {   
        $ccrsid = Auth::user()->ccrsid; 
        $todayDate = date("Y-m-d");  
        $fmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.fmccrsid')
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.fmccrsid') 
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first(); 
         
        if($fmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $fmccrsid->absent_ccrsid;
        }

        //Nsm Abent Query
        $nsmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.nsmccrsid')
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.nsmccrsid')->first();
        if($nsmccrsid == null){
             
            $nsm_absent_id = 0;
        }else{
        
            $nsm_absent_id = $nsmccrsid->absent_ccrsid;
        }
       
        $case_view = Dr_Case::find($id);
        $case_view2 = Dr_Case::find($id);
        
        return view('zm.zm_case_Action')
        ->with('case_view', $case_view)
        ->with('fmccrsid', $absent_id)
        ->with('nsmccrsid', $nsm_absent_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_case($id)
    {
        $ccrsid = Auth::user()->ccrsid; 
        $todayDate = date("Y-m-d");  
        $fmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.fmccrsid')
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.fmccrsid') 
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first(); 
         
        if($fmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $fmccrsid->absent_ccrsid;
        }

        //Nsm Abent Query
        $nsmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.nsmccrsid')
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.nsmccrsid')->first();
        if($nsmccrsid == null){
             
            $nsm_absent_id = 0;
        }else{
        
            $nsm_absent_id = $nsmccrsid->absent_ccrsid;
        }

        $view_case = Dr_Case::find($id);
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
        return view('zm.zm_view_case')->with('view_case', $view_case)
        ->with('view_case_product', $view_case_product)
        ->with('retention', $retention)
        ->with('approved_product', $approved_product)
        ->with('unapproved_product', $unapproved_product)
        ->with('fm_name', $fm_name)
        ->with('nsm_name', $nsm_name)
        ->with('zm_name', $zm_name)
        ->with('pm_name', $pm_name)
        ->with('qualification', $qualification)
        ->with('fmccrsid', $absent_id)
        ->with('nsmccrsid', $nsm_absent_id)
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
        if($request->input('zm_last_visit_date') == null){
            $newDate = null;
        }else{
            $date = str_replace('/', '-',$request->input('zm_last_visit_date') );
            $newDate = date("Y-m-d", strtotime($date));

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
                                    'zm_last_visit_date' => $newDate,
                                    'zmccrsid' => $ccrsid]);
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
                                    'zm_last_visit_date' => $newDate,
                                    'zmccrsid' => $ccrsid]);
        }
        $notification = array(
            'message' => 'Case Submit SucessFully', 
            'alert-type' => 'success'
        );
        return redirect("zm/case_lists")->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function case_lists(Request $request)
    {
        
        $data['page_title'] = "Cases List";
        $ccrsid = Auth::user()->ccrsid; 
        $todayDate = date("Y-m-d");  
        //Fm Absent query
        $fmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.fmccrsid')
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.fmccrsid') 
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();
        if($fmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $fmccrsid->absent_ccrsid;
        }
        //Nsm Abent Query
        $nsmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.nsmccrsid')
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.nsmccrsid')->first();  
        if($nsmccrsid == null){
             
            $nsm_absent_id = 0;
        }else{
        
            $nsm_absent_id = $nsmccrsid->absent_ccrsid;
        }
         

        $zm_case_record = \DB::table('dr_Cases')->whereRaw('FIND_IN_SET("'.$ccrsid.'",concerned_zm)')
        ->where('current_case_handler', 'zm')
        ->where('is_rejected_zm','!=',  1) 
        ->Where('is_rejected_zm', '!=', 3)
        ->where('is_fm_save_case','!=',  1) 
        ->orderBy('id', 'DESC')->get();
        
        $data['zm_case_record'] = $zm_case_record;
        return view('zm.zm_list') ->with($data)
        ->with('fmccrsid', $absent_id)
        ->with('nsmccrsid', $nsm_absent_id);
    }

    public function generatePDF($id)
    {
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
         
        $pdf = PDF::loadView('zm.zm_pdf_case_report', ['view_case'  => $view_case,
                                         'view_case_product'  => $view_case_product,
                                         'retention' =>  $retention,
                                         'approved_product' => $approved_product,
                                         'unapproved_product' => $unapproved_product,
                                         'fm_name' => $fm_name,
                                         'zm_name' => $zm_name,
                                         'nsm_name' => $nsm_name,
                                         'pm_name' => $pm_name,
                                         'qualification' => $qualification]); 
         
  
        return $pdf->download('standpharm.pdf');
     
    }

    public function my_cases(Request $request)
    {
        $data['page_title'] = "Cases List";
        $ccrsid = Auth::user()->ccrsid;
        $todayDate = date("Y-m-d");  
        $fmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.fmccrsid')
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.fmccrsid') 
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first(); 
         
        if($fmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $fmccrsid->absent_ccrsid;
        }

        //Nsm Abent Query
        $nsmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.nsmccrsid')
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.nsmccrsid')->first();  
        if($nsmccrsid == null){
             
            $nsm_absent_id = 0;
        }else{
        
            $nsm_absent_id = $nsmccrsid->absent_ccrsid;
        }
        $zm_case_record = DB::select("Select dr.* from dr_cases dr  
        where dr.zmccrsid = $ccrsid
        and dr.is_rejected_zm != 1 
        and dr.is_rejected_zm != 3
        and dr.is_rejected_nsm != 1 
        and dr.is_rejected_pm != 1
        and is_fm_save_case != 1  
        order by dr.id Desc   ");
        //dd($zm_case_record);
        $data['zm_case_record'] = $zm_case_record;
        return view('zm.zm_cases') ->with($data)
        ->with('fmccrsid', $absent_id)
        ->with('nsmccrsid', $nsm_absent_id);
    }

    public function reject_case_lists(Request $request)
    {
        $data['page_title'] = "Cases List";
        $ccrsid = Auth::user()->ccrsid;
        $todayDate = date("Y-m-d");  
        $fmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.fmccrsid')
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.fmccrsid') 
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first(); 
         
        if($fmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $fmccrsid->absent_ccrsid;
        }
        //Nsm Abent Query
        $nsmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.nsmccrsid')
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.nsmccrsid')->first(); 
        if($nsmccrsid == null){
             
            $nsm_absent_id = 0;
        }else{
        
            $nsm_absent_id = $nsmccrsid->absent_ccrsid;
        }

        $zm_case_record = DB::select("Select * from dr_cases 
                                        where (concerned_zm = $ccrsid)
                                        and ( is_rejected_zm != 0 
                                        or is_rejected_nsm != 0 
                                        or is_rejected_pm != 0 )
                                        order by id DESC " ); 
        $data['zm_case_record'] = $zm_case_record;
        return view('zm.zm_reject_list') ->with($data)
        ->with('fmccrsid', $absent_id)
        ->with('nsmccrsid', $nsm_absent_id);
    }
    

    public function fm_absents_check(Request $request)
    {
        
        $ccrsid = Auth::user()->ccrsid; 
        $todayDate = date("Y-m-d");
        $zm_case_record = \DB::table('absents')
                ->select('absent_ccrsid')
                ->where('assign_ccrsid', $ccrsid)
                ->where('to_date', '>=', $todayDate)->first();
        //dd($zm_case_record->absent_ccrsid);
        return view('zm.template.sidebar') ->with('zm_case_record', $zm_case_record->absent_ccrsid);
    }

    public function create_case(Request $request)
    {
        $data['page_title'] = "Create Case";
        $data['page_description'] = "Welcome to Admin Dashboard";
        $ccrsid = Auth::user()->ccrsid; 
        $todayDate = date("Y-m-d");  
        $fmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.fmccrsid')
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.fmccrsid') 
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();   
        //dd($fmccrsid); 
        if($fmccrsid == null){
            $case = \DB::table('zone_station_details')->where('ccrsid', '5400')->first();
            $absent_id = 0;
        }else{
        
            $case = \DB::table('zone_station_details')->where('ccrsid', $fmccrsid->absent_ccrsid)->first(); 
            //dd($case);
            $absent_id = $fmccrsid->absent_ccrsid;
        }
        //nsm absents query
        $nsmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.nsmccrsid')
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.nsmccrsid')->first();   
        if($nsmccrsid == null){
             
            $nsm_absent_id = 0;
        }else{
        
            $nsm_absent_id = $nsmccrsid->absent_ccrsid;
        }
        $request->session()->forget('case_id');
        $activity_names = \DB::table('activity_names')->orderBy('activity_name', 'Asc')->get();
        $qualification = \DB::table('qualifications')->orderBy('id')->get();
        $designation = \DB::table('designations')->orderBy('id')->get();
        $users = oci_connect('ccrs', 'ARIKONS', '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 10.10.1.18)(PORT = 1521)) (CONNECT_DATA = (SERVICE_NAME = ORCL)))');
         
        $ss = oci_parse($users, "SELECT DOCTORID,DOCTORNAME, CITY FROM v_doctor_list_mv
                                     where AMID = $absent_id 
                                     order by DOCTORID ASC");
        oci_execute($ss);
        
        while($row = oci_fetch_array($ss, OCI_ASSOC)) {
                $dr_detail[] = $row['DOCTORNAME'];
                $dr_id[] = $row['DOCTORID'];
        }
        $data['case'] = $case;
        return view('zm.create_case')
        ->with($data)
        ->with('fmccrsid', $absent_id)
        ->with('activity_names', $activity_names)
        ->with('qualification', $qualification)
        ->with('designation', $designation)
        ->with('nsmccrsid', $nsm_absent_id)
        ->with('dr_detail', $dr_detail)
        ->with('dr_id', $dr_id);
        
    }

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
        $todayDate = date("Y-m-d"); 
        $fmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.fmccrsid')
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.fmccrsid') 
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();   
        //dd($fmccrsid); 
        if($fmccrsid == null){
            $case = \DB::table('zone_station_details')->where('ccrsid', '5400')->first();
            $absent_id = 0;
        }else{
        
            $case = \DB::table('zone_station_details')->where('ccrsid', $fmccrsid->absent_ccrsid)->first(); 
            //dd($case);
            $absent_id = $fmccrsid->absent_ccrsid;
        }
        
        $dr_name = $request->input('dr_name'); 
        
        $users = oci_connect('ccrs', 'ARIKONS', '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 10.10.1.18)(PORT = 1521)) (CONNECT_DATA = (SERVICE_NAME = ORCL)))');
         
        $fm_dr_name = oci_parse($users, "SELECT DOCTORID FROM v_doctor_list
                                            where AMID = '$absent_id'
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


    public function store(Request $request)
    {       
        
            $ccrsid = Auth::user()->ccrsid;
            $todayDate = date("Y-m-d");  
            $fmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.fmccrsid')
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.fmccrsid') 
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();   
        
            $case = \DB::table('escalation_hierarchies')->where('fmccrsid', $fmccrsid->absent_ccrsid)->first();

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
                 return redirect('zm/create_case')->with($notification);
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
                'accompanied_person_fm' =>  $accompanied_fm,
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
                'fmccrsid' => $fmccrsid->absent_ccrsid,
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
                'fmccrsid' => $fmccrsid->absent_ccrsid,
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
                    

                    $pdf = PDF::loadView('zm.zm_pdf_case_report', ['view_case'  => $view_case,
                                                                   'retention' =>  $retention,
                                                                   'approved_product' => $approved_product,
                                                                    'unapproved_product' => $unapproved_product,
                                                                    'view_case_product'  => $view_case_product,
                                                                    'fm_name' => $fm_name,
                                                                    'zm_name' => $zm_name,
                                                                    'nsm_name' => $nsm_name,
                                                                    'qualification' => $qualification]);  
                    
                                                                    return redirect()->action('ZmController@generatePDF', ['id' => $dr_case_id->id]);
                
                
 
                    
            }
        $notification = array(
                    'message' => 'Case Submit SucessFully', 
                    'alert-type' => 'success'
                );
        return redirect('zm/create_case')->with($notification);
        // return view('fm.create_case');
    }

    public function zm_escalation_record(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        $todayDate = date("Y-m-d");  
        $fmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.fmccrsid')
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.fmccrsid')
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();  
        $zm_absent_record = DB::select(" SELECT * FROM `absents` WHERE absent_ccrsid = $ccrsid 
                                     order by ID DESC "); 
        if($fmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $fmccrsid->absent_ccrsid;
        }

        //Nsm Abent Query
        $nsmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.nsmccrsid')
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.nsmccrsid')->first();   
        if($nsmccrsid == null){
             
            $nsm_absent_id = 0;
        }else{
        
            $nsm_absent_id = $nsmccrsid->absent_ccrsid;
        }

        $zm_escalation_record = DB::select("SELECT  eh.fmccrsid,
                                            GROUP_CONCAT(b.name ORDER BY b.id) zmname
                                            FROM  escalation_hierarchies eh
                                            INNER JOIN users b
                                            ON FIND_IN_SET(b.ccrsid, eh.fmccrsid) > 0
                                            where eh.zmccrsid = $ccrsid
                                            GROUP BY eh.fmccrsid " );
        //dd($zm_escalation_record);
  
        $values = [];
        foreach ($zm_escalation_record as $product) {
            foreach(explode(',', $product->fmccrsid) as $value) {
                $values[] = trim($value);
            }
        }
        $values = array_unique($values);
        
        $data['values'] = $values;  
        return view('zm.zm_absents')->with($data)
        ->with('fmccrsid', $absent_id)
        ->with('nsmccrsid', $nsm_absent_id)
        ->with('zm_absent_record', $zm_absent_record);
        

    }

    public function zm_absents(Request $request)
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
        return redirect('zm/zm_escalation_record')->with($notification);
         

    }

    //Nsm Cases

    public function nsm_case_lists(Request $request)
    {
        
        $data['page_title'] = "Cases List";
        $ccrsid = Auth::user()->ccrsid;
        //Nsm Abent Query
        $todayDate = date("Y-m-d"); 
        $nsmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.nsmccrsid')
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.nsmccrsid')->first();
        if($nsmccrsid == null){
             
            $nsm_absent_id = 0;
        }else{
        
            $nsm_absent_id = $nsmccrsid->absent_ccrsid;
        }
        //FM Absent Query
        $fmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.fmccrsid')
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.fmccrsid') 
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();   
        if($fmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $fmccrsid->absent_ccrsid;
        }
        $nsm_case_record = \DB::table('dr_Cases')->whereRaw('FIND_IN_SET("'.$nsmccrsid->absent_ccrsid.'",concerned_nsm)')
        ->where('current_case_handler', 'nsm')
        ->where('is_rejected_nsm','!=',  1)
        ->orderBy('id', 'DESC')->get();
        //dd($nsm_case_record);
        $data['nsm_case_record'] = $nsm_case_record;
        return view('zm.nsm_list') ->with($data)
        ->with('fmccrsid', $absent_id)
        ->with('nsmccrsid', $nsm_absent_id);
    }

    public function nsm_case($id)
    {   
        $ccrsid = Auth::user()->ccrsid;
        $case_view = Dr_Case::find($id);
        $case_view2 = Dr_Case::find($id);
        //Nsm Abent Query
        $todayDate = date("Y-m-d"); 
        $nsmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.nsmccrsid')
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.nsmccrsid')->first();
        if($nsmccrsid == null){
             
            $nsm_absent_id = 0;
        }else{
        
            $nsm_absent_id = $nsmccrsid->absent_ccrsid;
        }
        //FM Absent Query
        $fmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.fmccrsid')
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.fmccrsid') 
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))->first();  
        if($fmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $fmccrsid->absent_ccrsid;
        }
         
        $fm_staff_name = \DB::table('dr_cases')
                    ->join('users', 'dr_cases.fmccrsid', '=', 'users.ccrsid') 
                    ->Select('users.name' )
                    ->where('dr_cases.id', $id)->get();
        $zm_staff_name = \DB::table('dr_cases')
                        ->join('users', 'dr_cases.zmccrsid', '=', 'users.ccrsid') 
                        ->Select('users.name' )
                        ->where('dr_cases.id', $id)->get();
        return view('zm.nsm_case_action')->with('case_view', $case_view)
        ->with('zm_staff_name', $zm_staff_name)
        ->with('fm_staff_name', $fm_staff_name)
        ->with('fmccrsid', $absent_id)
        ->with('nsmccrsid', $nsm_absent_id);
    }

    public function update_nsm(Request $request, $id)
    {
        $ccrsid = Auth::user()->ccrsid;
        $todayDate = date("Y-m-d"); 
        $nsmccrsid = \DB::table('absents')
                    ->select('absents.absent_ccrsid')
                    ->leftJoin('escalation_hierarchies', 'absents.absent_ccrsid', '=', 'escalation_hierarchies.nsmccrsid')
                    ->where(TRIM('absents.from_date'), '<=', TRIM($todayDate))
                    ->where(TRIM('absents.to_date'), '>=', TRIM($todayDate))
                    ->where('absents.assign_ccrsid', $ccrsid)  
                    ->whereColumn('absents.absent_ccrsid', 'escalation_hierarchies.nsmccrsid')->first();   
        if($nsmccrsid == null){
             
            $nsm_absent_id = 0;
        }else{
        
            $nsm_absent_id = $nsmccrsid->absent_ccrsid;
        }
        if($request->input('nsm_last_visit_date') == null){
            $newDate = null;
        }else{
            $date = str_replace('/', '-',$request->input('nsm_last_visit_date') );
            $newDate = date("Y-m-d", strtotime($date));

        }
        if(isset($_POST['approved'])){
            $update_zm_case = DB::table('dr_cases')->where('id', $id)
                            ->update(['nsm_remarks'=> $request->input('nsm_remarks'),
                                      'payment_person'=> $request->input('payment_person'),
                                      'nsm_last_visit_date'=>  $newDate,
                                      'nsm_approved_date' =>now(),
                                      'is_approved_nsm' => 1,
                                        'current_case_handler' => 'pm',
                                        'nsmccrsid' => $nsmccrsid->absent_ccrsid]);
        }else if(isset($_POST['rejected'])){
            $update_zm_case = DB::table('dr_cases')->where('id', $id)
                            ->update(['nsm_remarks'=> $request->input('nsm_remarks'),
                                      'payment_person'=> $request->input('payment_person'),
                                      'nsm_last_visit_date'=>  $newDate,
                                      'nsm_approved_date' =>now(),
                                      'is_rejected_nsm' => 1,
                                      'nsmccrsid' => $nsmccrsid->absent_ccrsid]);
        }
        //dd($update_zm_case);
        return redirect("zm/nsm_case_lists"); 
    }
    
    public function rejected_case_check(Request $request)
    {
        $ss = $request->input('dr_name'); 
        $reject_cases = DB::select("SELECT dr_name FROM dr_cases WHERE dr_name = '$ss'
                                    and (is_rejected_zm = 1
                                    or is_rejected_nsm = 1
                                    or is_rejected_pm = 1)" ); 
         
        return response()->json($reject_cases);
         
    }
}
