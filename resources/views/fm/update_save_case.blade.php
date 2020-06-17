@extends('fm.template.admin_template')



@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<!-- Main content -->
<section class="content main_calculations">
    <!--tab1 -->
    <form method="post" action="{{ route('fm.update', $view_case->id) }}" >
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="row">
            <div class="col-xs-12">
                <div class="box tab">
                    <div class="box-header">
                        <h3 class="box-title">Update Case</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Select Team</label>
                            <select name="team" class="form-control" required>
                            <option value="{{$view_case->team}}">{{$view_case->team}}</option>
                                @foreach(explode(",", $case->team) as $key => $value)
                                <option value="{{$value}}">{{$value}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Select Zone</label>
                            <select name="zone" class="form-control">
                            <option value="{{$view_case->zone}}">{{$view_case->zone}}</option>
                                @foreach(explode(",", $case->zone) as $key => $value)
                                <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Select District</label>
                            <select name="district" class="form-control">
                            <option value="{{$view_case->district}}">{{$view_case->district}}</option>
                                @foreach(explode(",", $case->district) as $key => $value)
                                <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Select Station</label>
                            <select name="station" class="form-control">
                            <option value="{{$view_case->station}}">{{$view_case->station}}</option>
                                @foreach(explode(",", $case->station) as $key => $value)
                                <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Dr Name</label>
                                <input class="form-control" type="text" name="dr_name"  value="{{$view_case->dr_name}}">
                            </div>
                            <div class="col-xs-6">
                                <label>Hospital / Institution</label>
                                <input class="form-control" type="text" name="hospital_name" value="{{$view_case->hospital_name}}" >
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Dr Address</label>
                                <input class="form-control" type="text" name="dr_address" value="{{$view_case->dr_address}}">
                            </div>
                            <div class="col-xs-6">
                                <label>Dr Contact Number</label>
                                <input class="form-control" type="text" name="dr_contact_number" value="{{$view_case->dr_contact_number}}">
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Attached Pharmacy</label>
                                <input class="form-control" type="text" name="pharmacy_name" value="{{$view_case->pharmacy_name}}">
                            </div>
                            <div class="col-xs-6">
                                <label>Discount Details (If any)</label>
                                <input class="form-control" type="text" name="discount_details" value="{{$view_case->discount_details}}">
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Designation</label>
                                <input class="form-control" type="text" name="dr_designation" value="{{$view_case->dr_designation}}">
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="radio-inline">
                                    <input type="radio" name="salutation" value="GP" {{ ($view_case->salutation=="GP")? "checked" : ""}} onclick="show1();" >GP
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="salutation" value="MO" {{ ($view_case->salutation=="MO")? "checked" : ""}} onclick="show1();">MO
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="salutation" value="Consultant" {{ ($view_case->salutation=="Consultant")? "checked" : ""}} onclick="show2();">Consultant
                                </label>


                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row" id="div1" >
                                <div class="col-xs-12">
                                    <label>Specify Specialty</label>
                                    <input class="form-control" type="text" value="{{$view_case->salutation_specify}}" name="salutation_specify" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <label class="radio-inline">
                                    <input type="radio" name="ppb" value="Prescriber" {{ ($view_case->ppb=="Prescriber")? "checked" : "" }} >Prescriber
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="ppb" value="Purchaser"  {{ ($view_case->ppb=="Purchaser")? "checked" : "" }}>Purchaser
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="ppb" value="Both" {{ ($view_case->ppb=="Both")? "checked" : "" }} >Both
                                </label>


                            </div>
                            <div class="col-xs-4">
                                <label>Last Visit Date</label>
                                <input type="text" class="form-control pull-right datepicker"
                                       name="last_visit_date" value="{{$view_case->last_visit_date}}" autocomplete="off" id="datepicker" required>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-xs-12">
                                <label class="radio-inline">
                                    <input type="radio" name="case_type" onclick="javascript:yesnoCheck();"
                                           id="noCheck" value='new' {{ ($view_case->case_type=="new")? "checked" : "" }}>New Case
                                </label>
                                <label class="radio-inline">
                                    <input  type="radio" name="case_type" onclick="javascript:yesnoCheck();"
                                            id="yesCheck" value='retention' {{ ($view_case->case_type=="retention")? "checked" : "" }}>Retention
                                </label>


                            </div>
                        </div>
                        <!--retention case -->
                        <div id="ifYes" >

                            <div class="box-header with-border">
                                <h3 class="box-title">Rentention Case Details (In case of Retention)</h3>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label>Comm. Biz</label>
                                    <input class="form-control" id="comm_biz" type="text" name="committed_biz" value="{{$view_case->committed_biz}}">
                                </div>
                                
                                <div class="col-xs-4">
                                    <label>Actual Biz</label>
                                    <input class="form-control" id="actual_biz" type="text" name="actual_biz" value="{{$view_case->actual_biz}}">
                                </div>
                                <div class="col-xs-4">
                                    <label>SPB Amt</label>
                                    <input class="form-control" id="spb_amt" type="text" name="spb_amount" value="{{$view_case->spb_amt}}">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-xs-8">
                                    <label>Committed Time (Mth)</label>
                                    <input class="form-control" type="text" name="committed_time" value="{{$view_case->committed_time}}">
                                </div>
                                <div class="col-xs-4">
                                    <label>Actual Time</label>
                                    <input class="form-control" type="text" name="actual_time" value="{{$view_case->actual_time}}">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-xs-8">
                                    <label>Cost of Activity (%)</label>
                                    <input class="form-control" id="coa_per" type="text" name="coa" value="{{$view_case->coa}}" readonly>
                                </div>
                                <div class="col-xs-4">
                                    <label>Success (%)</label>
                                    <input class="form-control" id="success_per" type="text" name="success" value="{{$view_case->success}}" readonly>
                                </div>
                            </div>
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
                            <option value="{{$view_case->activity_name}}">{{$view_case->activity_name}}</option>
                            <option value="">Select Activity Name</option>
                                @foreach($activity_names as $activity_name)
                                <option value="{{$activity_name->activity_name}}">{{$activity_name->activity_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label>Activity Name</label>
                            <input class="form-control" type="text" name="activity_name" placeholder="Activity Name" required>
                        </div> -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-body">
                        <div class="row">
                            <!-- <div class="col-xs-6" style="display:none">
                                <label>YTD SPB Success Rate (%)</label>
                                <input class="form-control" type="text" name="ytd_spb_rate" value="0" value="{{$view_case->ytd_spb_rate}}">
                            </div> -->
                            <div class="col-xs-12">
                                <label>YTD Sale</label>
                                <input class="form-control" id="ytd_Sale" type="text" name="ytd_Sale" value="{{$view_case->ytd_sale}}">
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>YTD SPB C.Y</label>
                                <input class="form-control" type="text" id="ytd_spb_c_y" name="ytd_spb_c_y" value="{{$view_case->ytd_spb_c_y}}">
                            </div>
                            <div class="col-xs-6">
                                <label>YTD SPB Ratio</label>
                                <input class="form-control" type="text" id="ytd_ratio" name="ytd_ratio" value="{{$view_case->ytd_ratio}}" readonly >
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Duration (Month)</label>
                                <input class="form-control" type="text" id="duration_month" name="duration_month" value="{{$view_case->duration_month}}">
                            </div>
                            <div class="col-xs-6">
                                <label>Total Cost of Activity</label>
                                <input class="form-control" type="text" id="t_coa" name="t_coa" value="{{$view_case->t_coa}}" readonly />
                            </div>
                        </div>
                    </div>

                    
                    <div class="box-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            @foreach($view_case_product as $case_product)
                                <div id="education_fields">
                                    <div class="grouped_entities">
                                        <div class="col-sm-2 nopadding">
                                            <div class="form-group">
                                            <label>Product Name</label>
                                            <select  id="product" name="product[]" class="form-control product" required>
                                                <option value="{{ $case_product->product }}">{{ $case_product->product }}</option>
                                            </select>
                                                <!-- <input type="text" class="form-control" id="product" name="product[]" value="" placeholder="Product" required> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-2 nopadding">
                                            <div class="form-group">
                                            <label>SPB Amount</label>
                                                <input type="text" class="form-control spb_amt_sum" id="spb_amt" name="spb_amt[]" value="{{ $case_product->spb_amt }}"  >
                                            </div>
                                        </div>
                                        <div class="col-sm-2 nopadding">
                                            <div class="form-group">
                                            <label>Current Biz / Month</label>
                                                <input type="text" class="form-control current_biz" id="current_biz" name="current_biz[]" value="{{ $case_product->current_biz }}"  >
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-2 nopadding">
                                            <div class="form-group">
                                            <label>Projected Biz / Month</label>
                                                <input type="text" class="form-control proj_biz" id="proj_biz" name="proj_biz[]" value="{{ $case_product->proj_biz }}" >
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-2 nopadding">
                                            <div class="form-group">
                                            <label>Total Biz per Month</label>
                                                <input type="text" class="form-control tot_proj" id="tot_proj" name="tot_proj[]" value="{{ $case_product->tot_proj }}" readonly >
                                            </div>
                                        </div>

                                        <div class="col-sm-2 nopadding">
                                            <div class="form-group">
                                                <label>Product COA</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control tt_coa" id="tt_coa" name="cost_of_activity[]" readonly value="{{ $case_product->cost_of_activity }}" >
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success" type="button"  onclick="education_fields(this);"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>                              
                                @endforeach
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
                                    <h4>Total Value:</h4>
                                    </div>
                                </div>
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="spb_amt_sum" name="spb_sum" value="{{$view_case->spb_sum}}" readonly required>
                                    </div>
                                </div>
                                
                                
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="current_biz_sum" name="current_biz_sum" value="{{$view_case->current_biz_sum}}" readonly required>
                                    </div>
                                </div>
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="proj_biz_sum" name="proj_biz_sum"  value="{{$view_case->proj_biz_sum}}" readonly required>
                                    </div>
                                </div>
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tot_proj_sum" name="tot_proj_sum" value="{{$view_case->tot_proj_sum}}" readonly required>
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




                </div>

            </div>
            <!-- /.col -->
        </div>
        <button type="submit" name="update" value="1" class="btn btn-primary">Submit</button>
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
                $("#success_per").val(success_per.toFixed(2));
            }
        });
        $("#actual_biz").change(function(){
            if($.trim($("#comm_biz").val()) != "" && $.trim($("#actual_biz").val()) != ""){
                var A = parseFloat($("#actual_biz").val());
                var C = parseFloat($("#comm_biz").val());
                var success_per = (A/C)*100;
                $("#success_per").val(success_per.toFixed(2));
            }

            if($.trim($("#spb_amt").val()) != "" && $.trim($("#actual_biz").val()) != ""){
                var A = parseFloat($("#actual_biz").val());
                var B = parseFloat($("#spb_amt").val());
                var coa_per = (B/A)*100;
                $("#coa_per").val(coa_per.toFixed(2));
            }
        });
        $("#spb_amt").change(function(){
            if($.trim($("#spb_amt").val()) != "" && $.trim($("#actual_biz").val()) != ""){
                var A = parseFloat($("#actual_biz").val());
                var B = parseFloat($("#spb_amt").val());
                var coa_per = (B/A)*100;
                $("#coa_per").val(coa_per.toFixed(2));
            }
        });
        $("#ytd_Sale, #ytd_spb_c_y").change(function(){
            if($.trim($("#ytd_Sale").val()) != "" && $.trim($("#ytd_spb_c_y").val()) != ""){
                var A = parseFloat($("#ytd_Sale").val());
                var B = parseFloat($("#ytd_spb_c_y").val());
                var ytd_ratio = (B/A)*100;
                $("#ytd_ratio").val(ytd_ratio.toFixed(2));
            }
        });
        $("#duration_month").keyup(function(){
            $(".proj_biz").trigger("change");
        });
    });
    //Main 1st
    //main_calculations
    $(".main_calculations").delegate( '.spb_amt_sum', "keyup", function(){
        var spb_amt_sum = 0;
        $(".spb_amt_sum").each(function(){
            var current_val = 0;
            if($.trim($(this).val()) != ""){
                current_val = $(this).val();
            }
            spb_amt_sum += parseFloat(current_val);
        });
        $("#spb_amt_sum").val(spb_amt_sum.toFixed(2));
        $("#spb_amt_sum").trigger("change");
    });
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
        $("#current_biz_sum").val(current_biz_TP_sum.toFixed(2));
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
            thisVar.closest(".grouped_entities").find(".tot_proj").val(TotProj.toFixed(2));
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
        $("#tot_proj_sum").val(TCA.toFixed(2));
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
        $("#proj_biz_sum").val(proj_biz_TP_sum.toFixed(2));
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
                cost_of_activity = 0.00;
            }
            // console.log(cost_of_activity);
            $(this).closest(".grouped_entities").find(".tt_coa").val(cost_of_activity.toFixed(2));
            
            
        });
        
    }


    $(".main_calculations").delegate("#spb_amt_sum, #tot_proj_sum", "change", function(){
        if($("#spb_amt_sum").val() != "" && $("#tot_proj_sum").val() != "" && $("#tot_proj_sum").val() != 0){
            var SUM = parseFloat($("#spb_amt_sum").val());
            var TCA = parseFloat($("#tot_proj_sum").val());
            var t_coa = parseFloat((SUM/TCA)*100);
            $("#t_coa").val(t_coa.toFixed(2));
        }else{
            $("#t_coa").val(0.00);
        }
    });

