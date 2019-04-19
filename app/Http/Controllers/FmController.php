<?php

namespace App\Http\Controllers;

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
        dd($request);
        
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
