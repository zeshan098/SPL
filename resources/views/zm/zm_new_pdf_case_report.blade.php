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
              <h3 class="box-title">Case ID: {{ $view_case->team }}-{{ $view_case->district }}-{{ $view_case->id }}</h3>
            </div>
            <span class="input-group-addon">Submitted By:</span>
            <span>
            @foreach($fm_name as $fm_name)
               <input type="text" class="form-control" size="55" value="{{ $fm_name->name }}"   readonly />
            @endforeach
            </span>
            <span class="input-group-addon">Team:</span>
            <span><input type="text" class="form-control" size="14" value="{{ $view_case->team }}" placeholder="Team" readonly /></span>
            <span class="input-group-addon">Zone:</span>
            <span><input type="text" class="form-control" size="14" value="{{ $view_case->zone }}" placeholder="Zone" readonly /></span>
            <span class="input-group-addon">District:</span>
            <span><input type="text" class="form-control" size="14" value="{{ $view_case->district }}" placeholder="District" readonly /></span>
            <div class="7th">
                <!-- <span class="input-group-addon">YTD SPB Success Rate (%):</span> -->
                <!-- <span><input type="text" class="form-control" value="{{ $view_case->ytd_spb_rate }}" placeholder="Dr Name" readonly /></span> -->
                <span class="input-group-addon" >YTD Sale:</span>
                <span><input type="text" style="text-align:right;" class="form-control" size="9" value="{{ $view_case->ytd_sale }}" placeholder="Hospital Name" readonly /></span>
                <span class="input-group-addon">YTD SPB C.Y:</span>
                <span><input type="text" style="text-align:right;" class="form-control" size="9" value="{{ $view_case->ytd_spb_c_y }}" placeholder="Designation" readonly /></span>
                <span class="input-group-addon">YTD SPB Ratio:</span>
                <span><input type="text" style="text-align:right;" class="form-control" size="9" value="{{ $view_case->ytd_ratio }}" placeholder="Designation" readonly /></span>
               
            </div> 
             <hr>
             <div class="2nd">
                <span class="input-group-addon">Dr:</span>
                <span><input type="text" class="form-control" size="12" value="{{ $view_case->dr_name }}" placeholder="Dr Name" readonly /></span>
                <span class="input-group-addon">Hospital Name:</span>
                <span><input type="text" class="form-control" size="12"  value="{{ $view_case->hospital_name }}" placeholder="Hospital Name" readonly /></span>
                <span class="input-group-addon">Pharmacy:</span>
                <span><input type="text" class="form-control" size="12"  value="{{ $view_case->pharmacy_name }}" placeholder="Designation" readonly /></span>
            </div>  
            <div class="3rd">
               <span class="input-group-addon">Designation:</span>
                <span><input type="text" class="form-control" size="12"  value="{{ $view_case->dr_designation }}" placeholder="Designation" readonly /></span>
                <span class="input-group-addon">Address:</span>
                <span><input type="text" class="form-control" size="11" value="{{ $view_case->dr_address }}" placeholder="Dr Name" readonly /></span>
                <span class="input-group-addon">Contact No:</span>
                <span><input type="text" class="form-control" size="11" value="{{ $view_case->dr_contact_number }}" placeholder="Hospital Name" readonly /></span>
                
            </div>  
            <div class="3rd">
                <span class="input-group-addon">GP / MO / Consultant:</span>
                <span><input type="text" class="form-control" size="17" value="{{ $view_case->salutation }}" placeholder="Dr Name" readonly /></span>
                <span class="input-group-addon">Specify Specialty:</span>
                <span><input type="text" class="form-control" size="11" value="{{ $view_case->salutation_specify }}" placeholder="Hospital Name" readonly /></span>
                
            </div> 
            <div class="4th">
                <span class="input-group-addon">Precriber / Purchaser / Both:</span>
                <span><input type="text" class="form-control" size="11" value="{{ $view_case->ppb }}" placeholder="Dr Name" readonly /></span>
                <span class="input-group-addon">Last Visit Date:</span>
                <span><input type="text" class="form-control" size="20" value="{{ $view_case->last_visit_date }}" placeholder="Hospital Name" readonly /></span>
                
            </div> 
            <hr> 
            <!-- <div class="5th">
              <div style="border:1px solid black">
              <div style = "margin-left:20px; margin-top:-20px">
                <h3>Rentention Case Details (In case of Retention)</h3>
                 <div style =  "margin-top:-15px">  
                    <span class="input-group-addon">New Case / Retention:</span>
                    <span><input type="text" class="form-control" value="{{ $view_case->case_type }}" placeholder="Dr Name" readonly /></span>
                     
                    <span class="input-group-addon">Committed Biz:</span>
                    <span><input type="text" class="form-control fields1" value="{{ $view_case->committed_biz }}" placeholder="Committed Biz" readonly /></span>
                    <br />
                    <span class="input-group-addon">Actual Biz</span>
                    <span><input type="text" class="form-control fields1" value="{{ $view_case->actual_biz }}" placeholder="Actual Biz" readonly /></span>
                    <span class="input-group-addon">SPB Amt</span>
                    <span><input type="text" class="form-control fields1"  value="{{ $view_case->spb_amt }}" placeholder="SPB Amt" readonly /></span>
                    <br />
                    <span class="input-group-addon">Committed Time (Mth):</span>
                    <span><input type="text" class="form-control fields" value="{{ $view_case->committed_time }}" placeholder="Committed Biz" readonly /></span>
                    <span class="input-group-addon">Actual Time</span>
                    <span><input type="text" class="form-control fields" value="{{ $view_case->actual_time }}" placeholder="Actual Biz" readonly /></span>
                    <br />
                    <span class="input-group-addon">Cost of Activity (%):</span>
                    <span><input type="text" class="form-control fields" value="{{ $view_case->coa }}" placeholder="Committed Biz" readonly /></span>
                    <span class="input-group-addon">Success (%)</span>
                    <span><input type="text" class="form-control fields" value="{{ $view_case->success }}" placeholder="Actual Biz" readonly /></span>
                   </div> 
                </div>
              </div>
            </div>  -->
            <br/>
            <div class="6th" style =  "margin-top:-15px">
                <span class="input-group-addon">Activity Name:</span>
                <span><input type="text" class="form-control" size="54" value="{{ $view_case->activity_name }}" placeholder="Dr Name" readonly /></span>
            </div> 
            
            <div class="9th">
            <span class="input-group-addon">Duration (Months):</span>
                <span><input type="text" style="text-align:right;" class="form-control" size="16" value="{{ $view_case->duration_month }}" placeholder="Designation" readonly /></span>
                
                <span class="input-group-addon">Total Cost of Activity:</span>
                <span><input type="text" style="text-align:right;" class="form-control" size="16" value="{{ $view_case->t_coa }}" placeholder="YTD SPB Ratio" readonly /></span>
                
            </div> 
            <br/>
            <!-- <div class="91th">
            <span class="input-group-addon">Payment Person:</span>
                <span><input type="text" class="form-control" size="53" value="{{ $view_case->payment_person }}" placeholder="Designation" readonly /></span>
            </div> -->
                
                
                
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
                                        <th>Product</th>
                                        <th>SPB Amt</th>
                                        <th>Current Biz</th>
                                        <th>Proj Biz</th>
                                        <th>Tot Proj</th>
                                        <th>Cost of Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($view_case_product as $case_product)
                                <tr>
                                    
                                    <td style="font-size:11px; width:160px">{{ $case_product->product }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $case_product->spb_amt }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $case_product->current_biz }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $case_product->proj_biz }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $case_product->tot_proj }}</td>
                                    <td style="text-align:right; font-size:13px;">{{ $case_product->cost_of_activity }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Product</th>
                                        <th>SPB Amt</th>
                                        <th>Current Biz</th>
                                        <th>Proj Biz</th>
                                        <th>Tot Proj</th>
                                        <th>Cost of Activity</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                </div>
                <!--end 12th row --> 
                <div class="10th">
                <span class="input-group-addon">Total Value:</span>
                <span style="position:absolute; left:170px"><input type="text" style="text-align:right; font-size:10px;" class="form-control" size="10" value="{{ $view_case->spb_sum }}" placeholder="Designation" readonly /></span>
                
                <!-- <span class="input-group-addon">Current Biz:</span> -->
                <span style="position:absolute; left:280px"><input type="text" style="text-align:right; font-size:10px;" class="form-control" size="12" value="{{ $view_case->current_biz_sum }}" placeholder="YTD SPB Ratio" readonly /></span>
                <!-- <span class="input-group-addon">Proj Biz:</span> -->
                <span style="position:absolute; left:390px"><input type="text" style="text-align:right; font-size:10px;" class="form-control" size="9" value="{{ $view_case->proj_biz_sum }}" placeholder="Designation" readonly /></span>
                
                <!-- <span class="input-group-addon">Tot Proj:</span> -->
                <span style="position:absolute; left:500px"><input type="text" class="form-control" size="10" style="text-align:right; font-size:10px;" value="{{ $view_case->tot_proj_sum }}" placeholder="YTD SPB Ratio" readonly /></span>
            </div>
            <br />
            <hr>  
            <div class="12th">
                <span class="input-group-addon">ZM Remarks:</span>
                <span><input type="text" class="form-control" size="56" value="{{ $view_case->zm_remarks }}" placeholder="Designation" readonly /></span>
                <br />
                <br />
            </div>
            <div class="7th">
                <!-- <span class="input-group-addon">YTD SPB Success Rate (%):</span> -->
                <!-- <span><input type="text" class="form-control" value="{{ $view_case->ytd_spb_rate }}" placeholder="Dr Name" readonly /></span> -->
                <span class="input-group-addon" >Last Visit Date:</span>
                <span><input type="text" style="text-align:right;" class="form-control" size="11" value="{{ $view_case->zm_last_visit_date }}" placeholder="Hospital Name" readonly /></span>
                <span class="input-group-addon">Name:</span>
                <span>
                @foreach($zm_name as $zm_name)
                  <input type="text" style="" class="form-control" size="15" value="{{ $zm_name->name }}" placeholder="Designation" readonly /></span>
                @endforeach
                <span class="input-group-addon">Status:</span>
                <span><input type="text" style="text-align:right;" class="form-control" size="10" value="" placeholder="Designation" readonly /></span>
               
            </div>
                <hr>
            </div> 
            <div class="12th">
            <span class="input-group-addon">NSM Remarks: {{ $view_case->nsm_remarks }}</span>
                
                <br />
            </div>
            <div class="7th">
                    <!-- <span class="input-group-addon">YTD SPB Success Rate (%):</span> -->
                    <!-- <span><input type="text" class="form-control" value="{{ $view_case->ytd_spb_rate }}" placeholder="Dr Name" readonly /></span> -->
                    <span class="input-group-addon" >Last Visit Date:</span>
                    <span><input type="text" style="text-align:right;" class="form-control" size="11" value="{{ $view_case->nsm_last_visit_date }}" placeholder="Hospital Name" readonly /></span>
                    <span class="input-group-addon">Name:</span>
                    @foreach($nsm_name as $nsm_name)
                      <input type="text" style="" class="form-control" size="15" value="{{ $nsm_name->name }}" placeholder="Designation" readonly /></span>
                    @endforeach
                    <span class="input-group-addon">Status:</span>
                    <span><input type="text" style="text-align:right;" class="form-control" size="10" value="" placeholder="Designation" readonly /></span>
                
                </div>
                <hr>
            </div>
            <div class="12th">
            <span class="input-group-addon">PM Remarks: {{ $view_case->pm_remarks }}</span>
                <br />
            </div>
            <div class="7th">
                    <!-- <span class="input-group-addon">YTD SPB Success Rate (%):</span> -->
                    <!-- <span><input type="text" class="form-control" value="{{ $view_case->ytd_spb_rate }}" placeholder="Dr Name" readonly /></span> -->
                    <span class="input-group-addon" >Last Visit Date:</span>
                    <span><input type="text" style="text-align:right;" class="form-control" size="11" value="{{ $view_case->pm_last_visit_date }}" placeholder="Hospital Name" readonly /></span>
                    <span class="input-group-addon">Name:</span>
                    @foreach($pm_name as $pm_name)
                      <input type="text" style="" class="form-control" size="15" value="{{ $pm_name->name }}" placeholder="Designation" readonly /></span>
                    @endforeach
                    <span class="input-group-addon">Status:</span>
                    <span><input type="text" style="text-align:right;" class="form-control" size="10" value="" placeholder="Designation" readonly /></span>
                
                </div>
                <hr>
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




</body>
</html>