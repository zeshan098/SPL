@extends('fm.template.admin_template')



@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/toaster/custom.css") }}"> 
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Case ID: {{ $view_case->team }}-{{ $view_case->district }}-{{ $view_case->id }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
              <div class="box-body">
              <!--zone/district/station -->
                <div class="row"> 
                    <div class="col-md-6 col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon">Case Catagory</span> 
                            <input type="text" class="form-control" value="{{ $view_case->case_catagory }}"   readonly />
                            
                        </div>
                    </div>
                    @if($view_case->case_catagory == 'Reapply')
                        <div class="col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Remarks</span> 
                                <input type="text" class="form-control" value="{{ $view_case->discription }}"   readonly />
                                
                            </div>
                        </div>
                    @else 
                        <div class="col-md-6 col-lg-6">
                        </div>

                    @endif
 
                </div>
                <br/>
              <div class="row"> 
                    <div class="col-md-6 col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon">Submitted By:</span>
                            @foreach($fm_name as $fm_name)
                            <input type="text" class="form-control" value="{{ $fm_name->name }}"   readonly />
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                      <div class="input-group">
                        <span class="input-group-addon">Case Genration Date</span>
                        <input type="text" class="form-control" value="{{ $view_case->created_at->format('d/m/Y') }}"  readonly />
                      </div>
                  </div>
                
                    
                    
                </div>
                    
                <br />
                <div class="row">
                  <div class="col-md-3 col-lg-3">
                      <div class="input-group">
                        <span class="input-group-addon">Team</span>
                        <input type="text" class="form-control" value="{{ $view_case->team }}"  readonly />
                      </div>
                  </div>
                  <div class="col-md-3 col-lg-3">
                      <div class="input-group">
                        <span class="input-group-addon">Zone</span>
                        <input type="text" class="form-control" value="{{ $view_case->zone }}"  readonly />
                      </div>
                  </div>
                  <div class="col-md-3 col-lg-3">
                      <div class="input-group">
                        <span class="input-group-addon">District</span>
                        <input type="text" class="form-control" value="{{ $view_case->district }}"  readonly />
                      </div>
                  </div>
                  <div class="col-md-3 col-lg-3">
                      <div class="input-group">
                        <span class="input-group-addon">Station</span>
                        <input type="text" class="form-control" value="{{ $view_case->station }}"  readonly/>
                      </div>
                  </div>
                  
                </div>
                <br>
                <!--end zone/district/station -->
                <div class="row"> 
                           <!-- <div class="col-md-3 col-lg-3">
                              <div class="input-group">
                                <span class="input-group-addon">YTD SPB Success Rate (%)</span>
                                <input type="text" class="form-control" value="{{ $view_case->ytd_spb_rate }}"   readonly />
                               </div>
                            </div> -->
                            <div class="col-md-4 col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">YTD Sale</span>
                                <input type="text" class="form-control" style="text-align:right" value="{{ $view_case->ytd_sale }}"   readonly />
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">YTD SPB C.Y</span>
                                <input type="text" class="form-control" style="text-align:right" value="{{ $view_case->ytd_spb_c_y }}"   readonly />
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">YTD SPB Ratio</span>
                                <input type="text" class="form-control" style="text-align:right" value="{{ $view_case->ytd_ratio }}"  readonly />
                            </div>
                        </div>
                </div>
                    
                <br />
                <!--2nd row -->
                <div class="row">
                  <div class="col-md-4 col-lg-4">
                      <div class="input-group">
                        <span class="input-group-addon">Dr</span>
                        <input type="text" class="form-control" value="{{ $view_case->dr_name }}"  readonly />
                      </div>
                  </div>
                  <div class="col-md-4 col-lg-4">
                      <div class="input-group">
                        <span class="input-group-addon">Hospital</span>
                        <input type="text" class="form-control" value="{{ $view_case->hospital_name }}"  readonly />
                      </div>
                  </div>
                  <div class="col-md-4 col-lg-4">
                      <div class="input-group">
                        <span class="input-group-addon">Monitoring Pharmacy(ies)</span>
                        <input type="text" class="form-control" value="{{ $view_case->pharmacy_name }}"  readonly />
                      </div>
                  </div>
                  
                </div>
                <br />
                <!--end 2nd row -->
                <!--21rd row -->
                <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon">Qualification</span>
                        @foreach($qualification as $qualification)
                        <input type="text" class="form-control" value="{{ $qualification->designation }} - {{ $qualification->desig_full_name }}"  readonly />
                        @endforeach
                      </div>
                      
                  </div>
                  <div class="col-md-4 col-lg-4">
                      <div class="input-group">
                        <span class="input-group-addon">Address</span>
                        <input type="text" class="form-control" value="{{ $view_case->dr_address }}" readonly />
                      </div>
                  </div>
                  <div class="col-md-4 col-lg-4">
                      <div class="input-group">
                        <span class="input-group-addon">Contact</span>
                        <input type="text" class="form-control" value="{{ $view_case->dr_contact_number }}"  readonly />
                      </div>
                  </div>
                  
                </div>
                <br />
                <!--21rd row -->
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                      <!-- <div class="input-group">
                        <span class="input-group-addon">GP / MO / Consultant</span>
                        <input type="text" class="form-control" value="{{ $view_case->salutation }}" readonly />
                      </div> -->
                      <div class="input-group">
                        <span class="input-group-addon">Designation</span>
                        <input type="text" class="form-control" value="{{ $view_case->dr_designation }}"  readonly />
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                      <div class="input-group">
                        <span class="input-group-addon">Specialty</span>
                        <input type="text" class="form-control" value="{{ $view_case->salutation_specify }}"  readonly />
                      </div>
                  </div>
                  
                </div>
                <br />
                <!--end 3rd row -->
                <!--4th row -->
                <div class="row">
                  <div class="col-md-4 col-lg-4">
                      <div class="input-group">
                        <span class="input-group-addon">Practice Type</span>
                        <input type="text" class="form-control" value="{{ $view_case->ppb }}"  readonly />
                      </div>
                  </div>
                  
                  <div class="col-md-4 col-lg-4">
                      <div class="input-group">
                        <span class="input-group-addon">Last Visit Date</span>
                        <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($view_case->last_visit_date)) }}"  readonly />
                      </div>
                  </div>
                  <div class="col-md-4 col-lg-4">
                      <div class="input-group">
                        <span class="input-group-addon">Accompanied By</span>
                        <input type="text" class="form-control" value="{{ $view_case->accompanied_person_fm }}"  readonly />
                      </div>
                  </div>
                  
                </div>
                <br />
                <!--end 4th row -->
                <div style="border:1px solid black;">
                <h3>Rentention Case Details (In case of Retention)</h3>
                    
                    <!--5th row -->
                    <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="input-group">
                            <span class="input-group-addon">New Case / Retention</span>
                            <input type="text" class="form-control" value="{{ $view_case->case_type }}"  readonly />
                        </div>
                    </div>
                    
                    </div>
                    <br />
                    @foreach($retention_document as $retention_document)
                    <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="input-group">
                            <a href="{{route('fm.retention_documents',$retention_document->id)}}" class="btn btn-outline-warning"><i class="fa fa-fw fa-download"></i>Download</a>
                        </div>
                    </div>
                    
                    </div>
                    @endforeach
                    <br/>
                    <!--end 5th row -->
                    <!--6th row-->
                    <!-- approved Product -->
                    <div class="wrapper center-block">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <!-- approved Product -->
                                    @foreach($retention as $retention)
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
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Date Of Approval</span>
                                                        <input type="text" class="form-control" style="text-align:right" value="{{ date('d/m/Y', strtotime($retention->date_of_approval)) }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Product Duration(Months)</span>
                                                        <input type="text" class="form-control" style="text-align:right" value="{{ $retention->project_duration }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Projected Date of Completion</span>
                                                        <input type="text" class="form-control" style="text-align:right" value="{{date('d/m/Y', strtotime($retention->projected_date_of_completion)) }}" readonly />
                                                    </div>
                                                </div>

                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Actual Duration(Months)</span>
                                                        <input type="text" class="form-control" style="text-align:right" value="{{ $retention->actual_duration }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Actual Date Of Completion</span>
                                                        <input type="text" class="form-control" style="text-align:right" value="{{ date('d/m/Y', strtotime($retention->actual_date_of_completion)) }}" readonly />
                                                    </div>
                                                </div>

                                            </div>

                                            <br />
                                                 
                                                <!-- Product List -->
                                                <!--6.1-->
                                                <div class="box">
                                                    <!-- <div class="box-header">
                                                                                <h3 class="box-title">Activity Lists</h3>
                                                                            </div> -->
                                                    <!-- /.box-header -->
                                                    <div class="box-body table-responsive">
                                                        <!--<div class="box-body table-responsive no-padding">-->
                                                        <table id="users_list" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>SPB Value(Rs,)</th>
                                                                    <th>Projected Biz / Month</th>
                                                                    <th>Projected Total Biz</th>
                                                                    <th>Actual Total Biz Units</th>
                                                                    <th>Cost of Activity</th>
                                                                    <th>Success %age</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($approved_product as $approved_product)
                                                                <tr>

                                                                    <td>{{ $approved_product->product_name }}</td>
                                                                    <td style="text-align:right">{{ $approved_product->spb_value }}</td>
                                                                    <td style="text-align:right">{{ $approved_product->biz_units_month }}</td>
                                                                    <td style="text-align:right">{{ $approved_product->biz_units }}</td>
                                                                    <td style="text-align:right">{{ $approved_product->actual_biz_unit }}</td>
                                                                    <td style="text-align:right">{{ $approved_product->coa }}</td>
                                                                    <td style="text-align:right">{{ $approved_product->success }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                    <!-- /.box-body -->
                                                </div>
                                                <!--Total Value row -->
                                                <!--6.2--> 
                                                <div class = "row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <div class="box-body">
                                                            <div class="panel panel-default">

                                                                <div class="panel-body">

                                                                    <div id="education_fields">

                                                                    </div>
                                                                    <div class="col-sm-2 nopadding">
                                                                        
                                                                        <div class="form-group">
                                                                            <h4>Total Value:</h4>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
                                                                    <div class="col-sm-2 nopadding" style="">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="spb_amt_sum" name="spb_sum" value="{{ $retention->total_spb_value }}" placeholder="SPB AMT Sum" readonly="" required="" style="width: 128px;">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                    <div class="col-sm-2 nopadding">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="current_biz_sum" name="current_biz_sum" value="{{ $retention->total_biz_units_month }}" placeholder="Current Biz Sum" readonly="" required="" style="width: 128px;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2 nopadding">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="proj_biz_sum" name="proj_biz_sum" value="{{ $retention->pro_total_biz_units }}" placeholder="Project Biz Sum" readonly="" required="" style="width: 128px;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2 nopadding">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="tot_proj_sum" name="tot_proj_sum" value="{{ $retention->actual_total_biz_units }}" placeholder="Total Project Sum" readonly="" required="" style="width: 128px;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2 nopadding">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="tot_proj_sum" name="tot_proj_sum" value="{{ $retention->total_coa }}" placeholder="Total Project Sum" readonly="" required="" style="width: 128px;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-1 nopadding">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="tot_proj_sum" name="tot_proj_sum" value="{{ $retention->total_success }}" placeholder="Total Project Sum" readonly="" required="">
                                                                        </div>
                                                                    </div>

                                                                    
                                                                    <div class="clear"></div>

                                                                </div>
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
                                                <!--6.1-->
                                                <div class="box">
                                                    <!-- <div class="box-header">
                                                                                <h3 class="box-title">Activity Lists</h3>
                                                                            </div> -->
                                                    <!-- /.box-header -->
                                                    <div class="box-body table-responsive">
                                                        <!--<div class="box-body table-responsive no-padding">-->
                                                        <table id="users_list" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Total Biz Unit</th>
                                                                    <th>Comments</th> 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($unapproved_product as $unapproved_product)
                                                                <tr>

                                                                    <td>{{ $unapproved_product->product_name }}</td>
                                                                    <td style="text-align:right">{{ $unapproved_product->total_biz_units }}</td>
                                                                    <td style="text-align:left">{{ $unapproved_product->comments }}</td> 
                                                                </tr>
                                                                @endforeach
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                    <!-- /.box-body -->
                                                </div>
                                                <!--unapproved product list -->
                                                <!-- Total Unapproved Product -->
                                                <div class="row">
                                                    <div class="box-body">
                                                        <div class="panel panel-default">

                                                            <div class="panel-body">

                                                                <div id="unapproved_product">

                                                                </div>
                                                                <div class="col-sm-6 nopadding">
                                                                    <div class="form-group">
                                                                        <div class="form-group">
                                                                            <h4>Total Value:</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3 nopadding">
                                                                 
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="unapproved_total_biz_units" name="unapproved_total_biz_units" value="{{$retention->unapproved_total_biz_units}}" placeholder="Total Biz" readonly>
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
                                    @endforeach
                                </div>
                               
                            </div>
                             <!-- End approved / un approved Product -->
                       
                         
                    <!--end6.2-->

                     
                    <!--8th row -->
                     
                     
                </div>
                <br />
                <!--end 8th row -->
                <!--9th row -->
                <div class="row"> 
                    <div class="col-md-12 col-lg-12">
                        <div class="input-group">
                            <span class="input-group-addon">Activity Name</span>
                            <input type="text" class="form-control" value="{{ $view_case->activity_name }}"   readonly />
                        </div>
                    </div>
                
                    
                    
                </div>
                    
                <br />
                <!--end 9th row -->
                
                <!--11th row -->
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon">Duration (Months)</span>
                            <input type="text" class="form-control" style="text-align:right" value="{{ $view_case->duration_month }}"  readonly />
                        </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                           <div class="input-group">
                            <span class="input-group-addon">Total COA</span>
                            <input type="text" class="form-control" style="text-align:right" value="{{ $view_case->t_coa }}"   readonly />
                        </div>
                    </div>
                    
                    <br />
               </div>
                <!--12th row -->
                <br />
                
                <div class="box">
                        <!-- <div class="box-header">
                            <h3 class="box-title">Activity Lists</h3>
                        </div> -->
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                        <!--<div class="box-body table-responsive no-padding">-->
                            <table id="users_list" class="table table-bordered table-striped">
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
                                    
                                        <td>{{ $case_product->product }}</td>
                                        <td style="text-align:right">{{ $case_product->spb_amt }}</td>
                                        <td style="text-align:right">{{ $case_product->current_biz }}</td>
                                        <td style="text-align:right">{{ $case_product->proj_biz }}</td>
                                        <td style="text-align:right">{{ $case_product->tot_proj }}</td>
                                        <td style="text-align:right">{{ $case_product->cost_of_activity }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Product</th>
                                        <th>SPB Amt</th>
                                        <th>Current Biz</th>
                                        <th>Proj Biz</th>
                                        <th>Tot Proj</th>
                                        <th>Cost of Activity</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                        <!-- /.box-body -->
                </div>
                <!--end 12th row -->
                <div class = "row">
                <div class="box-body">
                        <div class="panel panel-default">

                            <div class="panel-body">

                                <div id="education_fields">

                                </div>
                                <div class="col-sm-3 nopadding">
                                    <div class="form-group">
                                      <div class="form-group">
                                        <h4>Total Value:</h4>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 nopadding" style="">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="spb_amt_sum" name="spb_sum" value="{{ $view_case->spb_sum }}" placeholder="SPB AMT Sum" readonly="" required="" style="width: 128px;">
                                    </div>
                                </div>
                                
                                
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="current_biz_sum" name="current_biz_sum" value="{{ $view_case->current_biz_sum }}" placeholder="Current Biz Sum" readonly="" required="" style="width: 128px;">
                                    </div>
                                </div>
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="proj_biz_sum" name="proj_biz_sum" value="{{ $view_case->proj_biz_sum }}" placeholder="Project Biz Sum" readonly="" required="" style="width: 128px;">
                                    </div>
                                </div>
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tot_proj_sum" name="tot_proj_sum" value="{{ $view_case->tot_proj_sum }}" placeholder="Total Project Sum" readonly="" required="" style="width: 128px;">
                                    </div>
                                </div>

                                <div class="col-sm-3 nopadding">
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
                </div>
                
                    
                <br />
                <!--end 13th row -->
                  <!--14th row -->
                  <div class="row"> 
                           <div class="col-md-12 col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon">ZM Remakrs</span>
                                <textarea class="form-control" rows="3"  readonly />{{ $view_case->zm_remarks }}</textarea>
                                
                               </div>
                            </div>
                            
                        
                </div>
                    
                <br />
                <div class="row"> 
                           <div class="col-md-4 col-lg-4">
                              <div class="input-group">
                                <span class="input-group-addon">Retention Busniess Value Verified BY ZM</span>
                                <input type="text" class="form-control" value="{{ $view_case->verified_zm }}"  readonly />
                               </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                             <div class="input-group">
                                <span class="input-group-addon">Visited / Not Visited</span>
                                <input type="text" class="form-control" value="{{ $view_case->zm_visit_no_visit }}"  readonly />
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">Last Visit Date:</span>
                                <input type="text" class="form-control" value="{{ $view_case->zm_last_visit_date ? date('d/m/Y', strtotime($view_case->zm_last_visit_date)) : '' }}"  readonly />
                                
                            </div>
                        </div>
                </div>
                <br/>
                <div class="row"> 
                           
                            <div class="col-md-4 col-lg-4">
                              <div class="input-group">
                                <span class="input-group-addon">Name:</span>
                                @foreach($zm_name as $zm_name)
                                  <input type="text" class="form-control" value="{{ $zm_name->name }}"   readonly />
                                 @endforeach
                               </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                            <div class="input-group">
                                    <span class="input-group-addon">Status:</span>
                                    @if($view_case->is_rejected_zm == 3)
                                        <input type="text" class="form-control" value="Returned"  readonly />
                                    @elseif($view_case->zmccrsid == null)
                                    <input type="text" class="form-control" value="Waiting For Approval"  readonly />
                                    @elseif($view_case->is_rejected_zm != 0)
                                    <input type="text" class="form-control" value="Rejected"  readonly />
                                    @else
                                        <input type="text" class="form-control" value="Approved"  readonly />
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">ZM Approval Date:</span>
                                <input type="text" class="form-control" value="{{ $view_case->zm_approved_date ? date('d/m/Y', strtotime($view_case->zm_approved_date)) : '' }}"  readonly />
                                
                            </div>
                           </div>
                </div>
                <br />
                <hr/>
                <div class="row"> 
                           <div class="col-md-8 col-lg-8">
                              <div class="input-group">
                                <span class="input-group-addon">NSM Remakrs</span>
                                <textarea class="form-control" rows="3"  readonly >{{ $view_case->nsm_remarks }}</textarea>
                                
                               </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                              <div class="input-group">
                                <span class="input-group-addon">Last Visit Date:</span>
                                <input type="text" class="form-control" value="{{ $view_case->nsm_last_visit_date ? date('d/m/Y', strtotime($view_case->nsm_last_visit_date)) : '' }}"  readonly />
                               </div>
                            </div>
                            
                        
                     </div>
                    
                <br />
                <div class="row"> 
                           
                            <div class="col-md-4 col-lg-4">
                              <div class="input-group">
                                <span class="input-group-addon">Name:</span>
                                @foreach($nsm_name as $nsm_name)
                                 <input type="text" class="form-control" value="{{ $nsm_name->name }}"   readonly />
                                 @endforeach
                               </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Status:</span>
                                    @if($view_case->is_rejected_nsm != 0 and $view_case->nsmccrsid != null)
                                        <input type="text" class="form-control" value="Rejected"  readonly />
                                        @elseif($view_case->is_rejected_zm != 0 )
                                    <input type="text" class="form-control" value=" "  readonly />
                                        @elseif($view_case->nsmccrsid == null)
                                        <input type="text" class="form-control" value="Waiting For Approval"  readonly />
                                        @else
                                        <input type="text" class="form-control" value="Approved"  readonly />
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                              <div class="input-group">
                                <span class="input-group-addon">NSM Approval Date:</span>
                                <input type="text" class="form-control" value="{{ $view_case->nsm_last_visit_date ? date('d/m/Y', strtotime($view_case->nsm_approved_date)) : '' }}"  readonly />
                               </div>
                            </div>
                </div>
                <br />
                <hr/>
                <h5>PM:</h5>
                @if($view_case->is_rejected_pm != 0)
                   <div class="row"> 
                           <div class="col-md-12 col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon">PM Remakrs</span>
                                <textarea class="form-control" rows="3"  readonly />{{ $view_case->pm_remarks }}</textarea>
                                
                               </div>
                            </div>
                            
                        
                     </div>
                 @endif   
                <br />
                
                <div class="row"> 
                           <!-- <div class="col-md-4 col-lg-4">
                              <div class="input-group">
                                <span class="input-group-addon">Last Visit Date:</span>
                                <input type="text" class="form-control" value="{{ $view_case->pm_last_visit_date }}"  readonly />
                               </div>
                            </div> -->
                            <div class="col-md-4 col-lg-4">
                              <div class="input-group">
                                <span class="input-group-addon">Name:</span>
                                @foreach($pm_name as $pm_name)
                                 <input type="text" class="form-control" value="{{ $pm_name->name }}"   readonly />
                                 @endforeach
                               </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="input-group">
                                <span class="input-group-addon">Status:</span>
                                @if($view_case->is_rejected_pm != 0 and $view_case->pmccrsid != null)
                                        <input type="text" class="form-control" value="Rejected"  readonly />
                                    @elseif($view_case->is_rejected_zm != 0 or $view_case->is_rejected_nsm != 0)
                                    <input type="text" class="form-control" value=" "  readonly />
                                    @elseif($view_case->pmccrsid == null)
                                    <input type="text" class="form-control" value="Waiting For Approval"  readonly />
                                    @else
                                        <input type="text" class="form-control" value="Approved"  readonly />
                                    @endif
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                              <div class="input-group">
                                <span class="input-group-addon">PM Approval Date:</span>
                                <input type="text" class="form-control" value="{{ $view_case->pm_last_visit_date ? date('d/m/Y', strtotime($view_case->pm_last_visit_date)) : '' }}"  readonly />
                               </div>
                            </div>
                </div>
                    @foreach($case_document as $case_document)
                        <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="input-group"> 
                                <a href="{{route('fm.download_documents',$case_document->id)}}" class="btn btn-outline-warning"><i class="fa fa-fw fa-download"></i>Download</a>
                            </div>
                        </div>
                        
                        </div>
                    @endforeach
              </div>
              <!-- /.box-body -->
              
              
            </div>
          </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
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
<script>
    $(function () {
        $('#users_list').DataTable({
            responsive: true,
            autoWidth: false,
            "scrollX": true,
        });
    });
</script>
<script>
 $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
</script>
@endsection