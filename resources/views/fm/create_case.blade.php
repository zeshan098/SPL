@extends('fm.template.admin_template')



@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<!-- Main content -->
<section class="content">
    <!--tab1 -->
    <form method="post" action="{{ url('store') }}">
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <div class="row">
        <div class="col-xs-12">
            <div class="box tab">
                <div class="box-header">
                    <h3 class="box-title">New Case</h3>
                </div>
            
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                    <label>Select Team</label>
                        <select name="team" class="form-control">
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
                            <option>Zone 1</option>
                            <option>Zone 2</option>
                        </select>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                    <label>Select District</label>
                        <select name="district" class="form-control">
                            <option>Zone 1</option>
                            <option>Zone 2</option>
                        </select>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                    <label>Select Station</label>
                        <select name="station" class="form-control">
                            <option>Zone 1</option>
                            <option>Zone 2</option>
                        </select>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6">
                         <label>Dr Name</label>
                         <input class="form-control" type="text" name="dr_name" placeholder="Doctor Name" required>
                        </div>
                        <div class="col-xs-6">
                          <label>Hospital / Institution</label>
                          <input class="form-control" type="text" name="hospital_name" placeholder="Hospital / Institution" required>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6">
                         <label>Attached Pharmacy</label>
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
                         <label>Designation</label>
                         <input class="form-control" type="text" name="dr_designation" placeholder="Designation" required>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                <div class="row">
                        <div class="col-xs-12">
                        <label class="radio-inline">
                        <input type="radio" name="salutation" value="" checked>Dr
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="salutation" value="">MO
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="salutation" value="">Consultant
                        </label>
                        
                    
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                         <label>Specify</label>
                         <input class="form-control" type="text" name="salutation_specify" placeholder="Specify">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <label class="radio-inline">
                          <input type="radio" name="ppb" value="" checked>Precriber
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="ppb" value="" >Purchaser
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="ppb" value="">Both
                        </label>
                        
                    
                    </div>
                    <div class="col-xs-4">
                    <label>Last Visit Date</label>
                      <input type="text" class="form-control pull-right datepicker"
                                   name="last_visit_date" autocomplete="off" id="datepicker">
                    </div>
                </div>
                <br>

                <div class="row">
                        <div class="col-xs-12">
                            <label class="radio-inline">
                            <input type="radio" name="case_type" onclick="javascript:yesnoCheck();"
                            id="noCheck" checked>New Case
                            </label>
                            <label class="radio-inline">
                            <input  type="radio" name="case_type" onclick="javascript:yesnoCheck();"
                             id="yesCheck">Retention
                            </label>
                        
                    
                    </div>
                </div>
                <!--retention case -->
                <div id="ifYes" style="display:none">

                    <div class="box-header with-border">
                    <h3 class="box-title">Rentention Case Details (In case of Retention)</h3>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                        <label>Comm. Biz</label>
                            <input class="form-control" type="text" name="committed_biz" placeholder="Committed Biz" required>
                        </div>
                        <div class="col-xs-4">
                        <label>Actual Biz</label>
                            <input class="form-control" type="text" name="actual_biz" placeholder="Actual Biz" required>
                        </div>
                        <div class="col-xs-4">
                        <label>SPB Amt</label>
                            <input class="form-control" type="text" name="spb_amt" placeholder="SPB Amt" required>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-xs-8">
                        <label>Committed Time (Mth)</label>
                            <input class="form-control" type="text" name="committed_time" placeholder="Committed Time (Mth)" required>
                        </div>
                        <div class="col-xs-4">
                        <label>Actual Time</label>
                            <input class="form-control" type="text" name="actual_time" placeholder="Actual Time" required>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-xs-8">
                        <label>Cost of Activity (%)</label>
                            <input class="form-control" type="text" name="coa" placeholder="Cost of Activity (%)" required>
                        </div>
                        <div class="col-xs-4">
                        <label>Success (%)</label>
                            <input class="form-control" type="text" name="success" placeholder="Success (%)" required>
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
                    <label>Activity Name</label>
                      <input class="form-control" type="text" name="activity_name" placeholder="Activity Name" required>
                </div>
            </div>
            <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6">
                         <label>YTD SPB Success Rate (%)</label>
                         <input class="form-control" type="text" name="ytd_spb_rate" placeholder="YTD SPB Success Rate (%)" required>
                        </div>
                        <div class="col-xs-6">
                          <label>YTD Sale</label>
                          <input class="form-control" type="text" name="ytd_Sale" placeholder="YTD Sale" required>
                        </div>
                    </div>
                </div>
                
            
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6">
                         <label>YTD SPB C.Y</label>
                         <input class="form-control" type="text" name="ytd_spb_c_y" placeholder="YTD SPB C.Y" required>
                        </div>
                        <div class="col-xs-6">
                          <label>YTD SPB Ratio</label>
                          <input class="form-control" type="text" name="ytd_ratio" placeholder="YTD SPB Ratio" required>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6">
                         <label>Duration (Month)</label>
                         <input class="form-control" type="text" name="duration_month" placeholder="Duration" required>
                        </div>
                        <div class="col-xs-6">
                          <label>Total Cost of Activity</label>
                          <input class="form-control" type="text" name="t_coa" placeholder="Total Cost of Activity" required>
                        </div>
                    </div>
                </div>

                <!-- <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6">
                           <div class="form-group">
                                <label>Start Date</label>

                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                   <input type="text" class="form-control pull-right datepicker"
                                   name="start_date" autocomplete="off" id="datepicker">
                                </div>
                                
                            </div>
                         </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>End Date</label>

                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                   <input type="text" class="form-control pull-right datepicker"
                                   name="end_date" autocomplete="off" id="datepicker">
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="box-body">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                    
                    <div id="education_fields">
                            
                            </div>
                        <div class="col-sm-2 nopadding">
                    <div class="form-group">
                        <input type="text" class="form-control" id="product" name="product[]" value="" placeholder="Product" required>
                    </div>
                    </div>
                    <div class="col-sm-2 nopadding">
                    <div class="form-group">
                        <input type="text" class="form-control" id="spb_amt" name="spb_amt[]" value="" placeholder="SPB AMT" required>
                    </div>
                    </div>
                    <div class="col-sm-2 nopadding">
                    <div class="form-group">
                        <input type="text" class="form-control" id="current_biz" name="current_biz[]" value="" placeholder="Current Biz" required>
                    </div>
                    </div>
                    <div class="col-sm-2 nopadding">
                    <div class="form-group">
                        <input type="text" class="form-control" id="proj_biz" name="proj_biz[]" value="" placeholder="Project Biz" required>
                    </div>
                    </div>
                    <div class="col-sm-2 nopadding">
                    <div class="form-group">
                        <input type="text" class="form-control" id="tot_proj" name="tot_proj[]" value="" placeholder="Total Project" required>
                    </div>
                    </div>

                    <div class="col-sm-2 nopadding">
                    <div class="form-group">
                        <div class="input-group">
                        <input type="text" class="form-control" id="tt_coa" name="cost_of_activity[]" value="" placeholder="Cost Of Activity">
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


                
                
            </div>
            
        </div>
        <!-- /.col -->
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!--end tab2 -->
    <!-- /.row -->
    <div style="">
        <div style="">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>

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
    }
    else document.getElementById('ifYes').style.display = 'none';

}
</script>

<script>
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-2 nopadding"><div class="form-group"> <input type="text" class="form-control" id="product" name="product[]" value="" placeholder="Product"></div></div><div class="col-sm-2 nopadding"><div class="form-group"> <input type="text" class="form-control" id="spb_amt" name="spb_amt[]" value="" placeholder="SPB AMT"></div></div><div class="col-sm-2 nopadding"><div class="form-group"> <input type="text" class="form-control" id="current_biz" name="current_biz[]" value="" placeholder="Current Biz"></div></div><div class="col-sm-2 nopadding"><div class="form-group"> <input type="text" class="form-control" id="proj_biz" name="proj_biz[]" value="" placeholder="Project Biz"></div></div><div class="col-sm-2 nopadding"><div class="form-group"> <input type="text" class="form-control" id="tot_proj" name="tot_proj[]" value="" placeholder="Total Project"></div></div><div class="col-sm-2 nopadding"><div class="form-group"><div class="input-group"> <input type="text" class="form-control" id="tt_coa" name="cost_of_activity[]" placeholder="Cost Of Activity"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>

@endsection