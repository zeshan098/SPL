@extends('fm.template.admin_template')



@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/toaster/custom.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/selecter/select2.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
<!-- Main content -->
<section class="content">
 <form method="post" onsubmit="return confirm('Do you really want to submit the form?');" action="{{ route('fm.update_fm_team', $team_info->id) }}" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
  <div class="row"> 
        <h2 class="page-header">Add Record</h2>
       
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Personal Info</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Other Information</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Relative In Pharma</a></li>
               
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="box-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Company Name</label>
                          <input class="form-control"   type="text" name="company" value="{{$team_info->company}}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Employee Name</label>
                          <input class="form-control"   type="text" name="employee_name" value="{{$team_info->employee_name}}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Father Name</label>
                          <input class="form-control"   type="text" name="father_name" value="{{$team_info->father_name}}">
                        </div>
                      </div>
                            
                  </div>
                </div> 
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input type="text" class="form-control pull-right datepicker"
                                       name="dob" autocomplete="off" value="{{date('d-m-Y', strtotime($team_info->dob))}}" >
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Joining Date</label>
                          <input type="text" class="form-control pull-right datepicker"
                                       name="joining_date" autocomplete="off" value="{{date('d-m-Y', strtotime($team_info->joining_date))}}" >
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>EOBI joining Date</label>
                          <input type="text" class="form-control pull-right datepicker"
                                       name="eobi_join_date" autocomplete="off" value="{{date('d-m-Y', strtotime($team_info->eobi_join_date))}}" >
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Age</label>
                          <input class="form-control"   type="text" name="age" value="{{$team_info->age}}">
                        </div>
                      </div>
                            
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>EOBI</label>
                            <select name="eobi" class="form-control"> 
                             <option value="{{$team_info->eobi}}">{{ucfirst($team_info->eobi)}}</option>
                              <option value="yes">Yes</option> 
                              <option value="no">No</option> 
                            </select> 
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Gender</label>
                            <select name="gender" class="form-control"> 
                             <option value="{{$team_info->gender}}">{{ucfirst($team_info->gender)}}</option>
                              <option value="male">Male</option> 
                              <option value="female">Female</option> 
                            </select> 
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>CNIC No</label>
                          <input class="form-control"   type="text" name="cnic_no" value="{{$team_info->cnic_no}}">
                        </div>
                      </div>
                            
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Permanent Address</label>
                          <input class="form-control"   type="text" name="permanent_address" value="{{$team_info->permanent_address}}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Temporayy Address</label>
                          <input class="form-control"   type="text" name="temporary_address" value="{{$team_info->temporary_address}}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Current Address</label>
                          <input class="form-control"   type="text" name="current_address" value="{{$team_info->current_address}}">
                        </div>
                      </div>
                            
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Postal Code</label>
                          <input class="form-control"   type="text" name="postal_code" value="{{$team_info->postal_code}}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control" type="email" name="email" value="{{$team_info->email}}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Department</label>
                          <input class="form-control"   type="text" name="department" value="{{$team_info->department}}">
                        </div>
                      </div>
                            
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Function</label>
                          <input class="form-control"   type="text" name="function_name" value="{{$team_info->function_name}}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Concerned Manager</label>
                          <input class="form-control" type="text" name="concerned_manager" value="{{$team_info->concerned_manager}}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>CCRS ID</label>
                          <input class="form-control"  type="text" name="ccrsid" value="{{$team_info->ccrsid}}">
                        </div>
                      </div>
                            
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Select Team</label>
                            <select name="team" class="form-control" required>
                              
                            <option value="{{$team_info->team}}">{{$team_info->team}}</option>
                                @foreach(explode(",", $zone->team) as $key => $value)
                                <option value="{{$value}}">{{$value}}</option>
                              @endforeach

                            </select>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Select Zone</label>
                            <select name="zone" class="form-control" required>
                              <option value="{{$team_info->zone}}">{{$team_info->zone}}</option>
                              
                                @foreach(explode(",", $zone->zone) as $key => $value)
                                <option value="{{$value}}">{{$value}}</option>
                              @endforeach

                            </select>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Select District</label>
                            <select name="district" class="form-control" required>
                            <option value="{{$team_info->district}}">{{$team_info->district}}</option>
                                @foreach(explode(",", $zone->district) as $key => $value)
                                <option value="{{$value}}">{{$value}}</option>
                              @endforeach

                            </select>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Select Station</label>
                            <select name="station" class="form-control" required>
                            <option value="{{$team_info->station}}">{{$team_info->station}}</option>
                                @foreach(explode(",", $zone->station) as $key => $value)
                                <option value="{{$value}}">{{$value}}</option>
                              @endforeach

                            </select>
                        </div>
                      </div>
                            
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Job Title / Designation</label>
                          <input class="form-control" type="text" name="designation" value="{{$team_info->designation}}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Employee Type</label>
                          <select name="employee_type" class="form-control"> 
                             <option value="{{$team_info->employee_type}}">{{ucfirst($team_info->employee_type)}}</option>
                              <option value="permanent">Permanent</option> 
                              <option value="permanent">Permanent</option>  
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Confirm Date</label>
                          <input type="text" class="form-control pull-right datepicker"
                                       name="confirm_date" autocomplete="off" value="{{date('d-m-Y', strtotime($team_info->confirm_date))}}" >
                        </div>
                      </div>
                            
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Applied For Job</label>
                          <input class="form-control" type="text" name="applied_for_job" value="{{$team_info->applied_for_job}}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Comments</label>
                          <input class="form-control" type="text" name="comments" value="{{$team_info->comments}}">
                        </div>
                      </div>  
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-body">
                    <div class="row">
                      <!-- Payment Information -->
                      <div class="wrapper center-block">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <!-- Payment Information -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading active" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Payment Information
                                              </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label>Payment Type</label>
                                                        <select name="payment_type" class="form-control">
                                                           <option value="{{$payment_info->payment_type}}">{{ucfirst($payment_info->payment_type)}}</option> 
                                                            <option value="cash">Cash</option> 
                                                            <option value="card">Card</option>  
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Payment Mode</label>
                                                        <select name="payment_mode" class="form-control"> 
                                                            <option value="{{$payment_info->payment_mode}}">{{ucfirst($payment_info->payment_mode)}}</option> 
                                                            <option value="cash">Cash</option> 
                                                            <option value="card">Card</option>  
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Category</label>
                                                        <input class="form-control"   type="text" name="category" value="{{ $payment_info->category }}"  />
                                                    </div>

                                                </div>
                                                <br/>
                                                <div class="row">
                                                     
                                                    <div class="col-lg-4">
                                                        <label>Employee Ac #</label>
                                                        <input class="form-control"   type="text"  name="emp_acc_no" value="{{ $payment_info->emp_acc_no }}" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Bank</label>
                                                        <input class="form-control"   type="text" name="bank_name" value="{{ $payment_info->bank_name }}" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Branch Station</label>
                                                        <input class="form-control"   type="text" name="branch_station" value="{{ $payment_info->branch_station }}" />
                                                    </div>

                                                </div>
                                                <br/>
                                                <div class="row">
                                                     
                                                    <div class="col-lg-4">
                                                        <label>Branch Address</label>
                                                        <input class="form-control"   type="text"  name="branch_address" value="{{ $payment_info->branch_address }}" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Transfer From</label>
                                                        <input class="form-control"   type="text" name="transfer_from" value="{{ $payment_info->transfer_from }}" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>No of Letters</label>
                                                        <input class="form-control"   type="text" name="no_of_letters" value="{{ $payment_info->no_of_letters }}" />
                                                    </div>

                                                </div>
                                                <br/>
                                                  
                                            </div>
                                        </div>
                                    </div>
                                    <!--un approved Product -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                Employee Status
                                                                </a>
                                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <!--un approved Product -->
                                                <div class="row">
                                                    
                                                    <div id="unapproved_product">
                                                        <div class="grouped_entities">
                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Attandance ID</label>
                                                                    <input type="text" class="form-control"   name="attandance_id" value="{{ $team_info->attandance_id }}" >
                                                                </div>
                                                            </div>   
                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Emp No</label>
                                                                    <input type="text" class="form-control"   name="emp_no"   value="{{ $team_info->emp_no }}" >
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Mobile Phone</label>
                                                                    <input type="text" class="form-control"   name="mobile_no"  value="{{ $team_info->mobile_no }}"  >
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>


                                                </div> 
                                                <div class="row">
                                                    
                                                    <div id="unapproved_product">
                                                        <div class="grouped_entities">
                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Emergency Phone</label>
                                                                    <input type="text" class="form-control"   name="emergency_ph_no"  value="{{ $team_info->emergency_ph_no }}" >
                                                                </div>
                                                            </div>   
                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Residence Phone</label>
                                                                    <input type="text" class="form-control"   name="residence_ph_no"  value="{{ $team_info->residence_ph_no }}" >
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Company Phone</label>
                                                                    <input type="text" class="form-control"   name="company_ph_no"  value="{{ $team_info->company_ph_no }}" >
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    
                                                    <div id="unapproved_product">
                                                        <div class="grouped_entities">
                                                            <div class="col-lg-6 nopadding">
                                                                <div class="form-group">
                                                                    <label>Emergency Contact Person</label>
                                                                    <input type="text" class="form-control"   name="contact_person"  value="{{ $team_info->contact_person }}" >
                                                                </div>
                                                            </div>   
                                                            <div class="col-lg-6 nopadding">
                                                                <div class="form-group">
                                                                    <label>Martial Status</label>
                                                                    <select name="martial_status" class="form-control"> 
                                                                       <option value="{{$team_info->martial_status}}">{{ucfirst($team_info->martial_status)}}</option>
                                                                        <option value="married">Married</option> 
                                                                        <option value="unmarried">Un Married</option> 
                                                                        <option value="divorce">Divorce</option>  
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    
                                                    <div id="unapproved_product">
                                                        <div class="grouped_entities">
                                                            <div class="col-lg-6 nopadding">
                                                                <div class="form-group">
                                                                    <label>No Of Child</label>
                                                                    <input type="text" class="form-control"   name="no_of_children"  value="{{ $team_info->no_of_children }}" >
                                                                </div>
                                                            </div>  
                                                            <div class="col-lg-6 nopadding">
                                                                <div class="form-group">
                                                                    <label>Above 5 Year</label>
                                                                    <input type="text" class="form-control"   name="above_5_year" value="{{ $team_info->above_5_year }}"  >
                                                                </div>
                                                            </div>
 
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    
                                                    <div id="unapproved_product">
                                                        <div class="grouped_entities">
                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Blood Group</label>
                                                                    <select name="blood_group" class="form-control"> 
                                                                        <option value="{{$team_info->blood_group}}">{{ucfirst($team_info->blood_group)}}</option>
                                                                        <option value="A">A+</option> 
                                                                        <option value="B">B+</option> 
                                                                        <option value="C">C+</option>  
                                                                    </select>
                                                                </div>
                                                            </div>  
                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Religion</label>
                                                                    <select name="religion" class="form-control"> 
                                                                      <option value="{{$team_info->religion}}">{{ucfirst($team_info->religion)}}</option>
                                                                        <option value="muslim">Muslim</option> 
                                                                        <option value="non-muslim">Non Muslim</option>  
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Specify Other</label>
                                                                    <input type="text" class="form-control"   name="speify_other"  value="{{ $team_info->speify_other }}" >
                                                                </div>
                                                            </div>
 
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">
                                                    
                                                    <div id="unapproved_product">
                                                        <div class="grouped_entities">
                                                            <div class="col-lg-6 nopadding">
                                                                <div class="form-group">
                                                                    <label>Service Type</label>
                                                                    <select name="service_type" class="form-control"> 
                                                                       <option value="{{$team_info->service_type}}">{{ucfirst($team_info->service_type)}}</option>
                                                                        <option value="permanent">Permanent</option> 
                                                                        <option value="permanent">Permanent</option>  
                                                                    </select>
                                                                </div>
                                                            </div>  
                                                            <div class="col-lg-6 nopadding">
                                                                <div class="form-group">
                                                                    <label>Is Manager</label>
                                                                    <select name="is_manager" class="form-control"> 
                                                                        <option value="{{$team_info->is_manager}}">{{ucfirst($team_info->is_manager)}}</option>
                                                                        <option value="yes">Yes</option> 
                                                                        <option value="no">No</option>  
                                                                    </select>
                                                                </div>
                                                            </div>
                                                             
 
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <br>
                                                <!--Employee Status End -->
                                                 
                                            </div>
                                        </div>
                                    </div>

                                </div>
                               
                            </div>
                             <!-- End approved / un approved Product -->

                    <!-- row end -->      
                    </div>
                </div>
                <!-- /.box-body -->

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="box-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Mother Language</label>
                          <select name="mother_language" class="form-control"> 
                           <option value="{{$other_info->mother_language}}">{{ucfirst($other_info->mother_language)}}</option>
                            <option value="urdu">Urdu</option> 
                            <option value="sindhi">Sindhi</option> 
                            <option value="punjabi">Punjabi</option>  
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Can Speak Language</label>
                          <input class="form-control"   type="text" name="other_language" value="{{ $other_info->other_language }}" >
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Caste</label>
                          <input class="form-control"   type="text" name="caste" value="{{ $other_info->caste }}" >
                        </div>
                      </div>
                            
                  </div>
                </div> 
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Transport Type</label>
                          <select name="transport_type" class="form-control"> 
                          <option value="{{$other_info->transport_type}}">{{ucfirst($other_info->transport_type)}}</option>
                            <option value="bike">Bike</option> 
                            <option value="car">Car</option> 
                            <option value="van">Van</option>  
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Licence</label>
                          <select name="license" class="form-control"> 
                          <option value="{{$other_info->license}}">{{ucfirst($other_info->license)}}</option>
                            <option value="bike_license">Bike</option> 
                            <option value="car_license">Car</option> 
                            <option value="van_license">Van</option>  
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Vehicle No</label>
                          <input class="form-control"   type="text" name="vehicle_no" value="{{ $other_info->vehicle_no }}">
                        </div>
                      </div>
                            
                  </div>
                </div> 
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Politicle Affiliation</label>
                          <select name="political_affiliation" class="form-control">
                          <option value="{{$other_info->political_affiliation}}">{{ucfirst($other_info->political_affiliation)}}</option> 
                            <option value="yes">Yes</option> 
                            <option value="no">No</option>   
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Affiliation With</label>
                          <input class="form-control"   type="text" name="affiliation_with" value="{{ $other_info->affiliation_with }}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>My Family Depend On</label>
                          <select name="family_depend_on" class="form-control"> 
                          <option value="{{$other_info->family_depend_on}}">{{ucfirst($other_info->family_depend_on)}}</option> 
                            <option value="yes">Yes</option> 
                            <option value="no">No</option>   
                          </select>
                        </div>
                      </div>
                            
                  </div>
                </div> 
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Present Company</label>
                          <input class="form-control"   type="text" name="present_company" value="{{ $other_info->present_company }}">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Gross Salary</label>
                          <input class="form-control"   type="text" name="gross_salary" value="{{ $other_info->gross_salary }}">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Benefit</label>
                          <input class="form-control"   type="text" name="benefits" value="{{ $other_info->benefits }}">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Reason Of Change</label>
                          <input class="form-control"   type="text" name="reason_of_change" value="{{ $other_info->reason_of_change }}">
                        </div>
                      </div>
                            
                  </div>
                </div> 
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                        <label>City</label>
                          <input class="form-control"   type="text" name="city" value="{{ $other_info->city }}"> 
                        </div>
                      </div>
                    </div>
                    <div class="row"> 
                    @foreach($city_info as $city_info)
                        <div class="col-lg-11 field_wrapper">
                          <div class="form-group">
                            <label>Station</label>
                           
                            <input type="hidden" name="city_info[{{$loop->index}}][id]" value="{{$city_info->id}}"> 
                            <input class="form-control"   type="text" name="city_info[{{$loop->index}}][station_id]" value="{{$city_info->station_id}}">
                            
                            <!-- <a href="javascript:void(0);" class="add_button" style="float:right; margin-top:-25px; margin-right:-20px;" title="Add field"></a> -->
                          </div> 
                      </div>
                    @endforeach  
                            
                  </div>
                </div> 
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Work in Morning Evening</label>
                          <select name="morning_evening_work" class="form-control"> 
                          <option value="{{$other_info->morning_evening_work}}">{{ucfirst($other_info->morning_evening_work)}}</option>
                            <option value="yes">Yes</option> 
                            <option value="no">No</option>   
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Pay Training Expenses</label>
                          <select name="pay_training_expense" class="form-control"> 
                          <option value="{{$other_info->pay_training_expense}}">{{ucfirst($other_info->pay_training_expense)}}</option>
                            <option value="yes">Yes</option> 
                            <option value="no">No</option>   
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                        <label>Give Surety Bond</label>
                          <select name="suerty_bond" class="form-control"> 
                          <option value="{{$other_info->suerty_bond}}">{{ucfirst($other_info->suerty_bond)}}</option>
                            <option value="yes">Yes</option> 
                            <option value="no">No</option>   
                          </select>
                        </div>
                      </div> 
                            
                  </div>
                </div> 
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Referred By</label>
                          <input class="form-control"   type="text" name="referred_by" value="{{ $other_info->referred_by }}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Interviewed By</label>
                          <input class="form-control"   type="text" name="interviewed_by" value="{{ $other_info->interviewed_by }}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Documents Auth By</label>
                          <input class="form-control"   type="text" name="auth_by" value="{{ $other_info->auth_by }}">
                        </div>
                      </div>
                       
                            
                  </div>
                </div> 
                <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      <div id="education_fields">
            
                      
                      @foreach($reletive_info as $reletive_info)
                      <div class="col-lg-6 nopadding">
                      <div class="form-group">
                      <label>Relationship</label>
                       <input type="hidden" name="reletive_info[{{$loop->index}}][id]" value="{{$reletive_info->id}}"> 
                        <select class="form-control" id="educationDate" name="reletive_info[{{$loop->index}}][relationship]">
                                 <option value="{{$reletive_info->relationship}}">{{ucfirst($reletive_info->relationship)}}</option> 
                                  <option value="brother">Brother</option>
                                  <option value="friend">Friend</option> 
                        </select>
                      </div>
                    </div> 
                    <div class="col-lg-6 nopadding">
                      <div class="form-group">
                      <label>Pharma Company</label>
                        <div class="input-group">
                          <!-- <input type="hidden" name="reletive_info[{{$loop->index}}][id]" value="{{$reletive_info->id}}">  -->
                          <input type="text" class="form-control" id="Degree" name="reletive_info[{{$loop->index}}][pharma_company]" value="{{ $reletive_info->pharma_company }}" >
                          <!-- <div class="input-group-btn">
                            <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    @endforeach 
                    <div class="clear"></div>
                       
                    </div>         
                  </div>
                </div> 
                <button type="submit" name="submit" value="1" id="submit" class="btn btn-primary">Submit</button>
                <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
 
  </div>
  <!-- /.row -->
 </form>
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
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })

