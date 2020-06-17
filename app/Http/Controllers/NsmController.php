<?php

namespace App\Http\Controllers;

use App\User;
use App\Dr_Case;
use App\Absent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use PDF;

class NsmController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function case($id)
    {   
        $ccrsid = Auth::user()->ccrsid;
        $case_view = Dr_Case::find($id);
        $case_view2 = Dr_Case::find($id);
        // $case_view2->nsm_last_visit_date = date('Y-m-d H:i:s');
        // $case_view2->save();
        $fm_staff_name = \DB::table('dr_cases')
        ->join('users', 'dr_cases.fmccrsid', '=', 'users.ccrsid') 
        ->Select('users.name' )
        ->where('dr_cases.id', $id)->get();
        $zm_staff_name = \DB::table('dr_cases')
        ->join('users', 'dr_cases.zmccrsid', '=', 'users.ccrsid') 
        ->Select('users.name' )
        ->where('dr_cases.id', $id)->get();
        return view('nsm.nsm_case_Action')->with('case_view', $case_view)
        ->with('zm_staff_name', $zm_staff_name)
        ->with('fm_staff_name', $fm_staff_name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_case($id)
    {
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
        return view('nsm.nsm_view_case')->with('view_case', $view_case)
        ->with('view_case_product', $view_case_product)
        ->with('retention', $retention)
        ->with('approved_product', $approved_product)
        ->with('unapproved_product', $unapproved_product)
        ->with('fm_name', $fm_name)
        ->with('nsm_name', $nsm_name)
        ->with('zm_name', $zm_name)
        ->with('pm_name', $pm_name)
        ->with('qualification', $qualification)
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
                                      'nsm_last_visit_date'=> $newDate,
                                      'nsm_approved_date' =>now(),
                                      'is_approved_nsm' => 1,
                                        'current_case_handler' => 'pm',
                                        'nsmccrsid' => $ccrsid]);
        }else if(isset($_POST['rejected'])){
            $update_zm_case = DB::table('dr_cases')->where('id', $id)
                            ->update(['nsm_remarks'=> $request->input('nsm_remarks'),
                                      'payment_person'=> $request->input('payment_person'),
                                      'nsm_last_visit_date'=> $newDate,
                                      'nsm_approved_date' =>now(),
                                      'is_rejected_nsm' => 1,
                                      'nsmccrsid' => $ccrsid]);
        }
        $notification = array(
            'message' => 'Case Submit SucessFully', 
            'alert-type' => 'success'
        );
        return redirect("nsm/case_lists")->with($notification);
         
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
        $nsm_case_record = \DB::table('dr_Cases')->whereRaw('FIND_IN_SET("'.$ccrsid.'",concerned_nsm)')
        ->where('current_case_handler', 'nsm')
        ->where('is_rejected_nsm','!=',  1)
        ->orderBy('id', 'DESC')->get();
        //dd($nsm_case_record);
        $data['nsm_case_record'] = $nsm_case_record;
        return view('nsm.nsm_list') ->with($data);
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
        $zm_name = \DB::table('users')->where('ccrsid', $view_case->zmccrsid)->get();
        $pm_name = \DB::table('users')->where('ccrsid', $view_case->concerned_pm)->get();
        $qualification = \DB::table('qualifications')
                    ->select('qualifications.*')
                    ->leftJoin('dr_cases', 'qualifications.id', '=', 'dr_cases.qualification_id')
                    ->where('dr_cases.id', $id)->get();
    //     if($view_case->case_type == 'new'){
    //         $pdf = PDF::loadView('nsm.nsm_new_pdf_case_report', ['view_case'  => $view_case,
    //                                                             'view_case_product'  => $view_case_product,
    //                                                             'fm_name' => $fm_name,
    //                                                             'zm_name' => $zm_name,
    //                                                             'nsm_name' => $nsm_name ]);    

    //    return $pdf->download('standpharm.pdf');
    //     }else{
        $pdf = PDF::loadView('nsm.nsm_pdf_case_report', ['view_case'  => $view_case,
                                         'view_case_product'  => $view_case_product,
                                         'retention' =>  $retention,
                                         'approved_product' => $approved_product,
                                         'unapproved_product' => $unapproved_product,
                                         'fm_name' => $fm_name,
                                         'zm_name' => $zm_name,
                                         'nsm_name' => $nsm_name,
                                         'pm_name' => $pm_name,
                                         'qualification' => $qualification ]); 
         
  
        return $pdf->download('standpharm.pdf');
        //}
    }

    public function my_cases(Request $request)
    {
        $data['page_title'] = "Cases List";
        $ccrsid = Auth::user()->ccrsid;
        $nsm_case_record = DB::select("Select dr.* from dr_cases dr  
        where dr.nsmccrsid = $ccrsid
        and dr.is_rejected_zm != 1 
        and dr.is_rejected_nsm != 1 
        and dr.is_rejected_pm != 1
        and is_fm_save_case != 1  
        and current_case_handler ='pm' 
        order by dr.id Desc" );
        $data['nsm_case_record'] = $nsm_case_record;
        return view('nsm.nsm_cases') ->with($data);
    }

    public function reject_case_lists(Request $request)
    {
        $data['page_title'] = "Cases List";
        $ccrsid = Auth::user()->ccrsid;
        $nsm_case_record = DB::select("Select * from dr_cases 
        where (concerned_nsm = $ccrsid)
        and (is_rejected_zm != 0 
        or is_rejected_nsm != 0 
        or is_rejected_pm != 0 )
        order by id DESC " );
        // $fm_case_record = \DB::table('dr_Cases')->where('fmccrsid', $ccrsid)->
        
        //orderBy('id', 'ASC')->get();
        //dd($fm_case_record);
        $data['nsm_case_record'] = $nsm_case_record;
        return view('nsm.nsm_reject_list') ->with($data);
    }

    public function nsm_escalation_record(Request $request)
    {
        $ccrsid = Auth::user()->ccrsid;
        $todayDate = date("Y-m-d");  
        $fmccrsid = \DB::table('absents')
                    ->select('absent_ccrsid')
                    ->where('assign_ccrsid', $ccrsid)
                    ->where('to_date', '>=', $todayDate)->first(); 
        $nsm_absent_record = DB::select(" SELECT * FROM `absents` WHERE absent_ccrsid = $ccrsid 
                                         order by ID DESC ");  
         
        if($fmccrsid == null){
             
            $absent_id = 0;
        }else{
        
            $absent_id = $fmccrsid->absent_ccrsid;
        }
        $nsm_escalation_record = DB::select("SELECT  eh.zmccrsid,
                                            GROUP_CONCAT(b.name ORDER BY b.id) zmname
                                            FROM  escalation_hierarchies eh
                                            INNER JOIN users b
                                            ON FIND_IN_SET(b.ccrsid, eh.zmccrsid) > 0
                                            where eh.nsmccrsid = $ccrsid
                                            GROUP BY eh.zmccrsid " );
        //dd($zm_escalation_record);
  
        $values = [];
        foreach ($nsm_escalation_record as $product) {
            foreach(explode(',', $product->zmccrsid) as $value) {
                $values[] = trim($value);
            }
        }
        $values = array_unique($values);
        
        $data['values'] = $values;  
        return view('nsm.nsm_absents')->with($data)
        ->with('nsmccrsid', $absent_id)
        ->with('nsm_absent_record', $nsm_absent_record);

    }

    public function nsm_absents(Request $request)
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
        return redirect('nsm/nsm_escalation_record');
         

    }
}