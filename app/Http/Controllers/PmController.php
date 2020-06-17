<?php

namespace App\Http\Controllers;

use App\User;
use App\Dr_Case;
use App\Activity;
use App\Document_Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use PDF;

class PmController extends Controller
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
        $d1 = Document_Upload::find($id); 
        $file = public_path( $d1->image_path); 
        return response()->download($file);
    }

    public function case($id)
    {   
       
        $case_view = Dr_Case::find($id);
        $case_view2 = Dr_Case::find($id);
        $case_view2->pm_last_visit_date = date('Y-m-d H:i:s');
        $case_view2->save();
        $fm_staff_name = \DB::table('dr_cases')
        ->join('users', 'dr_cases.fmccrsid', '=', 'users.ccrsid') 
        ->Select('users.name' )
        ->where('dr_cases.id', $id)->get();
        $zm_staff_name = \DB::table('dr_cases')
        ->join('users', 'dr_cases.zmccrsid', '=', 'users.ccrsid') 
        ->Select('users.name' )
        ->where('dr_cases.id', $id)->get();
        return view('pm.pm_case_Action')->with('case_view', $case_view)
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
        $case_document = \DB::table('document_uploads')->where('case_id', $id)->get();
        $retention_document = \DB::table('retention_documents')->where('case_id', $id)->get();
        $pm_name = \DB::table('users')->where('ccrsid', $view_case->pmccrsid)->get();
        $qualification = \DB::table('qualifications')
                    ->select('qualifications.*')
                    ->leftJoin('dr_cases', 'qualifications.id', '=', 'dr_cases.qualification_id')
                    ->where('dr_cases.id', $id)->get();
        $document_upload = \DB::table('document_uploads')->where('case_id', $id)->get();
        return view('pm.pm_view_case')
        ->with('retention', $retention)
        ->with('approved_product', $approved_product)
        ->with('unapproved_product', $unapproved_product)
        ->with('view_case', $view_case)
        ->with('view_case_product', $view_case_product)
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
        
        if(isset($_POST['approved'])){
            $update_zm_case = DB::table('dr_cases')->where('id', $id)
                            ->update(['pm_remarks'=> $request->input('pm_remarks'),
                                      'payment_person'=> $request->input('payment_person'),
                                      'approved_amount'=> $request->input('approved_amount'),
                                      'reference_number'=> $request->input('reference_number'),
                                        'pm_last_visit_date' =>now(),
                                       'is_approved_pm' => 1,
                                        'current_case_handler' => 'pm',
                                        'is_completed' => 1,
                                        'pmccrsid' => $ccrsid]);
        }else if(isset($_POST['rejected'])){
            $update_zm_case = DB::table('dr_cases')->where('id', $id)
                            ->update(['pm_remarks'=> $request->input('pm_remarks'),
                                      'payment_person'=> $request->input('payment_person'),
                                      'approved_amount'=> $request->input('approved_amount'),
                                      'reference_number'=> $request->input('reference_number'),
                                      'pm_last_visit_date'=>now(),
                                      'is_rejected_pm' => 1,
                                    'pmccrsid' => $ccrsid]);
        }
        $notification = array(
            'message' => 'Case Submit SucessFully', 
            'alert-type' => 'success'
        );
        return redirect("pm/case_lists")->with($notification);
        // view('zm.zm_case_action')->with('update_zm_case', $update_zm_case);
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
        $pm_case_record = \DB::table('dr_Cases')->whereRaw('FIND_IN_SET("'.$ccrsid.'",concerned_pm)')
        ->where('current_case_handler', 'pm')
        ->where('is_approved_pm','!=',  1)
        ->where('is_rejected_pm','!=',  1)
        ->orderBy('id', 'DESC')->get();
        //dd($pm_case_record);
        $data['pm_case_record'] = $pm_case_record;
        return view('pm.pm_list') ->with($data);
    }

    public function approved_case_lists(Request $request)
    {
        $data['page_title'] = "Approved Cases List";
        $ccrsid = Auth::user()->ccrsid;
        $pm_case_record = \DB::table('dr_cases')
        ->whereRaw('FIND_IN_SET("'.$ccrsid.'",concerned_pm)')
        ->where('current_case_handler', 'pm')
        ->where('is_approved_pm','!=',  0)
        ->orderBy('id', 'DESC')->get();
        //dd($pm_case_record);
        $data['pm_case_record'] = $pm_case_record;
        return view('pm.pm_approved_list') ->with($data);
    }

    public function reject_case_lists(Request $request)
    {
        $data['page_title'] = "Cases List";
        $ccrsid = Auth::user()->ccrsid;
        $pm_case_record = DB::select("Select * from dr_cases 
        where (concerned_pm = $ccrsid)
        and (is_rejected_zm != 0 
        or is_rejected_nsm != 0 
        or is_rejected_pm != 0)
        order by id DESC" );
        // $fm_case_record = \DB::table('dr_Cases')->where('fmccrsid', $ccrsid)->
        
        //orderBy('id', 'ASC')->get();
        //dd($fm_case_record);
        $data['pm_case_record'] = $pm_case_record;
        return view('pm.pm_reject_list') ->with($data);
    }

    public function generatePDF($id)
    {
        $view_case = Dr_Case::find($id);
        $retention = \DB::table('retentions')->where('case_id', $id)->get(); 
        $approved_product = \DB::table('retention_approved_products')->where('case_id', $id)->get(); 
        $unapproved_product = \DB::table('retention_unapproved_products')->where('case_id', $id)->get();
        $view_case_product = \DB::table('activities')->where('case_id', $id)->get();
        $fm_name = \DB::table('users')->where('ccrsid', $view_case->fmccrsid)->get();
        $nsm_name = \DB::table('users')->where('ccrsid', $view_case->concerned_nsm)->get();
        $zm_name = \DB::table('users')->where('ccrsid', $view_case->zmccrsid)->get();
        $qualification = \DB::table('qualifications')
                    ->select('qualifications.*')
                    ->leftJoin('dr_cases', 'qualifications.id', '=', 'dr_cases.qualification_id')
                    ->where('dr_cases.id', $id)->get();
        // if($view_case->case_type == 'new'){
        //     $pdf = PDF::loadView('pm.pm_new_pdf_case_report', ['view_case'  => $view_case,
        //                                                         'view_case_product'  => $view_case_product,
        //                                                         'fm_name' => $fm_name,
        //                                                         'zm_name' => $zm_name,
        //                                                         'nsm_name' => $nsm_name]);    

        // return $pdf->download('standpharm.pdf');
        // }else{
        $pdf = PDF::loadView('pm.pm_pdf_case_report', ['view_case'  => $view_case,
                                                        'view_case_product'  => $view_case_product,
                                                        'retention' =>  $retention,
                                                        'approved_product' => $approved_product,
                                                        'unapproved_product' => $unapproved_product,
                                                        'fm_name' => $fm_name,
                                                        'zm_name' => $zm_name,
                                                        'nsm_name' => $nsm_name,
                                                        'qualification' => $qualification ]);    
  
        return $pdf->download('standpharm.pdf');
        // }
    }
}