</script>

<script type="text/javascript">
$(document).ready(function(){
	var maxField = 10; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var fieldHTML = '<div class="form-group"><input class="form-control"   type="text" name="station_id[]" ><a href="javascript:void(0);" class="remove_button" style="float:right; margin-top:-25px; margin-right:-20px;"><i class="fa fa-fw fa-minus"></i></div>'; //New input field html 
	var x = 1; //Initial field counter is 1
	
	//Once add button is clicked
	$(addButton).click(function(){
		//Check maximum number of input fields
		if(x < maxField){ 
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); //Add field html
		}
	});
	
	//Once remove button is clicked
	$(wrapper).on('click', '.remove_button', function(e){
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
});
</script>
<script>
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = `<div class="col-lg-6 nopadding">
                              <div class="form-group">
                                <select class="form-control" id="educationDate" name="relationship[]">
                                  
                                  <option value="">Relationship</option>
                                  <option value="brother">Brother</option>
                                  <option value="friend">Friend</option> 
                                </select>
                                
                              </div>
                            </div>
                            <div class="col-lg-6 nopadding">
                              <div class="form-group">
                                <div class="input-group">
                                  <input type="text" class="form-control" id="Degree" name="pharma_company[]" value=""  >
                                  <div class="input-group-btn">
                                  <button class="btn btn-danger" type="button" onclick="remove_education_fields(` + room + `);"> 
                                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> 
                                  </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>`;
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
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
@endsection