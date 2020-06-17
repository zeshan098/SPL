<!DOCTYPE html>
<html>
<head>
<style>
.fields {
            border: 1px solid grey;
            width: 23%;
            white-space:nowrap;
        }
        .fields1 {
            border: 1px solid grey;
            width: 18%;
            white-space:nowrap;
        }
        table, th, td {
            border: 1px solid black;
  border-collapse: collapse;
}
 
</style>
</head>

    <div class="row">
        <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
              <h4 class="box-title">Case ID: {{ $view_case->team }}-{{ $view_case->district }}-{{ $view_case->id }}</h4>
            </div>
            <span class="input-group-addon" style="font-size:13px;">Case Catagory:</span>
            <span>
              <input type="text" class="form-control" size="33" style="font-size:10px;"  value="{{  $view_case->case_catagory }}"   readonly />
            </span>
            @if($view_case->case_catagory == 'Reapply')
            <span class="input-group-addon"  style="font-size:13px;">Remarks:</span>
            <span><input type="text" class="form-control" size="34" style="font-size:10px;" value="{{ $view_case->discription }}" placeholder="Team" readonly /></span>
            @else

            @endif
            <br/>
            <span class="input-group-addon" style="font-size:13px;">Submitted By:</span>
            <span>
            @foreach($fm_name as $fm_name)
               <input type="text" class="form-control" size="20" style="font-size:10px;"  value="{{ $fm_name->name }}"   readonly />
            @endforeach
            </span>
            <span class="input-group-addon"  style="font-size:13px;">Case Genration Date:</span>
            <span><input type="text" class="form-control" size="10" style="font-size:10px;" value="{{ $view_case->created_at->format('d/m/Y') }}" placeholder="Team" readonly /></span>
            <span class="input-group-addon"  style="font-size:13px;">Accompanied By:</span>
            <span><input type="text" class="form-control" size="17" style="font-size:10px;" value="{{ $view_case->accompanied_person_fm}}" placeholder="Team" readonly /></span>
            <br/>
            <span class="input-group-addon"  style="font-size:13px;">Team:</span>
            <span><input type="text" class="form-control" size="15" style="font-size:10px;" value="{{ $view_case->team }}" placeholder="Team" readonly /></span>
            <span class="input-group-addon" style="font-size:13px;">Zone:</span>
            <span><input type="text" class="form-control" size="16"  style="font-size:10px;" value="{{ $view_case->zone }}" placeholder="Zone" readonly /></span>
            <span class="input-group-addon" style="font-size:13px;">District:</span>
            <span><input type="text" class="form-control" size="16" style="font-size:10px;" value="{{ $view_case->district }}" placeholder="District" readonly /></span>
            <span class="input-group-addon" style="font-size:13px;">Station:</span>
            <span><input type="text" class="form-control" size="16" style="font-size:10px;" value="{{ $view_case->station }}" placeholder="District" readonly /></span>
             <div class="7th">
                <!-- <span class="input-group-addon">YTD SPB Success Rate (%):</span> -->
                <!-- <span><input type="text" class="form-control" value="{{ $view_case->ytd_spb_rate }}" placeholder="Dr Name" readonly /></span> -->
                <span class="input-group-addon" style="font-size:12px;">YTD Sale:</span>
                <span><input type="text" style="text-align:right; font-size:10px;" class="form-control" size="6" value="{{ $view_case->ytd_sale }}" placeholder="Hospital Name" readonly /></span>
                <span class="input-group-addon" style="font-size:12px;">YTD SPB C.Y:</span>
                <span><input type="text" style="text-align:right; font-size:10px;" class="form-control" size="9" value="{{ $view_case->ytd_spb_c_y }}" placeholder="Designation" readonly /></span>
                <span class="input-group-addon" style="font-size:12px;">YTD SPB Ratio:</span>
                <span><input type="text" style="text-align:right; font-size:10px;" class="form-control" size="6" value="{{ $view_case->ytd_ratio }}" placeholder="Designation" readonly /></span>
                <span class="input-group-addon" style="font-size:12px;">Last Visit Date:</span>
                <span><input type="text" class="form-control" style="font-size:10px;" size="21" value="{{ date('d/m/Y', strtotime($view_case->last_visit_date)) }}" placeholder="Hospital Name" readonly /></span>
            </div>
             <hr>
             <div class="2nd">
                <span class="input-group-addon" style="font-size:12px;">Dr:</span>
                <span><input type="text" class="form-control" style="font-size:10px;" size="18" value="{{ $view_case->dr_name }}" placeholder="Dr Name" readonly /></span>
                <span class="input-group-addon" style="font-size:12px;">Hospital:</span>
                <span><input type="text" class="form-control" style="font-size:10px;" size="27"  value="{{ $view_case->hospital_name }}" placeholder="Hospital Name" readonly /></span>
                <span class="input-group-addon" style="font-size:12px;">Monitoring Pharmacy(ies):</span>
                <span><input type="text" class="form-control" style="font-size:10px;" size="18"  value="{{ $view_case->pharmacy_name }}" placeholder="Designation" readonly /></span>
                
            </div>  
            <div class="15">
               <span class="input-group-addon" style="font-size:12px;">Qualification:</span>
                @foreach($qualification as $qualification)
                <span><input type="text" class="form-control" style="font-size:10px;" size="10"  value="{{ $qualification->designation }}" placeholder="Designation" readonly /></span> 
                @endforeach
                <span class="input-group-addon" style="font-size:12px;">Contact:</span>
                <span><input type="text" class="form-control" style="font-size:10px;" size="12" value="{{ $view_case->dr_contact_number }}" placeholder="Hospital Name" readonly /></span>
                <span class="input-group-addon" style="font-size:12px;">Address:</span>
                <span><input type="text" class="form-control" size="48" style="font-size:10px;" value="{{ $view_case->dr_address }}" placeholder="Dr Name" readonly /></span>
            </div>
            <div class="3rd">
               
                
                
                <!-- <span class="input-group-addon" style="font-size:12px;">GP/MO/Consultant:</span>
                <span><input type="text" class="form-control" style="font-size:10px;" size="10" value="{{ $view_case->salutation }}" placeholder="Dr Name" readonly /></span> -->
                <span class="input-group-addon" style="font-size:12px;">Designation:</span>
                <span><input type="text" class="form-control" style="font-size:10px;" size="15"  value="{{ $view_case->dr_designation }}" placeholder="Designation" readonly /></span> 
                <span class="input-group-addon" style="font-size:12px;">Specialty:</span>
                <span><input type="text" class="form-control" style="font-size:10px;" size="25" value="{{ $view_case->salutation_specify }}" placeholder="Hospital Name" readonly /></span>
                <span class="input-group-addon" style="font-size:12px;">Practice Type:</span>
                <span><input type="text" class="form-control" style="font-size:10px;" size="15" value="{{ $view_case->ppb }}" placeholder="Dr Name" readonly /></span>
                 
            </div>   
            <div class="3rd">
                
                
            </div> 
            
            <hr>
            <div style=""> 
            <h5 style="margin-top:-1px"></h5>
                 <div style =  "margin-top:-15px">  
                    <span class="input-group-addon"style="font-size:12px;">Retention Detail:</span>
                    @if($view_case->case_type == 'new')
                    <span><input type="text" class="form-control" style="font-size:10px;" size="90" value="{{ $view_case->case_type }}" placeholder="Dr Name" readonly /></span>
                    @else
                    <span><input type="text" class="form-control" style="font-size:10px;" size="90" value="Please Check 2nd Page" placeholder="Dr Name" readonly /></span>
                    @endif
                 </div>
            </div>
            <br />  
            <div class="6th" style =  "margin-top:-15px">
                <span class="input-group-addon" style="font-size:12px;">Activity Name:</span>
                <span><input type="text" class="form-control"  style=" font-size:10px;" size="75" value="{{ $view_case->activity_name }}" placeholder="Dr Name" readonly /></span>
                <span class="input-group-addon" style="font-size:12px;">Duration:</span>
                <span><input type="text" style="text-align:right; font-size:10px;" class="form-control" size="5" value="{{ $view_case->duration_month }}" placeholder="Designation" readonly /></span>          
            <br />   
            <span class="input-group-addon" style="font-size:12px;">Payment Person:</span>
                <span><input type="text" class="form-control" size="74"  style=" font-size:10px;" value="{{ $view_case->payment_person }}" placeholder="Designation" readonly /></span>
            <span class="input-group-addon" style="font-size:12px;">Total COA:</span>
                <span><input type="text" style="text-align:right; font-size:10px;" class="form-control" size="3" value="{{ $view_case->t_coa }}" placeholder="YTD SPB Ratio" readonly /></span>
                
            </div>  
            
           
            <br />
                
                
            <div class="box">
                <div class="box-header" style =  "margin-top:-15px">
                            <!-- <h3 class="box-title">Activity Lists</h3> -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive" style =  "margin-top:-15px; margin-bottom: 5px">
                        <!--<div class="box-body table-responsive no-padding">-->
                            <table id="users_list" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="font-size:12px;">Product</th>
                                        <th style="font-size:12px;">SPB Amount</th>
                                        <th style="font-size:12px;">Current Biz</th>
                                        <th style="font-size:12px;">Proj Biz</th>
                                        <th style="font-size:12px;">Tot Proj</th>
                                        <th style="font-size:12px;">Cost of Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($view_case_product as $case_product)
                                <tr>
                                    
                                    <td style="font-size:11px;  width:160px">{{ $case_product->product }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $case_product->spb_amt }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $case_product->current_biz }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $case_product->proj_biz }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $case_product->tot_proj }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $case_product->cost_of_activity }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th style="font-size:12px;">Product</th>
                                        <th style="font-size:12px;">SPB Amt</th>
                                        <th style="font-size:12px;">Current Biz</th>
                                        <th style="font-size:12px;">Proj Biz</th>
                                        <th style="font-size:12px;">Tot Proj</th>
                                        <th style="font-size:12px;">Cost of Activity</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                        <!-- /.box-body -->
                </div>
                <!--end 12th row --> 
                <div class="10th">
                <span class="input-group-addon" style="font-size:12px;">Total Value:</span>
                <span style="position:absolute; left:153px"><input type="text" style="text-align:right; font-size:12px;" class="form-control" size="10" value="{{ $view_case->spb_sum }}" placeholder="Designation" readonly /></span>
                
                <!-- <span class="input-group-addon">Current Biz:</span> -->
                <span style="position:absolute; left:275px"><input type="text" style="text-align:right; font-size:12px;" class="form-control" size="10" value="{{ $view_case->current_biz_sum }}" placeholder="YTD SPB Ratio" readonly /></span>
                <!-- <span class="input-group-addon">Proj Biz:</span> -->
                <span style="position:absolute; left:390px"><input type="text" style="text-align:right; font-size:12px;" class="form-control" size="10" value="{{ $view_case->proj_biz_sum }}" placeholder="Designation" readonly /></span>
                
                <!-- <span class="input-group-addon">Tot Proj:</span> -->
                <span style="position:absolute; left:500px"><input type="text" class="form-control" size="10" style="text-align:right; font-size:12px;" value="{{ $view_case->tot_proj_sum }}" placeholder="YTD SPB Ratio" readonly /></span>
            </div>
            <hr> 
            <div class="12th">
                <span class="input-group-addon" style="font-size:12px;">ZM Remarks:</span>
                <span><input type="text" class="form-control" style="font-size:12px;" size="78" value="{{ $view_case->zm_remarks }}" placeholder="Designation" readonly /></span>
                
                
            </div>
            <div class="7th">
                <span class="input-group-addon" style="font-size:12px;">Retention Busniess Value Verified by ZM:</span>
                <span><input type="text" style="; font-size:12px;" class="form-control" size="12" value="{{ $view_case->verified_zm }}" placeholder="Hospital Name" readonly /></span>
                <span class="input-group-addon" style="font-size:12px;">Visited / Not Visited:</span>
                <span><input type="text" style="; font-size:12px;" class="form-control" size="6" value="{{ $view_case->zm_visit_no_visit }}" placeholder="Hospital Name" readonly /></span>
                <span class="input-group-addon" style="font-size:12px;">Last Visit Date:</span>
                <span><input type="text" style=" font-size:12px;" class="form-control" size="13" value="{{ $view_case->zm_last_visit_date ? date('d/m/Y', strtotime($view_case->zm_last_visit_date)) : '' }}" placeholder="Hospital Name" readonly /></span>
                
                <br/>
                <!-- <span class="input-group-addon">YTD SPB Success Rate (%):</span> -->
                <!-- <span><input type="text" class="form-control" value="{{ $view_case->ytd_spb_rate }}" placeholder="Dr Name" readonly /></span> -->
               
                <span class="input-group-addon" style="font-size:12px;">Name:</span>
                <span>
                @foreach($zm_name as $zm_name)
                  <input type="text"  class="form-control" style="font-size:12px;" size="25" value="{{ $zm_name->name }}" placeholder="Designation" readonly /></span>
                @endforeach
               
                <span class="input-group-addon" style="font-size:12px;">Status:</span>
                <span>
                       @if($view_case->is_rejected_zm == 3)
                        <input type="text" style="font-size:12px;" class="form-control" size="10" value="Returned" placeholder="Designation" readonly />
                        @elseif($view_case->is_approved_zm != 0)
                        <input type="text" style="font-size:12px;" class="form-control" size="10" value="Approved" placeholder="Designation" readonly />
                        @elseif($view_case->is_rejected_zm != 0)
                        <input type="text" style="font-size:12px;" class="form-control" size="10" value="Rejected" placeholder="Designation" readonly />
                        @else
                        <input type="text" style="font-size:12px;" class="form-control" size="10" value="" placeholder="Designation" readonly />
                        @endif
                </span>
                <span class="input-group-addon" style="font-size:12px;">ZM Approval Date:</span>
                <span><input type="text" style= "font-size:12px;" class="form-control" size="25" value="{{ $view_case->zm_approved_date ? date('d/m/Y', strtotime($view_case->zm_approved_date)) : '' }}" placeholder="Hospital Name" readonly /></span>
                
            </div>
                
                <hr>
                <div class="13th">
                    <span class="input-group-addon" style="font-size:12px;">NSM Remarks:</span>
                    <span><input type="text" class="form-control" size="48" style="font-size:12px;" value="{{ $view_case->nsm_remarks }}" placeholder="Designation" readonly /></span>
                    <span class="input-group-addon" style="font-size:12px;">Last Visit Date:</span>
                    <span><input type="text" style="font-size:12px;" class="form-control" size="25" value="{{ $view_case->nsm_last_visit_date ? date('d/m/Y', strtotime($view_case->nsm_last_visit_date)) : '' }}" placeholder="Hospital Name" readonly /></span>
                                 
                </div>
           
                <div class="7th">
                    <!-- <span class="input-group-addon">YTD SPB Success Rate (%):</span> -->
                    <!-- <span><input type="text" class="form-control" value="{{ $view_case->ytd_spb_rate }}" placeholder="Dr Name" readonly /></span> -->
                    
                    
                    <span class="input-group-addon" style="font-size:12px;">Name:</span>
                    @foreach($nsm_name as $nsm_name)
                      <input type="text"  class="form-control" style="font-size:12px;" size="19" value="{{ $nsm_name->name }}" placeholder="Designation" readonly /></span>
                    @endforeach
                    <span class="input-group-addon" style="font-size:12px;">Status:</span>
                    <span>
                        @if($view_case->is_approved_nsm != 0)
                        <input type="text" style="font-size:12px;" class="form-control" size="19" value="Approved" placeholder="Designation" readonly />
                        @elseif($view_case->is_rejected_nsm != 0)
                        <input type="text" style="font-size:12px;" class="form-control" size="19" value="Rejected" placeholder="Designation" readonly />
                        @else
                        <input type="text" style="font-size:12px;" class="form-control" size="19" value="" placeholder="Designation" readonly />
                        @endif
                    </span>
                    <span class="input-group-addon" style="font-size:12px;">NSM Approval Date:</span>
                    <span><input type="text" style=" font-size:12px;" class="form-control" size="18" value="{{ $view_case->nsm_last_visit_date ? date('d/m/Y', strtotime($view_case->nsm_approved_date)) : '' }}" placeholder="Hospital Name" readonly /></span>
                
                
                </div> 
                <!-- <div class="13th">
                    <span class="input-group-addon" style="font-size:12px;">PM Remarks:</span>
                    <span><input type="text" class="form-control" size="78" style="font-size:12px;" value="{{ $view_case->pm_remarks }}" placeholder="Designation" readonly /></span>
                </div>
           
                <div class="7th">
                    <!-- <span class="input-group-addon">YTD SPB Success Rate (%):</span> -->
                    <!-- <span><input type="text" class="form-control" value="{{ $view_case->ytd_spb_rate }}" placeholder="Dr Name" readonly /></span> -->
                    <!-- <span class="input-group-addon" style="font-size:12px;">Last Visit Date:</span>
                    <span><input type="text" style="font-size:12px;" class="form-control" size="16" value="{{ $view_case->pm_last_visit_date }}" placeholder="Hospital Name" readonly /></span>
                    <span class="input-group-addon" style="font-size:12px;">Name:</span>
                    @foreach($pm_name as $pm_name)
                      <input type="text"  class="form-control" style="font-size:12px;" size="30" value="{{ $pm_name->name }}" placeholder="Designation" readonly /></span>
                    @endforeach
                    <span class="input-group-addon" style="font-size:12px;">Status:</span>
                    <span><input type="text"style="font-size:12px;" class="form-control" size="12" value="" placeholder="Designation" readonly /></span> -->
                
                <!-- </div>  --> 
                <hr>
            </div>
            @if($view_case->is_rejected_pm != 0)
            <div class="12th">
                <span class="input-group-addon" style="font-size:12px;">PM Remarks:</span>
                <span><input type="text" class="form-control" style="font-size:12px;" size="78" value="{{ $view_case->pm_remarks }}" placeholder="Designation" readonly /></span>
                
            </div>
            <hr> 
            @endif 
            <div class="13th">
            <div style="border:1px solid black; padding:10px; margin-bottom:3px;">
              <div style="position:relative;left:1px; margin-bottom:3px;font-size:13px;font-weight:bold;" class="input-group-addon" >NS&MM:</div>
               <hr>
              <br/>
              <hr>
                <!-- <span style="position:absolute; font-size:12px;" class="input-group-addon">Reject:</span> -->

                <!-- <span style="position:absolute; left:60px;"><input style="font-size: x-medium;" type="checkbox"  name="vehicle1" value="Reject"></span> -->
                <!-- <span style="position:absolute;left:325px; font-size:12px;" class="input-group-addon" >Deffered:</span> -->

                <!-- <span style="position:absolute;left:385px;"><input type="checkbox" style="font-size: x-medium" name="vehicle1" value="Reject"></span> -->
                <!-- <span style="position:absolute;left:550px;font-size:12px;"class="input-group-addon" >Approved:</span> -->

                <!-- <span style="position:absolute;left:617px;"><input type="checkbox" style="font-size: x-medium;" name="vehicle1" value="Reject"></span> -->
                 <!-- <br/> -->
                <!-- <span class="input-group-addon" style="font-size:12px;">Amount:</span> -->
                <!-- <span><input type="text" class="form-control fields"  readonly /></span> -->
                <!-- <span class="input-group-addon" style="position:absolute;left:322px;font-size:12px;">Signature:</span> -->
                <!-- <span style="position:absolute;left:350px;"><input type="text" class="form-control"  readonly /></span> -->
                
                <!-- <span class="input-group-addon" style="position:absolute;left:545px;font-size:12px;">Date:</span> -->
                <!-- <span style="position:absolute;left:455px;"><input type="text" class="form-control fields" readonly /></span> -->
                
             </div>
            </div>
            <div class="14th">
            <div style="border:1px solid black; padding:10px; margin-bottom:3px;">
              <div style="position:relative;left:1px; margin-bottom:3px;font-size:13px;;font-weight:bold;" class="input-group-addon">DIRECTOR:</div>
                <span style="position:absolute;font-size:12px;" class="input-group-addon">Reject:</span>

                <span style="position:absolute; left:60px;"><input type="checkbox" style="font-size: x-medium;"  name="vehicle1" value="Reject"></span>
                <span style="position:absolute;left:325px;font-size:12px;" class="input-group-addon">Deffered:</span>

                <span style="position:absolute;left:385px;"><input type="checkbox"  style="font-size: x-medium;" name="vehicle1" value="Reject"></span>
                <span style="position:absolute;left:550px;font-size:12px;" class="input-group-addon">Approved:</span>

                <span style="position:absolute;left:617px;"><input type="checkbox" style="font-size: x-medium;" name="vehicle1" value="Reject"></span>
                 <br/> <br/>
                <span class="input-group-addon" style="font-size:12px;">Amount:</span>
                <!-- <span><input type="text" class="form-control fields"  readonly /></span> -->
                <span class="input-group-addon" style="position:absolute;left:322px;font-size:12px;">Signature:</span>
                <!-- <span style="position:absolute;left:350px;"><input type="text" class="form-control"  readonly /></span> -->
                
                <span class="input-group-addon" style="position:absolute;left:545px;font-size:12px;">Date:</span>
                <!-- <span style="position:absolute;left:455px;"><input type="text" class="form-control fields" readonly /></span> -->
                
             </div>
            </div>   
               
                
              </div>
              <!-- /.box-body -->
              
            </div>
          </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
