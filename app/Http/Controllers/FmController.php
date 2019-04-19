<?php

namespace App\Http\Controllers;

use App\Dr_Case;
use App\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function create_case()
    {
        $data['page_title'] = "Create Case";
        $data['page_description'] = "Welcome to Admin Dashboard";
        $ccrsid = Auth::user()->ccrsid;
        
        $case = \DB::table('zone_station_details')->where('ccrsid', $ccrsid)->first();

        $data['case'] = $case;
        return view('fm.create_case')->with($data);
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
        
            $dr_case_id = Dr_Case::create([
            'team' => $request->input('team'),
            'zone' => $request->input('zone'),
            'district' => $request->input('district'),
            'station' => $request->input('station'),
            'dr_name' => $request->input('dr_name'),
            'hospital_name' => $request->input('hospital_name'),
            'pharmacy_name' => $request->input('pharmacy_name'),
            'discount_details' => $request->input('discount_details'),
            'dr_designation' => $request->input('dr_designation'),
            'salutation' => $request->input('salutation'),
            'salutation_specify' => $request->input('salutation_specify'),
            'ppb' => $request->input('ppb'),
            'last_visit_date' => $request->input('last_visit_date'),
            'case_type' => $request->input('case_type'),
            'committed_biz' => $request->input('committed_biz'),
            'actual_biz' => $request->input('actual_biz'),
            'spb_amt' => $request->input('spb_aamount'),
            'committed_time' => $request->input('committed_time'),
            'actual_time' => $request->input('actual_time'),
            'coa' => $request->input('coa'),
            'success' => $request->input('success'),
            'activity_name' => $request->input('activity_name'),
            'ytd_spb_rate' => $request->input('ytd_spb_rate'),
            'ytd_Sale' => $request->input('ytd_Sale'),
            'ytd_spb_c_y' => $request->input('ytd_spb_c_y'),
            'ytd_ratio' => $request->input('ytd_ratio'),
            'duration_month' => $request->input('duration_month'),
            't_coa' => $request->input('t_coa'),
        ]);
        $case_id = $dr_case_id->id;
        foreach($request->input('product') as $key => $product){
            $fm_acitivity_case = new Activity;
           
                
                $fm_acitivity_case->case_id = $case_id;
                $fm_acitivity_case->product = $request->input('product')[$key];
                $fm_acitivity_case->spb_amt = $request->input('spb_amt')[$key];
                $fm_acitivity_case->current_biz  = $request->input('current_biz')[$key];
                $fm_acitivity_case->proj_biz  = $request->input('proj_biz')[$key];
                $fm_acitivity_case->tot_proj = $request->input('tot_proj')[$key];
                $fm_acitivity_case->cost_of_activity  = $request->input('cost_of_activity')[$key];
                $fm_acitivity_case->save();
           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $ccrsid = Auth::user()->ccrsid;
        
        $case = \DB::table('zone_station_details')->where('ccrsid', $ccrsid)->first();

        
        dd($case);
        return view('fm.create_case')->with('case', $case);
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
        //
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
}
