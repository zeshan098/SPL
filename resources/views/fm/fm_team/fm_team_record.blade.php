@extends('fm.template.admin_template')



@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/toaster/custom.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/selecter/select2.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
<!-- Main content -->
<section class="content">
 <form method="post" onsubmit="return confirm('Do you really want to submit the form?');" action="{{ route('fm.add_team') }}" enctype="multipart/form-data">
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
                          <input class="form-control"   type="text" name="company" placeholder="">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Employee Name</label>
                          <input class="form-control"   type="text" name="employee_name" placeholder="">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Father Name</label>
                          <input class="form-control"   type="text" name="father_name" placeholder="">
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
                                       name="dob" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Joining Date</label>
                          <input type="text" class="form-control pull-right datepicker"
                                       name="joining_date" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>EOBI joining Date</label>
                          <input type="text" class="form-control pull-right datepicker"
                                       name="eobi_join_date" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Age</label>
                          <input class="form-control"   type="text" name="age" placeholder=" ">
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
                              <option value="yes">Yes</option> 
                              <option value="no">No</option> 
                            </select> 
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Gender</label>
                            <select name="gender" class="form-control"> 
                              <option value="male">Male</option> 
                              <option value="female">Female</option> 
                            </select> 
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>CNIC No</label>
                          <input class="form-control"   type="text" name="cnic_no" placeholder=" ">
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
                          <input class="form-control"   type="text" name="permanent_address" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Temporayy Address</label>
                          <input class="form-control"   type="text" name="temporary_address" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Current Address</label>
                          <input class="form-control"   type="text" name="current_address" placeholder=" ">
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
                          <input class="form-control"   type="text" name="postal_code" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control" type="email" name="email" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Department</label>
                          <input class="form-control"   type="text" name="department" placeholder=" ">
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
                          <input class="form-control"   type="text" name="function_name" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Concerned Manager</label>
                          <input class="form-control" type="text" name="concerned_manager" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>CCRS ID</label>
                          <input class="form-control"  type="text" name="ccrsid" placeholder=" ">
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
                              <option value="">Select Team</option>
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
                              <option value="">Select Zone</option>
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
                              <option value="">Select District</option>
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
                              <option value="">Select Station</option>
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
                          <input class="form-control" type="text" name="designation" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Employee Type</label>
                          <select name="employee_type" class="form-control"> 
                              <option value="permanent">Permanent</option> 
                              <option value="permanent">Permanent</option>  
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Confirm Date</label>
                          <input type="text" class="form-control pull-right datepicker"
                                       name="confirm_date" autocomplete="off" required>
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
                          <input class="form-control" type="text" name="applied_for_job" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Comments</label>
                          <input class="form-control" type="text" name="comments" placeholder=" ">
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
                                                            <option value="cash">Cash</option> 
                                                            <option value="card">Card</option>  
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Payment Mode</label>
                                                        <select name="payment_mode" class="form-control"> 
                                                            <option value="cash">Cash</option> 
                                                            <option value="card">Card</option>  
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Category</label>
                                                        <input class="form-control"   type="text" name="category" placeholder=" "  />
                                                    </div>

                                                </div>
                                                <br/>
                                                <div class="row">
                                                     
                                                    <div class="col-lg-4">
                                                        <label>Employee Ac #</label>
                                                        <input class="form-control"   type="text"  name="emp_acc_no" placeholder=" " />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Bank</label>
                                                        <input class="form-control"   type="text" name="bank_name" placeholder=" " />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Branch Station</label>
                                                        <input class="form-control"   type="text" name="branch_station" placeholder=" " />
                                                    </div>

                                                </div>
                                                <br/>
                                                <div class="row">
                                                     
                                                    <div class="col-lg-4">
                                                        <label>Branch Address</label>
                                                        <input class="form-control"   type="text"  name="branch_address" placeholder=" " />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Transfer From</label>
                                                        <input class="form-control"   type="text" name="transfer_from" placeholder=" " />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>No of Letters</label>
                                                        <input class="form-control"   type="text" name="no_of_letters" placeholder=" " />
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
                                                                    <input type="text" class="form-control"   name="attandance_id"  >
                                                                </div>
                                                            </div>   
                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Emp No</label>
                                                                    <input type="text" class="form-control"   name="emp_no"   >
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Mobile Phone</label>
                                                                    <input type="text" class="form-control"   name="mobile_no"   >
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
                                                                    <input type="text" class="form-control"   name="emergency_ph_no"  >
                                                                </div>
                                                            </div>   
                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Residence Phone</label>
                                                                    <input type="text" class="form-control"   name="residence_ph_no"   >
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Company Phone</label>
                                                                    <input type="text" class="form-control"   name="company_ph_no"   >
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
                                                                    <input type="text" class="form-control"   name="contact_person"  >
                                                                </div>
                                                            </div>   
                                                            <div class="col-lg-6 nopadding">
                                                                <div class="form-group">
                                                                    <label>Martial Status</label>
                                                                    <select name="martial_status" class="form-control"> 
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
                                                                    <input type="text" class="form-control"   name="no_of_children"   >
                                                                </div>
                                                            </div>  
                                                            <div class="col-lg-6 nopadding">
                                                                <div class="form-group">
                                                                    <label>Above 5 Year</label>
                                                                    <input type="text" class="form-control"   name="above_5_year"   >
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
                                                                        <option value="muslim">Muslim</option> 
                                                                        <option value="non-muslim">Non Muslim</option>  
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 nopadding">
                                                                <div class="form-group">
                                                                    <label>Specify Other</label>
                                                                    <input type="text" class="form-control"   name="speify_other"   >
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
                                                                        <option value="permanent">Permanent</option> 
                                                                        <option value="permanent">Permanent</option>  
                                                                    </select>
                                                                </div>
                                                            </div>  
                                                            <div class="col-lg-6 nopadding">
                                                                <div class="form-group">
                                                                    <label>Is Manager</label>
                                                                    <select name="is_manager" class="form-control"> 
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
                            <option value="urdu">Urdu</option> 
                            <option value="sindhi">Sindhi</option> 
                            <option value="punjabi">Punjabi</option>  
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Can Speak Language</label>
                          <input class="form-control"   type="text" name="other_language" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Caste</label>
                          <input class="form-control"   type="text" name="caste" placeholder=" ">
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
                            <option value="bike_license">Bike</option> 
                            <option value="car_license">Car</option> 
                            <option value="van_license">Van</option>  
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Vehicle No</label>
                          <input class="form-control"   type="text" name="vehicle_no" placeholder=" ">
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
                            <option value="yes">Yes</option> 
                            <option value="no">No</option>   
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Affiliation With</label>
                          <input class="form-control"   type="text" name="affiliation_with" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>My Family Depend On</label>
                          <select name="family_depend_on" class="form-control"> 
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
                          <input class="form-control"   type="text" name="present_company" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Gross Salary</label>
                          <input class="form-control"   type="text" name="gross_salary" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Benefit</label>
                          <input class="form-control"   type="text" name="benefits" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Reason Of Change</label>
                          <input class="form-control"   type="text" name="reason_of_change" placeholder=" ">
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
                          <input class="form-control"   type="text" name="city" placeholder=" ">
                        </div>
                      </div>
                    </div>
                    <div class="row"> 
                        <div class="col-lg-11 field_wrapper">
                          <div class="form-group">
                            <label>Station</label>
                            <input class="form-control"   type="text" name="station_id[]" placeholder=" ">
                            <a href="javascript:void(0);" class="add_button" style="float:right; margin-top:-25px; margin-right:-20px;" title="Add field"><i class="fa fa-fw fa-plus"></i></a>
                          </div> 
                      </div>
                       
                            
                  </div>
                </div> 
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Work in Morning Evening</label>
                          <select name="morning_evening_work" class="form-control"> 
                            <option value="yes">Yes</option> 
                            <option value="no">No</option>   
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Pay Training Expenses</label>
                          <select name="pay_training_expense" class="form-control"> 
                            <option value="yes">Yes</option> 
                            <option value="no">No</option>   
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                        <label>Give Surety Bond</label>
                          <select name="suerty_bond" class="form-control"> 
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
                          <input class="form-control"   type="text" name="referred_by" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Interviewed By</label>
                          <input class="form-control"   type="text" name="interviewed_by" placeholder=" ">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Documents Auth By</label>
                          <input class="form-control"   type="text" name="auth_by" placeholder=" ">
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
            
                      
                      <div class="col-lg-6 nopadding">
                      <div class="form-group">
                      <label>Relationship</label>
                        <select class="form-control" id="educationDate" name="relationship[]">
                          
                                  <option value="">Relationship</option>
                                  <option value="brother">Brother</option>
                                  <option value="friend">Friend</option> 
                        </select>
                        
                      </div>
                    </div>

                    <div class="col-lg-6 nopadding">
                      <div class="form-group">
                      <label>Pharma Company</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="Degree" name="pharma_company[]" value="" >
                          <div class="input-group-btn">
                            <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                          </div>
                        </div>
                      </div>
                    </div>
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