<!-- </section> -->
<!-- /.content -->
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br /> 
 
<div class="5th">
    <div style="">
    @if($view_case->case_type == 'retention')
        <div style="margin-left:20px; margin-top:5px">
            <h5>Rentention Case Details (In case of Retention)</h5>
            <div style="margin-top:-15px">
               
                 @foreach($retention as $retention) 
                 @if($retention->project_duration != null)
                <h5 style="margin-top:5px">Approved Products</h5>
                <div style="margin-top:-20px">
                    <span class="input-group-addon" style="font-size:12px; margin-top:-5px">Date Of Approval:</span>
                    <span><input type="text" class="form-control" style="font-size:10px;" size="10" value="{{ date('d/m/Y', strtotime($retention->date_of_approval)) }}" placeholder="Dr Name" readonly /></span>
                    <span class="input-group-addon" style="font-size:12px; margin-top:-5px">Product Duration(Months):</span>
                    <span><input type="text" class="form-control" style="font-size:10px;" size="10"  value="{{ $retention->project_duration }}" placeholder="Hospital Name" readonly /></span>
                    <span class="input-group-addon" style="font-size:12px; margin-top:-5px">Projected Date of Completion:</span>
                    <span><input type="text" class="form-control" style="font-size:10px;" size="11"  value="{{date('d/m/Y', strtotime($retention->projected_date_of_completion)) }}" placeholder="Designation" readonly /></span>
                    <br/>
                    <span class="input-group-addon" style="font-size:13px;">Actual Duration(Months):</span>
                    <span><input type="text" class="form-control" size="25" style="font-size:10px;" value="{{ $retention->actual_duration }}" placeholder="Team" readonly /></span>
                    <span class="input-group-addon" style="font-size:13px;">Actual Date Of Completion:</span>
                    <span><input type="text" class="form-control" size="25" style="font-size:10px;" value="{{ date('d/m/Y', strtotime($retention->actual_date_of_completion)) }}" placeholder="Team" readonly /></span>
                </div>
                <br/>
                <div class="box">
                    <div class="box-header" style="margin-top:-15px">
                        <!-- <h3 class="box-title">Activity Lists</h3> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="margin-top:-15px; margin-bottom: 5px">
                        <!--<div class="box-body table-responsive no-padding">-->
                        <table id="users_list" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="font-size:12px;">Product</th>
                                    <th style="font-size:12px;">SPB Value(Rs,)</th>
                                    <th style="font-size:12px;">Projected Biz / Month</th>
                                    <th style="font-size:12px;">Project Total Biz</th>
                                    <th style="font-size:12px;">Actual Total Biz Units</th>
                                    <th style="font-size:12px;">Cost of Activity</th>
                                    <th style="font-size:12px;">Success %age</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($approved_product as $approved_product)
                                <tr>

                                    <td style="font-size:11px;  width:160px">{{ $approved_product->product_name }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $approved_product->spb_value }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $approved_product->biz_units_month }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $approved_product->biz_units }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $approved_product->actual_biz_unit }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $approved_product->coa }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $approved_product->success }}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!--end 12th row -->
                <div class="10th">
                    <span class="input-group-addon" style="font-size:12px;">Total Value:</span>
                    <span style="position:absolute; left:150px"><input type="text" style="text-align:right; font-size:12px;" class="form-control" size="5" value="{{ $retention->total_spb_value }}" placeholder="Designation" readonly /></span>

                    <!-- <span class="input-group-addon">Current Biz:</span> -->
                    <span style="position:absolute; left:240px"><input type="text" style="text-align:right; font-size:12px;" class="form-control" size="5" value="{{ $retention->total_biz_units_month }}" placeholder="YTD SPB Ratio" readonly /></span>
                    <!-- <span class="input-group-addon">Proj Biz:</span> -->
                    <span style="position:absolute; left:319px"><input type="text" style="text-align:right; font-size:12px;" class="form-control" size="5" value="{{ $retention->pro_total_biz_units }}" placeholder="Designation" readonly /></span>

                    <!-- <span class="input-group-addon">Tot Proj:</span> -->
                    <span style="position:absolute; left:400px"><input type="text" class="form-control" size="5" style="text-align:right; font-size:12px;" value="{{ $retention->actual_total_biz_units }}" placeholder="YTD SPB Ratio" readonly /></span>
                    <span style="position:absolute; left:485px"><input type="text" class="form-control" size="5" style="text-align:right; font-size:12px;" value="{{ $retention->total_coa }}" placeholder="YTD SPB Ratio" readonly /></span>
                    <span style="position:absolute; left:570px"><input type="text" class="form-control" size="5" style="text-align:right; font-size:12px;" value="{{ $retention->total_success }}" placeholder="YTD SPB Ratio" readonly /></span>
                </div>
                @endif @endforeach
                <h5 style="margin-top:5px">Unapproved Products</h5>
                <div class="box">
                    <div class="box-header" style="margin-top:-15px">
                        <!-- <h3 class="box-title">Activity Lists</h3> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="margin-top:-15px; margin-bottom: 5px">
                        <!--<div class="box-body table-responsive no-padding">-->
                        <table id="users_list" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="font-size:12px;">Product</th>
                                    <th style="font-size:12px;">Total Biz Unit</th>
                                    <th style="font-size:12px;">Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($unapproved_product as $unapproved_product)
                                <tr>

                                    <td style="font-size:11px;  width:160px">{{ $unapproved_product->product_name }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $unapproved_product->total_biz_units }}</td>
                                    <td style="text-align:left; font-size:13px;">{{ $unapproved_product->comments }}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!--end 12th row -->
                <div class="10th">
                    <span class="input-group-addon" style="font-size:12px;">Total Value:</span>
                    <span style="position:absolute; left:120px"><input type="text" style="text-align:right; font-size:12px;" class="form-control" size="28" value="{{ $retention->unapproved_total_biz_units }}" placeholder="Designation" readonly /></span>

                </div>
                @endif

                <br />

            </div>
        </div>
    </div>
</div>



</body>
</html>