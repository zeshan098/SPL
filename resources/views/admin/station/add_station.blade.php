@extends('admin.template.admin_template')



@section('content')
<?php
//dd(\Route::current()->getName());
//dd($controller_name.' --- '.$action_name);
?>
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/selecter/select2.min.css") }}">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Station Detail</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('admin/add_station') }}" method="post">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="box-body">
                     
                    <div class="form-group">
                        <label for="email">Station ID</label>
                        <input type="text" class="form-control" name="station_id" id="description"  required="">
                    </div>
                    <div class="form-group">
                        <label for="password">Station</label>
                        <input type="text" class="form-control" name="station" id="station"  required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Station Code</label>
                        <input type="text" class="form-control" name="station_code" id="station_code"   required="">
                    </div>
                     
                     
                    <div class="form-group">
                        <label for="contact">Teritory Code</label>
                        <input type="text" class="form-control" name="teritory_code" id="teritory_code" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Sale Seq</label>
                        <input type="text" class="form-control" name="sale_seq" id="sale_seq" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Order Seq MSO</label>
                        <input type="text" class="form-control" name="order_seq_mso_hiraracy" id="order_seq_mso_hiraracy" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Province</label>
                        <input type="text" class="form-control" name="province" id="province" required="">
                    </div>
                     
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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
<!--selectjs-->
<script src="{{ asset("bower_components/selecter/select2.full.min.js") }}"></script>
<!-- page script -->
<script>
$(function () {
    $('#users_list').DataTable();
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
<script>
$(function () {
    
    //Initialize Select2 Elements
    $('.select2').select2()

   
  })

</script>
@endsection