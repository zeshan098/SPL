@extends('pm.template.admin_template')



@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">CaseID: {{ $case_view->team}}-{{$case_view->district }}-{{ $case_view->id }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post"  onsubmit="return confirm('Do you really want to submit the form?');" action="{{ route('pm.update', $case_view->id) }}">
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
                <div class="form-group" style="display:none">
                  <label>Remarks</label>
                  <textarea class="form-control" rows="3" name="pm_remarks" placeholder="Enter ..." ></textarea>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-12">
                      <label class="radio-inline">
                        <input type="radio" name="tab"  value="2" checked>FM/ZM
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="tab"  value="3">Other
                      </label> 


                    </div>
                  </div>
                </div>
                <div class="form-group desc" id="Cars2" >
                  <label>Payment Person</label>
                    <select name="payment_person" class="form-control" onchange="myFunction(event)"  Required>
                  <!-- <option disabled selected>Choose Payment Person</option> -->
                  
                  <option value="{{$case_view->payment_person}}">{{$case_view->payment_person}}</option> 
                    @foreach($fm_staff_name as $fm_staff_name)
                      <option value="{{$fm_staff_name->name}}">{{$fm_staff_name->name}}</option> 
                      @endforeach 
                      @foreach($zm_staff_name as $zm_staff_name)
                      <option value="{{$zm_staff_name->name}}">{{$zm_staff_name->name}}</option> 
                      @endforeach  

                    </select>
                </div>
                <div class="form-group desc" id="Cars3" style="display: none;">
                  <label for="Dr Name">Payment Person</label>
                  <input type="text" id="myText" class="form-control" value="{{$case_view->payment_person}}" id="exampleInputPassword1" name="payment_person"  placeholder="Payment Person" />
                </div>
                <div class="form-group">
                  <label for="Dr Name">Case Amount</label>
                  <input type="text" class="form-control" id="exampleInputPassword1"  value="{{$case_view->spb_sum}}" placeholder="Payment Person" />
                </div>
                <div class="form-group">
                  <label for="Dr Name">Approved Amount</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="approved_amount" value="{{$case_view->spb_sum}}" placeholder="Payment Person" />
                </div>
                <div class="form-group">
                  <label>Remarks</label>
                  <textarea class="form-control rejected" id="message" rows="3" name="pm_remarks" placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group" style="display:none">
                  <label for="Dr Name">Case Reference Number</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="reference_number" value="{{ $case_view->team }}-{{ $case_view->zone }}-{{ $case_view->id }}" placeholder="Payment Person" readonly />
                </div>
                <div class="form-group" style="display:none">
                  <label>Last Visit Date</label>
                  <input class="form-control" name="pm_last_visit_date" placeholder="None" value="{{$case_view->pm_last_visit_date}}" Readonly />
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="rejected" id="rejected" value="1" class="btn btn-danger">Reject</button>
                <button type="submit" name="approved" value="1" class="btn btn-success">Approved</button>
                <a href="{{route('pm.view_case',$case_view->id)}}" class="btn btn-primary">View Case</a>
                <a href="{{route('pm.generate-pdf',$case_view->id)}}" class="btn btn-primary">PDF View Case</a>
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
<script>
    $(function () {
        $('#users_list').DataTable();
    });
</script>
<script>
$(document).ready(function() {
    $("input[name$='tab']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#Cars" + test).show();
    });
});
</script>
<script>
function myFunction(e) {
    document.getElementById("myText").value = e.target.value
}
</script>

<script>
$('#rejected').click(function(e){
if ( $('#message').val() != '')
    {
        // alert('success');
        console.log("Done");
    }
    else
    {
        alert('Remarks are required for rejection');
        return false;
    }
});
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
@endsection