</script>
<script>
//Date picker

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
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
                                <label>Product Name</label>
                                    <select  id="product" name="product[]" class="form-control product" required>
                                      
                                        <option value="">Select Product</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group"> 
                                <label>SPB Amount</label>
                                    <input type="text" class="form-control spb_amt_sum" id="spb_amt" name="spb_amt[]" value="" placeholder="SPB AMT">
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group">
                                <label>Current Biz / Month</label>
                                    <input type="text" class="form-control current_biz" id="current_biz" name="current_biz[]" value="" placeholder="Current Biz">
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group"> 
                                <label>Projected Biz / Month</label>
                                    <input type="text" class="form-control proj_biz" id="proj_biz" name="proj_biz[]" value="" placeholder="Project Biz">
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group">
                                <label>Total Biz per Month</label>
                                    <input type="text" class="form-control tot_proj" id="tot_proj" name="tot_proj[]" value="" readonly placeholder="Total Project">
                                </div>
                            </div>
                            <div class="col-sm-2 nopadding">
                                <div class="form-group">
                                <label>Product COA</label>
                                    <div class="input-group"> 
                                        <input type="text" class="form-control tt_coa" id="tt_coa" name="cost_of_activity[]" readonly placeholder="Cost Of Activity">
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
<script>
function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}
</script>
@endsection