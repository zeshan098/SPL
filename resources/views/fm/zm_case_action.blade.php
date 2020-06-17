@extends('fm.template.admin_template')



@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/selecter/select2.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">CaseID: {{ $case_view->team}}-{{$case_view->district }}-{{$case_view->id}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" onsubmit="return confirm('Do you really want to submit the form?');" action="{{ route('fm.update_zm_case', $case_view->id) }}" id="id_frm">
              <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
              <div class="box-body">
                <div class="form-group">
                  <label for="Team">Team</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="{{$case_view->team}}" placeholder="Team" Readonly>
                </div>
                <div class="form-group">
                  <label for="Station">Station</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" value="{{$case_view->station}}" placeholder="Station" Readonly>
                </div>
                <div class="form-group">
                  <label for="Dr Name">Dr Name</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" value="{{$case_view->dr_name}}" placeholder="Dr Name" Readonly>
                </div>
                @if($case_view->case_type == 'retention')
                <div class="form-group">
                  <label for="Dr Name">Retention Busniess Value Verified by ZM</label>
                  <input type="text" class="form-control" id=""   name="verified_zm">
                </div>
                @endif
                <div class="form-group">
                  <label>Remarks</label>
                  <textarea class="form-control" rows="3" name="zm_remarks" placeholder="Enter ..." Required></textarea>
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <label class="radio-inline">
                      <input type="radio" name="zm_visit_no_visit" onclick="show2();"
                                           id="noCheck" value='Visited' >Visit
                      </label>
                      <label class="radio-inline">
                        <input  type="radio" name="zm_visit_no_visit" onclick="show1();"
                                            id="yesCheck" value='Non_visited' checked>No Visit
                      </label>
                      <div class="form-group" id="div1">
                        <label>Last Visit Date</label>
                        <!-- <input class="form-control" name="zm_last_visit_date"   value="{{$case_view->zm_last_visit_date}}" Readonly /> -->
                        <input type="text" class="form-control pull-right datepicker"
                                            name="zm_last_visit_date" value='' autocomplete="off" id="datepicker">
                                             
                      </div>

                  </div>
                  <div class="col-xs-6">
                    <label class="checkbox-inline">
                      <input type="checkbox" name="checkbox" id="checkbox" />Accompanied By:
                    </label>
                    <br /><br />
                    <div class="drop">
                    <select id="showthis" name="accompanied_person_zm[]" data-placeholder="Select Designation" class="form-control select2" multiple="multiple" style="width: 100%;">
                      <option value="FM">FM</option>
                      <option value="ZM">ZM</option>
                      <option value="NSM">NSM</option>
                      <option value="PM">PM</option>
                                         
                    </select>
                    </div>
                    <!-- <input id="showthis" class="form-control" name="accompanied_person_zm" size="50" type="text" placeholder="Person Name" /> -->
                  </div>
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="rejected" value="1" class="btn btn-danger">Reject</button>
                <button type="submit" name="approved" value="1" class="btn btn-success">Approved</button>
                <a href="{{route('fm.view_case',$case_view->id)}}" class="btn btn-primary">View Case</a>
                <a href="{{route('fm.generate-pdf',$case_view->id)}}" class="btn btn-primary">PDF View Case</a>
              </div>
            </form>
          </div>
          <!-- /.box -->



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
<script src="{{ asset("bower_components/datepicker/bootstrap-datepicker.min.js") }}"></script>
<script src="{{ asset("bower_components/datepicker/daterangepicker.js") }}"></script>
<!--selectjs-->
<script src="{{ asset("bower_components/selecter/select2.full.min.js") }}"></script>
<script>
    $(function () {
        $('#users_list').DataTable();
    });
</script>
<script>
//Date picker

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight:'TRUE',
        startDate: '-0d',
        autoclose: true,
    })
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
$(function (){
  document.getElementById('div1').style.display ='none';
});
function show1(){
  document.getElementById('div1').style.display ='none';
      
}
function show2(){
  document.getElementById('div1').style.display = 'block';
      
}
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
$(function () {
    
    //Initialize Select2 Elements
    $('.select2').select2()

   
  })

</script>
@endsection