@extends('fm.template.admin_template')



@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/toaster/custom.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/selecter/select2.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/toaster/pedding.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
 
<!-- Main content -->
<section class="content main_calculations">
    <!--tab1 -->
    <form method="post" onsubmit="return confirm('Do you really want to submit the form?');" action="{{ route('fm.store') }}" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="row">
            <div class="col-xs-12">
                <div class="box tab" id="box tab">
                    <div class="box-header">
                        <h3 class="box-title">New Case</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="case_catagory" onclick="javascript:fresh_reapply_Check();"
                                            id="fnoCheck" value='Fresh' checked>Fresh
                                    </label>
                                    <label class="radio-inline">
                                        <input  type="radio" name="case_catagory" onclick="javascript:fresh_reapply_Check();"
                                                id="fyesCheck" value='Reapply'>Reapply
                                    </label>
                                     
                                </div>
                            </div>
                             
                        </div>
                        <!--fresh_refresh-->
                        <div id="fifYes" style="display:none">
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea class="form-control" id="remarks" name="discription" rows="3"></textarea>
                            </div>
                             
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Select Team</label>
                                    <select name="team" class="form-control" required>
                                    <option value="">Select Team</option>
                                        @foreach(explode(",", $case->team) as $key => $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                <label>Select Zone</label>
                                    <select name="zone" class="form-control">
                                        @foreach(explode(",", $case->zone) as $key => $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-header -->
                    
                    <div class="box-body">
                       <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Select District</label>
                                    <select name="district" class="form-control">
                                        @foreach(explode(",", $case->district) as $key => $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Select Station</label>
                                    <select name="station" class="form-control">
                                    <option value="">Select Station</option>
                                        @foreach(explode(",", $case->station) as $key => $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "box-body">
                      <div class="row">
                            <div class="col-xs-4">
                              <label>YTD Sale</label>
                              <input class="form-control" id="ytd_Sale" type="number" name="ytd_Sale" placeholder="YTD Sale" required min="0" oninput="validity.valid||(value='');">
                            </div>
                            <div class="col-xs-4">
                              <label>YTD SPB C.Y</label>
                              <input class="form-control" type="number" id="ytd_spb_c_y" name="ytd_spb_c_y" placeholder="YTD SPB C.Y" required min="0" oninput="validity.valid||(value='');">
                            </div>
                            <div class="col-xs-4">
                              <label>YTD SPB Ratio</label>
                              <input class="form-control" type="text" id="ytd_ratio" name="ytd_ratio" placeholder="YTD SPB Ratio" readonly required>
                            </div>
                      </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Dr Name</label>
                                <select name="dr_name" class="form-control dr_detail select2" id="dr_detail" style="width: 100%;" required>
                                    <option value="">Select Dr Name</option> 
                                    @foreach($dr_detail as $dr_detail) 
                                      <option value="{{$dr_detail}}">{{$dr_detail}}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label>Hospital</label>
                                <input class="form-control" type="text" id="hospital_name" name="hospital_name" placeholder="Hospital / Institution" required>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Address</label>
                                <input class="form-control" type="text" id="dr_address" name="dr_address" placeholder="Dr Address" required>
                            </div>
                            <div class="col-xs-6">
                                <label>Contact</label>
                                <input class="form-control" type="text" id="dr_contact_number" name="dr_contact_number" placeholder="Dr Contact Number" required>
                            </div>
                            <div class="col-xs-6" style='display:none'>
                                <label>Dr Code</label>
                                <input class="form-control" type="text" id="dr_code" name="dr_code" value="" placeholder="Dr Contact Number" required>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Monitoring Pharmacy(ies)</label>
                                <input class="form-control" type="text" name="pharmacy_name" placeholder="Attached Pharmacy" required>
                            </div>
                            <div class="col-xs-6">
                                <label>Discount Details (If any)</label>
                                <input class="form-control" type="text" name="discount_details" placeholder="Discount Details (If any)" required>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Qualification</label>
                                <select name="qualification_id" class="form-control select2" style="width: 100%;" required>
                                <option value="">Select Qualification</option>
                                    @foreach($qualification as $qualification)
                                    <option value="{{$qualification->id}}">{{$qualification->designation}} - {{$qualification->desig_full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <!-- <label>Designation</label>
                                <input class="form-control" type="text" name="dr_designation" placeholder="Designation" required> -->
                                <label>Designation</label>
                                <select name="dr_designation" class="form-control" required>
                                <option value="">Select Designation</option>
                                    @foreach($designation as $designation)
                                    <option value="{{$designation->designation}}">{{$designation->designation}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <!-- <label>Designation</label>
                                <input class="form-control" type="text" name="dr_designation" placeholder="Designation" required> -->
                                <label>Specialty</label>
                                <select name="salutation_specify" id="DropDownList" class="form-control">
                                <!-- <option value="">Specify Specialty</option> -->
                                    
                                </select>
                            </div>
                            
                            <div class="inputContainer" >
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row"  style="display:none">
                            <div class="col-xs-12">
                                <label class="radio-inline">
                                    <input type="radio" name="salutation" value="GP" onclick="show1();" checked>GP
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="salutation" value="MO" onclick="show1();">MO
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="salutation" value="Consultant" onclick="show2();">Consultant
                                </label>


                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row" id="div1" style="display:none">
                                <div class="col-xs-12">
                                    <label>Specialty</label>
                                    <!-- <input class="form-control" type="text" name="salutation_specify" placeholder="Specify"> -->
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <label class="radio-inline">
                                    <input type="radio" name="ppb" value="Prescriber" checked>Prescriber
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="ppb" value="Purchaser" >Purchaser
                                </label>
                                <!-- <label class="radio-inline">
                                    <input type="radio" name="ppb" value="Both">Both
                                </label> -->


                            </div>
                            <div class="col-xs-4">
                                <label>Last Visit Date</label>
                                <input type="text" class="form-control pull-right datepicker"
                                       name="last_visit_date" autocomplete="off" id="datepicker" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-4">
                            </div>
                            <div class="col-xs-4">
                            </div>
                            <div class="col-xs-4">
                               <label class="checkbox-inline">
                                    <input type="checkbox" name="checkbox" id="checkbox" />Accompanied By:
                                </label>
                                <br />
                                <div class="drop">
                                    <!-- <input id="showthis" class="form-control" name="accompanied_person_fm" size="50" type="text" placeholder="Person Name" /> -->
                                    <select id="showthis" name="accompanied_person_fm[]" data-placeholder="Select Designation" class="form-control select2" multiple="multiple" style="width: 100%;">
                                        <option value="FM">FM</option>
                                        <option value="ZM">ZM</option>
                                        <option value="NSM">NSM</option>
                                        <option value="PM">PM</option>
                                                            
                                    </select>
                                </div>
                            </div>
                             
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <label class="radio-inline">
                                    <input type="radio" name="case_type" onclick="javascript:yesnoCheck();"
                                           id="noCheck" value='new' checked>New Case
                                </label>
                                <label class="radio-inline">
                                    <input  type="radio" name="case_type" onclick="javascript:yesnoCheck();"
                                            id="yesCheck" value='retention'>Retention
                                </label>


                            </div>
                        </div>
                        <!--retention case -->
                        <div id="ifYes" style="display:none">

                            <div class="box-header with-border">
                                <h3 class="box-title">Rentention Case Details (In case of Retention)</h3>
                            </div>
                            <div class="box-body retention_ss">
                                <div class="row">
                                    <div class="col-sm-12">
                                     
                                        <div class="input-group retention_hdtuto control-group retention_lst retention_increment" >

                                            <input type="file" name="retention_image[]" multiple   class="retention_myfrm form-control">

                                            <div class="input-group-btn"> 

                                                <button class="btn btn-success retention_plus" name="imagees" value="45"  type="button"><i class="retention_fldemo glyphicon glyphicon-plus"></i>Add</button>

                                            </div>

                                        </div>

                                            <div class="retention_clone hide">

                                                <div class="retention_hdtuto control-group retention_lst input-group" style="margin-top:10px">

                                                    <input type="file" name="retention_image[]" multiple   class="retention_myfrm form-control">

                                                    <div class="input-group-btn"> 

                                                    <button class="btn btn-danger retention_rem" name="imagees" value="48" type="button"><i class="retention_fldemo glyphicon glyphicon-remove"></i> Remove</button>

                                                    </div>

                                            </div>

                                        </div>    
 
                                    </div>
                                </div>
                            </div>
                            <!-- approved Product -->
                            <div class="wrapper center-block">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <!-- approved Product -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading active" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Approved Product
                                                                </a>
                                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label>Date Of Approval</label>
                                                        <input type="text" class="form-control pull-right datepicker"
                                                            name="date_of_approval" autocomplete="off" id="date_of_approval">
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <label>Projected Duration(Months)</label>
                                                        <input class="form-control" id="project_duration" type="number" min="0" name="project_duration" placeholder="Project Duration"   oninput="validity.valid||(value='');">
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <label>Projected Date of Completion</label>
                                                        <input class="form-control" id="projected_date_of_completion" type="text" name="projected_date_of_completion" placeholder="projected_date_of_completion" readonly>
                                                    </div>

                                                </div>
                                                <br/>
                                                <div class="row">
                                                     
                                                    <div class="col-xs-6">
                                                        <label>Actual Duration(Months)</label>
                                                        <input class="form-control" id="actual_duration" type="number" min="0" name="actual_duration" placeholder="actual_duration" oninput="validity.valid||(value='');">
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label>Actual Date Of Completion</label>
                                                        <input class="form-control" id="actual_date_of_completion" type="text" name="actual_date_of_completion" placeholder="Actual Date Of Completion" readonly>
                                                    </div>

                                                </div>
                                                <br/>
                                                <!-- Product List -->
                                                <div class="row">
                                                  
                                                    <div id="approved_product">
                                                        <div class="grouped_entities">
                                                            <div class="col-sm-2 nopadding">
                                                                <div class="form-group">
                                                                    <label>Product Name</label>
                                                                    <select id="product_name" name="product_name[]" class="form-control product_name">
                                                                        <option value="">Select Product</option>
                                                                    </select>
                                                                     
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2 nopadding" style="display:none;">
                                                                <div class="form-group">
                                                                <label>Current TP</label>
                                                                    <input type="text" class="form-control approved_tp" id="approved_tp" name="approved_tp[]" value="" placeholder="SPB Amount" >
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2 nopadding">
                                                                <div class="form-group">
                                                                    <label>SPB Value(Rs,)</label>
                                                                    <input type="number" class="form-control spb_value" id="spb_value" name="spb_value[]" value="" placeholder="SPB Value(Rs,)" min="0" oninput="validity.valid||(value='');">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2 nopadding">
                                                                <div class="form-group">
                                                                    <label>Project Biz / Month</label>
                                                                    <input type="number" class="form-control biz_units_month" id="biz_units_month" name="biz_units_month[]" value="" placeholder="Projected Biz / Month" min="0" oninput="validity.valid||(value='');">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-2 nopadding">
                                                                <div class="form-group">
                                                                    <label>Project Total Biz</label>
                                                                    <input type="text" class="form-control biz_units" id="biz_units" name="biz_units[]" value="" placeholder="Projected Total Biz" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-2 nopadding">
                                                                <div class="form-group">
                                                                    <label>Actual Total Biz</label>
                                                                    <input type="number" class="form-control actual_biz_unit" id="actual_biz_unit" name="actual_biz_unit[]" value=""  placeholder="Actual Total Biz Units" min="0" oninput="validity.valid||(value='');">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1 nopadding">
                                                                <div class="form-group">
                                                                    <label>COA</label>
                                                                    <input type="text" class="form-control coa" id="coa" name="coa[]" value=""  placeholder="COA" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-2 nopadding">
                                                                <div class="form-group">
                                                                    <label>Success %age</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control success" id="success" name="success[]" readonly value="" placeholder="success %age">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-success" type="button" onclick="approved_product(this);"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <!--Total Value row -->
                                                <div class="row">
                                                    <div class="box-body">
                                                        <div class="panel panel-default">

                                                            <div class="panel-body">

                                                                <div id="approved_product">

                                                                </div>
                                                                <div class="col-sm-2 nopadding">
                                                                    <div class="form-group">
                                                                        <div class="form-group">
                                                                            <h4>Total Value:</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2 nopadding">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="total_spb_value" name="total_spb_value" value="" placeholder="Total Spb Value" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-2 nopadding">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="total_biz_units_month" name="total_biz_units_month" value="" placeholder="Total Projected Biz" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2 nopadding">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="total_biz_units" name="pro_total_biz_units" value="" placeholder="Total Biz Unit" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2 nopadding">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="actual_total_biz_units" name="actual_total_biz_units" value="" placeholder="Actual Biz Unit" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-1 nopadding">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="total_coa" name="total_coa" value="" placeholder="Total COA" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2 nopadding">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="total_success" name="total_success" value="" placeholder="Total Success" readonly>
                                                                    </div>
                                                                </div>

                                                                 
                                                                <div class="clear"></div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--row end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!--un approved Product -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                UnApproved Product
                                                                </a>
                                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <!--un approved Product -->
                                                <div class="row">
                                                    
                                                    <div id="unapproved_product">
                                                        <div class="grouped_entities">
                                                            <div class="col-sm-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Product Name</label>
                                                                    <select id="product_names" name="product_names[]" class="form-control product_names">
                                                                        <option value="">Select Product</option>
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2 nopadding" style="display:none;">
                                                                <div class="form-group">
                                                                <label>Current TP</label>
                                                                    <input type="text" class="form-control unapproved_tp" id="unapproved_tp" name="unapproved_tp[]" value="" placeholder="SPB Amount" >
                                                                </div>
                                                            </div>  
                                                            <div class="col-sm-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Total Biz Unit</label>
                                                                    <input type="number" class="form-control total_biz_units" id="total_biz_units" name="total_biz_units[]" value=""  placeholder="Total Biz Unit" min="0" oninput="validity.valid||(value='');">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Comments</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control comments" id="comments" name="comments[]" value="" placeholder="comments">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-success" type="button" onclick="unapproved_product(this);"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <!--unapproved product list -->
                                                <!-- Total Unapproved Product -->
                                                <div class="row">
                                                    <div class="box-body">
                                                        <div class="panel panel-default">

                                                            <div class="panel-body">

                                                                <div id="unapproved_product">

                                                                </div>
                                                                <div class="col-sm-4 nopadding">
                                                                    <div class="form-group">
                                                                        <div class="form-group">
                                                                            <h4>Total Value:</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 nopadding">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="unapproved_total_biz_units" name="unapproved_total_biz_units" value="" placeholder="Total Biz" readonly>
                                                                    </div>
                                                                </div>
  
                                                                <div class="clear"></div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--row end -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                               
                            </div>
                             <!-- End approved / un approved Product -->
                            
                        </div>
                        <!--end retention case -->
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!--end tab1 -->
            <!-- /.row -->
        </div>
        <!--tab2 -->
        <div class="row" >
            <div class="col-xs-12">
                <div class="box tab">
                    <div class="box-header">
                        <h3 class="box-title"Activity Detail</h3>
                    </div>
                    <!-- /.box -->
                    <div class="box-body">
                       <div class="form-group">
                          <label>Select Activity Name</label>
                            <select name="activity_name" class="form-control" required>
                            <option value="">Select Activity Name</option>
                                @foreach($activity_names as $activity_name)
                                <option value="{{$activity_name->activity_name}}">{{$activity_name->activity_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Duration</label>
                                <input class="form-control" type="number" id="duration_month" name="duration_month" placeholder="Duration" required min="0" oninput="validity.valid||(value='');">
                            </div>
                            <div class="col-xs-6">
                                <label>Total COA</label>
                                <input class="form-control" type="text" id="t_coa" name="t_coa" placeholder="Total Cost of Activity" readonly />
                            </div>
                        </div>
                    </div>

                     
                    <div class="box-body">
                        <div class="panel panel-default">

                            <div class="panel-body">

                                <div id="education_fields">
                                    <div class="grouped_entities">
                                        <div class="col-sm-2 nopadding">
                                            <div class="form-group">
                                            <label>Product Name</label>
                                            <select  id="product" name="product[]" class="form-control product" required>
                                                <option value="">Select Product</option>
                                            </select>
                                                <!-- <input type="text" class="form-control" id="product" name="product[]" value="" placeholder="Product" required> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-2 nopadding" style="display:none;">
                                            <div class="form-group">
                                            <label>Current TP</label>
                                                <input type="text" class="form-control tp" id="tp" name="tp[]" value="" placeholder="SPB Amount" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2 nopadding">
                                            <div class="form-group">
                                            <label>SPB Amount</label>
                                                <input type="number" class="form-control spb_amt_sum" id="spb_amt" name="spb_amt[]" value="" placeholder="SPB Amount" required min="0" oninput="validity.valid||(value='');">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 nopadding">
                                            <div class="form-group">
                                            <label>Current Biz / Month</label>
                                                <input type="number" class="form-control current_biz" id="current_biz" name="current_biz[]" value="" placeholder="Current Biz / Month" required min="0" oninput="validity.valid||(value='');">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                            <label>Projected Biz / Month</label>
                                                <input type="number" class="form-control proj_biz" id="proj_biz" name="proj_biz[]" value="" placeholder="Projected Biz / Month" required min="0" oninput="validity.valid||(value='');">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-2 nopadding">
                                            <div class="form-group">
                                            <label>Total Biz</label>
                                                <input type="text" class="form-control tot_proj" id="tot_proj" name="tot_proj[]" value="" readonly placeholder="Total Biz per Month" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-2 nopadding">
                                            <div class="form-group">
                                                <label>Product COA </label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control tt_coa" id="tt_coa" name="cost_of_activity[]" readonly value="" placeholder="Product COA">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success" type="button"  onclick="education_fields(this);"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>                              

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="panel panel-default">

                            <div class="panel-body">

                                <div id="education_fields">

                                </div>
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                      <div class="form-group">
                                        <h4>Total Value:</h4>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="spb_amt_sum" name="spb_sum" value="" placeholder="SPB AMT Sum" readonly required>
                                    </div>
                                </div>
                                
                                
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="current_biz_sum" name="current_biz_sum" value="" placeholder="Current Biz Sum" readonly required>
                                    </div>
                                </div>
                                <div class="col-sm-3 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="proj_biz_sum" name="proj_biz_sum" value="" placeholder="Project Biz Sum" readonly required>
                                    </div>
                                </div>
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tot_proj_sum" name="tot_proj_sum" value="" placeholder="Total Project Sum" readonly required>
                                    </div>
                                </div>

                                <div class="col-sm-2 nopadding">
                                    <!-- <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="tt_coa" name="cost_of_activity_sum" value="" placeholder="Cost Of Activity">
                                        </div>
                                    </div> -->
                                </div>
                                <div class="clear"></div>

                            </div>
                        </div>
                    </div>
                    <div class="box-body ss">
                       <div class="row">
                         <div class="col-sm-12">
                        
                        <div class="input-group hdtuto control-group lst increment" >

                            <input type="file" name="filenames[]" multiple   class="myfrm form-control">

                            <div class="input-group-btn"> 

                                <button class="btn btn-success plus" name="imagee" value="45"  type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>

                            </div>

                            </div>

                            <div class="clone hide">

                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">

                                <input type="file" name="filenames[]" multiple   class="myfrm form-control">

                                <div class="input-group-btn"> 

                                <button class="btn btn-danger rem" name="imagee" value="48" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>

                                </div>

                            </div>

                            </div>    

 
                         </div>
                       </div>
                    </div>




                </div>

            </div>
            <!-- /.col -->
        </div>
        <button type="submit" id="submit" name="submit" value="1" class="btn btn-primary">Submit</button>
        <button type="submit" id="save" name="save" value="0"class="btn btn-primary">PDF View</button> 
    </form>
    <!--end tab2 -->
    <!-- /.row -->
   

    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</section>
<!-- /.content -->
@endsection

@section('scripts')
<!-- jQuery 3 -->
<!--<script src="/bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<!--<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!-- DataTables -->
    
<script src="{{ asset("bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
<!-- SlimScroll -->
<script src="{{ asset("bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset("bower_components/fastclick/lib/fastclick.js") }}"></script>
<!-- AdminLTE App -->
<!--<script src="/bower_components/admin-lte/dist/js/adminlte.min.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("bower_components/admin-lte/dist/js/demo.js") }}"></script>
<!-- page script -->
<script src="{{ asset("bower_components/datepicker/bootstrap-datepicker.min.js") }}"></script>
<script src="{{ asset("bower_components/datepicker/daterangepicker.js") }}"></script>  
<!--selectjs-->
<script src="{{ asset("bower_components/selecter/select2.full.min.js") }}"></script>    
<script src="{{ asset("bower_components/moment/moment.js") }}"></script> 
   
<script>
    $(function () {
        $('#users_list').DataTable();
    });
    $(document).ready(function(){
        $("#comm_biz").change(function(){
            if($.trim($("#comm_biz").val()) != "" && $.trim($("#actual_biz").val()) != ""){
                var A = parseFloat($("#actual_biz").val());
                var C = parseFloat($("#comm_biz").val());
                var success_per = (A/C)*100;
                $("#success_per").val(success_per.toFixed(1));
            }
        });
        $("#actual_biz").change(function(){
            if($.trim($("#comm_biz").val()) != "" && $.trim($("#actual_biz").val()) != ""){
                var A = parseFloat($("#actual_biz").val());
                var C = parseFloat($("#comm_biz").val());
                var success_per = (A/C)*100;
                $("#success_per").val(success_per.toFixed(1));
            }

            if($.trim($("#spb_amt").val()) != "" && $.trim($("#actual_biz").val()) != ""){
                var A = parseFloat($("#actual_biz").val());
                var B = parseFloat($("#spb_amt").val());
                var coa_per = (B/A)*100;
                $("#coa_per").val(coa_per.toFixed(1));
            }
        });
        $("#spb_amt").change(function(){
            if($.trim($("#spb_amt").val()) != "" && $.trim($("#actual_biz").val()) != ""){
                var A = parseFloat($("#actual_biz").val());
                var B = parseFloat($("#spb_amt").val());
                var coa_per = (B/A)*100;
                $("#coa_per").val(coa_per.toFixed(1));
            }
        });
        $("#ytd_Sale, #ytd_spb_c_y").change(function(){
            if($.trim($("#ytd_Sale").val()) != "" && $.trim($("#ytd_spb_c_y").val()) != ""){
                var A = parseFloat($("#ytd_Sale").val());
                var B = parseFloat($("#ytd_spb_c_y").val());
                var ytd_ratio = (B/A)*100;
                $("#ytd_ratio").val(ytd_ratio.toFixed(1));
            }
        });
        $("#duration_month").keyup(function(){
            $(".proj_biz").trigger("change");
        });
    });
    //Main 1st
    //main_calculations
    $(".main_calculations").delegate( '.spb_amt_sum, #spb_amt_sum', "keyup", function(){
        total_spb_amount();
    }).delegate( '.spb_amt_sum, #spb_amt_sum', "change", function(){
        total_spb_amount();
    });
    function total_spb_amount(){
        var spb_amt_sum = 0;
        $(".spb_amt_sum").each(function(){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            spb_amt_sum += parseFloat(current_val);
        });
        $("#spb_amt_sum").val(addCommas(spb_amt_sum));
        // $("#spb_amt_sum").val(spb_amt_sum.toFixed(0));
        
    }
    function addCommas(current_val) {
        var parts = current_val.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }
    // Main 2nd
    $(".main_calculations").delegate( '.current_biz, .product', "keyup", function(){
        current_biz_calculations();
    }).delegate( '.current_biz, .product', "change", function(){
        current_biz_calculations();
    });
    function current_biz_calculations(){
        var current_biz_TP_sum = 0;
        $(".current_biz").each(function(){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            var current_tp = 0;
            if($.trim($(this).closest(".grouped_entities").find(".product").children("option:selected").val()) != ""){
                //current_tp = $(this).closest(".grouped_entities").find(".tot_proj").val();
                current_tp = $(this).closest(".grouped_entities").find(".product").children("option:selected").attr("data-sale_price");
                //console.log(current_tp+"<--- Current TP");
            }
            //$(this).closest(".grouped_entities").find(".tot_proj").val();
            current_biz_TP_sum += (parseFloat(current_val)*parseFloat(current_tp));
        });
        $("#current_biz_sum").val(current_biz_TP_sum.toFixed(0));
    }
    //Main 3rd
    $(".main_calculations").delegate('.proj_biz, .product', "keyup", function(){
        project_biz_calculations($(this));
        project_coa_calculations();
    }).delegate('.proj_biz, .product', "change", function(){
        project_biz_calculations($(this));
        project_coa_calculations();
    });
    // $(".main_calculations").delegate('.proj_biz, .product', "keyup", function(){
    //     project_coa_calculations($(this));
    // }).delegate('.proj_biz, .product', "change", function(){
    //     project_coa_calculations($(this));
    // });
    function project_biz_calculations(thisVar){
        // part1
        //if($.trim($("#duration_month").val()) != "" && $.trim(thisVar.closest(".grouped_entities").find(".proj_biz").val()) != "")
        {
            var X = parseFloat($("#duration_month").val());
            var Y = parseFloat(thisVar.closest(".grouped_entities").find(".proj_biz").val());
            var TotProj = X*Y;
            if(isNaN(TotProj)){
                TotProj = 0.00;
            }
            thisVar.closest(".grouped_entities").find(".tot_proj").val(TotProj.toFixed(0));
        }
        // part1.1
        var TCA = 0;
        $(".tot_proj").each(function(){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            var current_tp = 0;
            if($.trim($(this).closest(".grouped_entities").find(".product").children("option:selected").val()) != ""){
                current_tp = $(this).closest(".grouped_entities").find(".product").children("option:selected").attr("data-sale_price");
            }
            TCA += (parseFloat(current_val)*parseFloat(current_tp));
        });
        $("#tot_proj_sum").val(TCA.toFixed(0));
        $("#tot_proj_sum").trigger("change");
        // part2
        var proj_biz_TP_sum = 0;
        $(".proj_biz").each(function(){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            var current_tp = 0;
            if($.trim($(this).closest(".grouped_entities").find(".product").children("option:selected").val()) != ""){
                current_tp = $(this).closest(".grouped_entities").find(".product").children("option:selected").attr("data-sale_price");
            }
            proj_biz_TP_sum += (parseFloat(current_val)*parseFloat(current_tp));
        });
        $("#proj_biz_sum").val(proj_biz_TP_sum.toFixed(0));
    }

     //Main 4th
    // $(".main_calculations").delegate('.proj_biz, .product', "keyup", function(){
    //     project_coa_calculations($(this));
    // }).delegate('.proj_biz, .product', "change", function(){
    //     project_coa_calculations($(this));
    // });
    function project_coa_calculations(){
        
        var spb_amt_sum = 0;
        $(".spb_amt_sum").each(function(i){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            var X = parseFloat($("#duration_month").val());
            var Y = parseFloat($(this).closest(".grouped_entities").find(".proj_biz").val());
            var SUM = parseFloat(current_val);
            
            var current_tp = 0;
            if($.trim($(this).closest(".grouped_entities").find(".product").children("option:selected").val()) != ""){
                current_tp = $(this).closest(".grouped_entities").find(".product").children("option:selected").attr("data-sale_price");
            }
            // console.log(current_tp);
            var cost_of_activity = ((SUM /(X*Y*parseFloat(current_tp))) * 100);
            console.log(i + " SUM : " + SUM);
            console.log(i + " X : " + X);
            console.log(i + " Y : " + Y);
            console.log(i + " current_tp : " + current_tp);
            if(isNaN(cost_of_activity)){
                cost_of_activity = 0;
            }
            // console.log(cost_of_activity);
            $(this).closest(".grouped_entities").find(".tt_coa").val(cost_of_activity.toFixed(0));
            $(this).closest(".grouped_entities").find(".tp").val(current_tp);
            
        });
        
    }


    $(".main_calculations").delegate("#spb_amt_sum, #tot_proj_sum", "change", function(){
        if($("#spb_amt_sum").val() != "" && $("#tot_proj_sum").val() != "" && $("#tot_proj_sum").val() != 0){
            var SUM = parseFloat($("#spb_amt_sum").val().replace(/,/g, ''));
            var TCA = parseFloat($("#tot_proj_sum").val());
            var t_coa = parseFloat((SUM/TCA)*100);
            $("#t_coa").val(t_coa.toFixed(0));
        }else{
            $("#t_coa").val(0);
        }
    });

</script>
<script>
//Date picker

    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight:'TRUE',
        // startDate: '-0d',
        autoclose: true,
        endDate: new Date(),
    })
</script>

<script>
    function yesnoCheck() {
        if (document.getElementById('yesCheck').checked) {
            document.getElementById('ifYes').style.display = 'block';
        } else
            document.getElementById('ifYes').style.display = 'none';

    }
</script>
<script>
    $(function () {
        $('.drop').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('.drop').fadeIn();
            } else {
                $('.drop').hide();
            }
        });
    });
</script>

<script>
    var room = 1;
    function education_fields(thisVar) {
        $(thisVar).prop("disabled", true);
        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "grouped_entities removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = `<div class="col-sm-2 nopadding">
                                <div class="form-group"> 
                                    <select  id="product" name="product[]" class="form-control product" required>
                                        <option value="">Select Product</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding" style="display:none;">
                                <div class="form-group"> 
                                        <input type="text" class="form-control tp" id="tp" name="tp[]" value="" placeholder="SPB Amount"  >
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group">  
                                    <input type="number" class="form-control spb_amt_sum" id="spb_amt" name="spb_amt[]" value="" placeholder="SPB Amount" required min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group"> 
                                    <input type="number" class="form-control current_biz" id="current_biz" name="current_biz[]" value="" placeholder="Current Biz / Month" required min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-sm-3 nopadding">
                                <div class="form-group">   
                                    <input type="number" class="form-control proj_biz" id="proj_biz" name="proj_biz[]" value="" placeholder="Projected Biz / Month" required min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group"> 
                                    <input type="text" class="form-control tot_proj" id="tot_proj" name="tot_proj[]" value="" readonly placeholder="Total Biz per Month" required>
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group"> 
                                    <div class="input-group"> 
                                        <input type="text" class="form-control tt_coa" id="tt_coa" name="cost_of_activity[]" readonly placeholder="Product COA" required>
                                        <div class="input-group-btn"> 
                                            <button class="btn btn-danger" type="button" onclick="remove_education_fields(` + room + `);"> 
                                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear">
                            </div>`;

        objTo.appendChild(divtest);
        populate_new_product_select(thisVar);
    }
    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
        $(".product").trigger("change");
        $(".spb_amt_sum").trigger("change");
        $(".current_biz").trigger("change");
        $(".proj_biz").trigger("change");
    }
</script>
<!--approved_product -->
<script>
    var room = 1;
    function approved_product(thisVar) {
        $(thisVar).prop("disabled", true);
        room++;
        var objTo = document.getElementById('approved_product')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "grouped_entities removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = `<div class="col-sm-2 nopadding">
                                <div class="form-group"> 
                                    <select  id="product_name" name="product_name[]" class="form-control product_name">
                                        <option value="">Select Product</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding" style="display:none;">
                                <div class="form-group"> 
                                    <input type="text" class="form-control approved_tp" id="approved_tp" name="approved_tp[]" value="" placeholder="SPB Amount"  >
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group"> 
                                    <input type="number" class="form-control spb_value" id="spb_value" name="spb_value[]" value="" placeholder="SPB Value(Rs,)" min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group"> 
                                    <input type="number" class="form-control biz_units_month" id="biz_units_month" name="biz_units_month[]" value="" placeholder="Projected Biz / Month" min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group">  
                                    <input type="text" class="form-control biz_units" id="biz_units" name="biz_units[]" value="" placeholder="Projected Total Biz" readonly>
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group"> 
                                    <input type="number" class="form-control actual_biz_unit" id="actual_biz_unit" name="actual_biz_unit[]" value=""  placeholder="Actual Total Biz Units" min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-sm-1 nopadding">
                                <div class="form-group"> 
                                    <input type="text" class="form-control coa" id="coa" name="coa[]" value="" readonly placeholder="COA" >
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group"> 
                                    <div class="input-group"> 
                                       <input type="text" class="form-control success" id="success" name="success[]" readonly value="" placeholder="COA">
                                        <div class="input-group-btn"> 
                                            <button class="btn btn-danger" type="button" onclick="remove_approved_product(` + room + `);"> 
                                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear">
                            </div>`;

        objTo.appendChild(divtest);
        populate_new_approved_product_select(thisVar);
    }
    function remove_approved_product(rid) {
        $('.removeclass' + rid).remove();
        $(".product_name").trigger("change");
        $(".spb_value").trigger("change");
        $(".biz_units_month").trigger("change");
        $(".biz_units").trigger("change");
    }
</script>

<script type="text/javascript">
  $("select[name='team']").change(function(){
      var item_name = $(this).val();
      //console.log(item_name);
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('fm.show') ?>",
          method: 'POST',
          data: {item_name:item_name, _token:token},
          success: function(data) {
            //console.log(data);
            $(".product").each(function(){
                $(this).find('option').not(':first').remove();
            });
            $.each(data, function(i, item) {
                $('.product').append("<option value='"+item.item_name+"' data-team_code='"+item.team_code+"' data-sale_price='"+item.sale_price+"'>"+item.item_name+"</option>");
            });
          }
      });
  });
  
  function populate_new_product_select(thisVar){
    var item_name = $("select[name='team']").val();
      //console.log(item_name);
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "<?php echo route('fm.show') ?>",
        method: 'POST',
        data: {item_name:item_name, _token:token},
        success: function(data) {
            $.each(data, function(i, item) {
                $('.product').eq($('.product').length - 1).append("<option value='"+item.item_name+"' data-team_code='"+item.team_code+"' data-sale_price='"+item.sale_price+"'>"+item.item_name+"</option>");
            });
            $(thisVar).prop("disabled", false);
        }
    });
  }
  
</script>
  <!--approvedproduct-->
<script>
    //approvedproduct
  $("select[name='team']").change(function(){
      var item_name = $(this).val();
      //console.log(item_name);
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('fm.show') ?>",
          method: 'POST',
          data: {item_name:item_name, _token:token},
          success: function(data) {
            //console.log(data);
            $(".product_name").each(function(){
                $(this).find('option').not(':first').remove();
            });
            $.each(data, function(i, item) {
                $('.product_name').append("<option value='"+item.item_name+"' data-team_code='"+item.team_code+"' data-sale_price='"+item.sale_price+"'>"+item.item_name+"</option>");
            });
          }
      });
  });
  function populate_new_approved_product_select(thisVar){
    var item_name = $("select[name='team']").val();
      //console.log(item_name);
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "<?php echo route('fm.show') ?>",
        method: 'POST',
        data: {item_name:item_name, _token:token},
        success: function(data) {
            $.each(data, function(i, item) {
                $('.product_name').eq($('.product_name').length - 1).append("<option value='"+item.item_name+"' data-team_code='"+item.team_code+"' data-sale_price='"+item.sale_price+"'>"+item.item_name+"</option>");
            });
            $(thisVar).prop("disabled", false);
        }
    });
  }
</script>
<script>
function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}
</script>

<!--dr_detail-->
<!-- <script type="text/javascript"> 
  $("select[name='station']").change(function(){
      var station_name = $(this).val();
      console.log(station_name);
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "",
          method: 'POST',
          data: {station_name:station_name, _token:token},
          success: function(data) {
            //console.log(data);
            $("#dr_detail").each(function(){
                $(this).find('option').remove();
                $('#dr_detail').append("<option value=''>Select Dr Name</option>");
            });
            $.each(data, function(i, item) {
                //console.log(item.dr_name);
                $('#dr_detail').append("<option value='"+item.dr_name+"' data-id='"+item.id+"' data-address='"+item.clinic_name+"'>"+item.dr_name+"</option>");
                 
            });
          }
      });
  }); 
</script> -->
<!--dr_name_Change-->
<script type="text/javascript"> 
 $('#dr_detail').on("change",function(){
    var dr_name = $(this).val();
      console.log(dr_name);
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('fm.dr_name') ?>",
          method: 'POST',
          data: {dr_name:dr_name, _token:token},
          success: function(data) {
            //console.log(data);
            $("#dr_code").each(function(){
                $(this).find('option').remove();
            });
            $.each(data, function(i, item) {
                console.log(item);
                // $('#dr_detail').append("<option value='"+item.dr_name+"' data-address='"+item.clinic_name+"'>"+item.dr_name+"</option>");
                // $('#hospital_name').val(item.clinic_name);
                // $('#dr_address').val(item.address);
                // $('#dr_contact_number').val(item.phone_number);
                $('#dr_code').val(item);
            });
          }
      });
  }); 
</script>

<script type="text/javascript">
$("select[name='dr_designation']").on('change', function(){
      var dr_designations = $(this).val();
      console.log(dr_designations);
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('fm.designation_show') ?>",
          method: 'POST',
          data: {dr_designations:dr_designations, _token:token},
          success: function(data) {
            // console.log(data.specify_specialty);
            $("#DropDownList").each(function(){
                $(this).find('option').remove();
            });
            $.each(data, function(i, item) {
                // $('.specify').append("<option value='"+item.specify_specialty+"' >"+item.specify_specialty+"</option>");
            console.log(item.specify_specialty);
            var x = item.specify_specialty;
            var splitValues = x.split(",");
            for (var i = 0; i < splitValues.length; i++) {
                var opt = document.createElement("option");
               
                // Add an Option object to Drop Down/List Box
               document.getElementById("DropDownList").options.add(opt);
                
                // Assign text and value to Option object
                opt.text = splitValues[i];
                opt.value = splitValues[i];
            }
            });
           
          }
      });
  });
</script> 
<script type="text/javascript">

$(document).ready(function() {

  $(".plus").click(function(){ 

      var lsthmtl = $(".clone").html();

      $(".increment").after(lsthmtl);

  });

  $(".ss").on("click",".rem",function(){ 

      $(this).parents(".hdtuto").remove();

  });

});

</script>
<script type="text/javascript">

$(document).ready(function() {

  $(".retention_plus").click(function(){ 

      var retention_lsthmtl = $(".retention_clone").html();

      $(".retention_increment").after(retention_lsthmtl);

  });

  $(".retention_ss").on("click",".retention_rem",function(){ 

      $(this).parents(".retention_hdtuto").remove();

  });

});

</script>
<script>
function fresh_reapply_Check() {
        if (document.getElementById('fyesCheck').checked) {
            document.getElementById('fifYes').style.display = 'block';
        } else
            document.getElementById('fifYes').style.display = 'none';

    }
</script>
<!--approve product calculation-->
<script>
    $(document).ready(function(){
        $("#date_of_approval, #project_duration").change(function(){
            if($("#date_of_approval").val() != "" && $.trim($("#project_duration").val()) != ""){
                var A = $("#date_of_approval").val();
                var B = parseFloat($("#project_duration").val());
                var datearray = A.split("-");
                var newdate = datearray[2] + '-' + datearray[1] + '-' + datearray[0];
                var CurrentDate = new Date(newdate);
                console.log("Current date:", CurrentDate);
                var projected_date_of_completion = CurrentDate.setMonth(CurrentDate.getMonth() + B)
                var date = new Date(projected_date_of_completion),
                mnth = ("0" + (date.getMonth() + 1)).slice(-2),
                day = ("0" + date.getDate()).slice(-2); 
                $("#projected_date_of_completion").val([ day, mnth, date.getFullYear()].join("-"));
            }
        });
        $("#project_duration").keyup(function(){
            $(".biz_units_month").trigger("change");
        });
         
    });

    $(document).ready(function(){
        $("#date_of_approval, #actual_duration").change(function(){
            if($("#date_of_approval").val() != "" && $.trim($("#actual_duration").val()) != ""){
                var A = $("#date_of_approval").val();
                var D = parseFloat($("#actual_duration").val());
                var datearray = A.split("-");
                var newdate = datearray[2] + '-' + datearray[1] + '-' + datearray[0];
                var CurrentDate = new Date(newdate);
                console.log("Current date:", CurrentDate);
                var actual_duration = CurrentDate.setMonth(CurrentDate.getMonth() + D)
                var date = new Date(actual_duration),
                mnth = ("0" + (date.getMonth() + 1)).slice(-2),
                day = ("0" + date.getDate()).slice(-2); 
                $("#actual_date_of_completion").val([day, mnth, date.getFullYear()].join("-"));
            }
        });
         
    });
    //Main 1st
    //approved_calculations
    $(".main_calculations").delegate( '#total_spb_value, .spb_value', "keyup", function(){
        approved_spb_value();
    }).delegate( '.total_spb_value, .spb_value', "change", function(){
        approved_spb_value();
    });
    function approved_spb_value(){
        var spb_amt_sum = 0;
        $(".spb_value").each(function(){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            spb_amt_sum += parseFloat(current_val);
        });
        $("#total_spb_value").val(addCommas(spb_amt_sum));
        // $("#total_spb_value").val(spb_amt_sum.toFixed(2)); 
    }
    function addCommas(current_val) {
        var parts = current_val.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }
     // Main 2nd
     $(".main_calculations").delegate( '.biz_units_month, .product_name', "keyup", function(){
        current_biz_approved_calculations();
    }).delegate( '.biz_units_month, .product_name', "change", function(){
        current_biz_approved_calculations();
    });
    function current_biz_approved_calculations(){
        var current_biz_TP_sum = 0;
        $(".biz_units_month").each(function(){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            var current_tp = 0;
            if($.trim($(this).closest(".grouped_entities").find(".product_name").children("option:selected").val()) != ""){
                //current_tp = $(this).closest(".grouped_entities").find(".tot_proj").val();
                current_tp = $(this).closest(".grouped_entities").find(".product_name").children("option:selected").attr("data-sale_price");
                //console.log(current_tp+"<--- Current TP");
            }
            //$(this).closest(".grouped_entities").find(".tot_proj").val();
            current_biz_TP_sum += (parseFloat(current_val)*parseFloat(current_tp));
        });
        $("#total_biz_units_month").val(current_biz_TP_sum.toFixed(0));
    }
    //Main 3rd
    $(".main_calculations").delegate('.biz_units_month, .product_name', "keyup", function(){
        project_biz_approved_calculations($(this));
        //project_coa_calculations();
    }).delegate('.biz_units_month, .product_name', "change", function(){
        project_biz_approved_calculations($(this));
       // project_coa_calculations();
    });
    function project_biz_approved_calculations(thisVar){
        // part1
        {
            var X = parseFloat($("#project_duration").val());
            var Y = parseFloat(thisVar.closest(".grouped_entities").find(".biz_units_month").val());
            var TotProj = X*Y;
            if(isNaN(TotProj)){
                TotProj = 0;
            }
            thisVar.closest(".grouped_entities").find(".biz_units").val(TotProj.toFixed(0));
        }
        // part1.1
        var TCA = 0;
        $(".biz_units").each(function(){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            var current_tp = 0;
            if($.trim($(this).closest(".grouped_entities").find(".product_name").children("option:selected").val()) != ""){
                current_tp = $(this).closest(".grouped_entities").find(".product_name").children("option:selected").attr("data-sale_price");
            }
            TCA += (parseFloat(current_val)*parseFloat(current_tp));
        });
        $("#total_biz_units").val(TCA.toFixed(0)); 
        
    }

    // Main 4th
    $(".main_calculations").delegate( '.actual_biz_unit, .product_name', "keyup", function(){
        current_actual_approved_calculations();
    }).delegate( '.actual_biz_unit, .product_name', "change", function(){
        current_actual_approved_calculations();
    });
    function current_actual_approved_calculations(){
        var current_biz_TP_sum = 0;
        $(".actual_biz_unit").each(function(){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            var current_tp = 0;
            if($.trim($(this).closest(".grouped_entities").find(".product_name").children("option:selected").val()) != ""){
                //current_tp = $(this).closest(".grouped_entities").find(".tot_proj").val();
                current_tp = $(this).closest(".grouped_entities").find(".product_name").children("option:selected").attr("data-sale_price");
                //console.log(current_tp+"<--- Current TP");
            }
            //$(this).closest(".grouped_entities").find(".tot_proj").val();
            current_biz_TP_sum += (parseFloat(current_val)*parseFloat(current_tp));
        });
        $("#actual_total_biz_units").val(current_biz_TP_sum.toFixed(0));
        $("#total_spb_value").trigger("change");
    }

    // Main 5th
    $(".main_calculations").delegate( '.spb_value, .actual_biz_unit, .product_name', "keyup", function(){
        COA_calculations();
    }).delegate( '.spb_value, .actual_biz_unit, .product_name', "change", function(){
        COA_calculations();
    });
    function COA_calculations(){ 
        var spb_amt_sum = 0;
        $(".spb_value").each(function(i){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            } 
            var Y = parseFloat($(this).closest(".grouped_entities").find(".actual_biz_unit").val());
            var SUM = parseFloat(current_val);
            
            var current_tp = 0;
            if($.trim($(this).closest(".grouped_entities").find(".product_name").children("option:selected").val()) != ""){
                current_tp = $(this).closest(".grouped_entities").find(".product_name").children("option:selected").attr("data-sale_price");
            }
            // console.log(current_tp);
            var cost_of_activity = ((SUM /(Y*parseFloat(current_tp))) * 100);
            console.log(i + " SUM : " + SUM); 
            console.log(i + " Y : " + Y);
            console.log(i + " current_tp : " + current_tp);
            if(isNaN(cost_of_activity)){
                cost_of_activity = 0;
            }
            // console.log(cost_of_activity);
            $(this).closest(".grouped_entities").find(".coa").val(cost_of_activity.toFixed(0));
            $(this).closest(".grouped_entities").find(".approved_tp").val(current_tp);
            $("#total_spb_value").trigger("change");
            
        });
    }

    // Main 6th
    $(".main_calculations").delegate( '.actual_biz_unit, .biz_units', "keyup", function(){
        success_calculations();
    }).delegate( '.actual_biz_unit, .biz_units', "change", function(){
        success_calculations();
    });
    function success_calculations(){
        // var current_biz_TP_sum = 0;
        $(".actual_biz_unit").each(function(){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            var Y = parseFloat($(this).closest(".grouped_entities").find(".biz_units").val());
            var SUM = parseFloat(Y); 
            var current_biz_TP_sum = parseFloat((current_val/SUM)*100);
            $(this).closest(".grouped_entities").find(".success").val(current_biz_TP_sum.toFixed(1)); 
        });
    }

    // Main 7th
    $(".main_calculations").delegate("#total_spb_value, #actual_total_biz_units,#total_biz_units", "change", function(){
        if($("#total_spb_value").val() != "" && $("#actual_total_biz_units").val() != "" && $("#actual_total_biz_units").val() != 0){
            var SUM = parseFloat($("#total_spb_value").val().replace(/,/g, ''));
            console.log(SUM);
            var TCA = parseFloat($("#actual_total_biz_units").val());
            var t_coa = parseFloat((SUM/TCA)*100);
            $("#total_coa").val(t_coa.toFixed(0));
        }else{
            $("#total_coa").val(0);
        }
        if($("#actual_total_biz_units").val() != "" && $("#total_biz_units").val() != "" && $("#total_biz_units").val() != 0){
            var S = parseFloat($("#actual_total_biz_units").val());
            var T = parseFloat($("#total_biz_units").val());
            var t = parseFloat((S/T)*100);
            $("#total_success").val(t.toFixed(1));
        }else{
            $("#total_success").val(0);
        }
    });
 
     
</script>
<!--unapproved_product -->
<script>
    var room = 1;
    function unapproved_product(thisVar) {
        $(thisVar).prop("disabled", true);
        room++;
        var objTo = document.getElementById('unapproved_product')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "grouped_entities removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = `<div class="col-sm-4 nopadding">
                                <div class="form-group"> 
                                    <select  id="product_names" name="product_names[]" class="form-control product_names">
                                        <option value="">Select Product</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding" style="display:none;">
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control unapproved_tp" id="unapproved_tp" name="unapproved_tp[]" value="" placeholder="SPB Amount" >
                                </div>
                            </div>
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">  
                                    <input type="number" class="form-control total_biz_units" id="total_biz_units" name="total_biz_units[]" value="" placeholder="Total Biz Unit" min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                             
                            <div class="col-sm-4 nopadding">
                                <div class="form-group"> 
                                    <div class="input-group"> 
                                       <input type="text" class="form-control comments" id="comments" name="comments[]"  value="" placeholder="Comments">
                                        <div class="input-group-btn"> 
                                            <button class="btn btn-danger" type="button" onclick="remove_unapproved_product(` + room + `);"> 
                                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear">
                            </div>`;

        objTo.appendChild(divtest);
        populate_new_unapproved_product_select(thisVar);
    }
    function remove_unapproved_product(rid) {
        $('.removeclass' + rid).remove();
        $(".product_names").trigger("change");
        $(".total_biz_units").trigger("change"); 
    }
</script>
 <!--approvedproduct-->
 <script>
    //approvedproduct
  $("select[name='team']").change(function(){
      var item_name = $(this).val();
      //console.log(item_name);
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('fm.show') ?>",
          method: 'POST',
          data: {item_name:item_name, _token:token},
          success: function(data) {
            //console.log(data);
            $(".product_names").each(function(){
                $(this).find('option').not(':first').remove();
            });
            $.each(data, function(i, item) {
                $('.product_names').append("<option value='"+item.item_name+"' data-team_code='"+item.team_code+"' data-sale_price='"+item.sale_price+"'>"+item.item_name+"</option>");
            });
          }
      });
  });
  function populate_new_unapproved_product_select(thisVar){
    var item_name = $("select[name='team']").val();
      //console.log(item_name);
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "<?php echo route('fm.show') ?>",
        method: 'POST',
        data: {item_name:item_name, _token:token},
        success: function(data) {
            $.each(data, function(i, item) {
                $('.product_names').eq($('.product_names').length - 1).append("<option value='"+item.item_name+"' data-team_code='"+item.team_code+"' data-sale_price='"+item.sale_price+"'>"+item.item_name+"</option>");
            });
            $(thisVar).prop("disabled", false);
        }
    });
  }
</script>
<script>
// Main 4th
    $(".main_calculations").delegate( '.total_biz_units, .product_names', "keyup", function(){
        current_actual_unapproved_calculations();
    }).delegate( '.total_biz_units, .product_name', "change", function(){
        current_actual_unapproved_calculations();
    });
    function current_actual_unapproved_calculations(){
        var current_biz_TP_sum = 0;
        $(".total_biz_units").each(function(){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            var current_tp = 0;
            if($.trim($(this).closest(".grouped_entities").find(".product_names").children("option:selected").val()) != ""){
                //current_tp = $(this).closest(".grouped_entities").find(".tot_proj").val();
                current_tp = $(this).closest(".grouped_entities").find(".product_names").children("option:selected").attr("data-sale_price");
                //console.log(current_tp+"<--- Current TP");
            }
            //$(this).closest(".grouped_entities").find(".tot_proj").val();
            current_biz_TP_sum += (parseFloat(current_val)*parseFloat(current_tp));
            $(this).closest(".grouped_entities").find(".unapproved_tp").val(current_tp);
        });
        $("#unapproved_total_biz_units").val(current_biz_TP_sum.toFixed(0)); 
    }
</script>
<!--unapproved Product -->
<script>
 $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
</script>
 
<script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
<script>
$(function () {
    
    //Initialize Select2 Elements
    $('.select2').select2()

   
  })

</script>
<script>
function validate(form) {

    // validation code here ...


    if(!valid) {
        alert('Please correct the errors in the form!');
        return false;
    }
    else {
        return confirm('Do you really want to submit the form?');
    }
}
</script>
<form onsubmit="return validate(this);">
<script>
    $("select[name='dr_name']").change(function(){
      var dr_name = $(this).val();
      console.log(dr_name);
      var checkbox = document.querySelector('input[name="case_catagory"]:checked').value;
      console.log(checkbox);
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('fm.rejected_case_check') ?>",
          method: 'POST',
          data: {dr_name:dr_name, _token:token},
          success: function(data) {
            console.log(data);
            $(".dr_detail").each(function(){
                console.log("ok");
            });
            if(checkbox == 'Fresh'){
                $.each(data, function(i, item) {
                    console.log(item.created_at);
                    var today = new Date(); 
                    var date = today.getMonth()+1+'/'+(today.getDate())+'/'+today.getFullYear();  
                    var case_date = item.created_at;
                    var creation_date = new Array();
                    creation_date= case_date.split(" ");
                    var end_date = creation_date[0];
                    console.log(end_date);
                    var sdt = new Date(end_date);
                    var date1 = sdt.getMonth()+1+'/'+(sdt.getDate())+'/'+sdt.getFullYear();  
                    var a = moment(date1,'M/D/YYYY');
                    var b = moment(date,'M/D/YYYY');
                    var diffDays = b.diff(a, 'days');
                    //alert(diffDays);
                    if(diffDays <= 15){
                        alert('Your cannot create case as new case for this doctor, Please use reapply option to create case');
                    location.reload();
                    }
                    else{
                        console.log("ok");
                    }
                });
            }else{
                  console.log("Reapply Case")
                  }
          }
      });
    });
</script> 
<script>
$('#submit').click(function(e){
    var checkbox = document.querySelector('input[name="case_catagory"]:checked').value
    if(checkbox == 'Reapply'){
        if ( $('#remarks').val() != '')
        {
            // alert('success');
            console.log("Done");
        }
        else
        {
            alert('Remarks are required for reapply');
            return false;
        }
    }else{
        console.log('Fresh Case');
    }
    
});
</script>
<script>
$('#save').click(function(e){
    var checkbox = document.querySelector('input[name="case_catagory"]:checked').value
    if(checkbox == 'Reapply'){
        if ( $('#remarks').val() != '')
        {
            // alert('success');
            console.log("Done");
        }
        else
        {
            alert('Remarks are required for reapply');
            return false;
        }
    }else{
        console.log('Fresh Case');
    }
    
});
</script>
@endsection