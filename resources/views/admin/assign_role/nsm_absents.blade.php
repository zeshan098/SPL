@extends('admin.template.admin_template')



@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/selecter/select2.min.css") }}">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                   <h3 class="box-title">Add Absents Record</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="{{ url('admin/fm_absent') }}">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="box-body">
                       <div class="form-group">
                            <label for="Team">Team:</label>
                            <select name="absent_ccrsid" class="form-control select2" required>
                                    <option value="">Select NSM</option>
                                    @foreach ($nsm_escalation_record as $nsm_escalation_record) {
                                        <option value="{{ $nsm_escalation_record->nsmccrsid }}">{{ $nsm_escalation_record->nsmccrsid }}</option>
                                    @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Team">Team:</label>
                            <select name="assign_ccrsid" id="DropDownList" class="form-control select2" required>
                                     
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="Station">From:</label>
                        <input type="text" class="form-control pull-right datepicker"
                                        name="from_date" autocomplete="off" id="datepicker" required>
                        </div>
                        <div class="form-group">
                        <label for="Dr Name">To:</label>
                        <input type="text" class="form-control datepicker" name="to_date" id="exampleInputPassword1" value=" "  >
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" value="submit" class="btn btn-danger">Submit</button> 
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

<!-- AdminLTE for demo purposes -->
<script src="{{ asset("bower_components/admin-lte/dist/js/demo.js") }}"></script>
<!-- page script -->
<script src="{{ asset("bower_components/datepicker/bootstrap-datepicker.min.js") }}"></script>
<script src="{{ asset("bower_components/datepicker/daterangepicker.js") }}"></script>
<script src="{{ asset("bower_components/selecter/select2.full.min.js") }}"></script>
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
    
    //Initialize Select2 Elements
    $('.select2').select2()

   
  })

</script>
<script type="text/javascript">
$("select[name='absent_ccrsid']").on('change', function(){
      var nsm_ccrsid = $(this).val();
      console.log(nsm_ccrsid);
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo url('admin/find_Zm') ?>",
          method: 'POST',
          data: {nsm_ccrsid:nsm_ccrsid, _token:token},
          success: function(data) {
            // console.log(data.specify_specialty);
            $("#DropDownList").each(function(){
                $(this).find('option').remove();
            });
            $.each(data, function(i, item) {
                // $('.specify').append("<option value='"+item.specify_specialty+"' >"+item.specify_specialty+"</option>");
            console.log(item.zmccrsid);
            var x = item.zmccrsid;
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