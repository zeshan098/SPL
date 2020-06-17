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
                <h3 class="box-title">Add Item Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('admin/item_team')}}" method="post">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="box-body">
                    <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                            <label for="first_name">Item list</label>
                            <select name="item_code" class="form-control select2" style="width: 100%;" required>
                                <option value="">Select Item</option>
                                    @foreach($item_list as $item_list)
                                    <option value="{{$item_list->item_code}}">{{$item_list->item_code}}</option>
                                    @endforeach
                                </option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                            <label for="ccrsid">Team Name</label>
                            <select name="team_id" class="form-control"  required>
                                    <option value="">Select Team</option>
                                        @foreach($team_list as $team_list)
                                        <option value="{{$team_list->id}}">{{$team_list->team_code}}</option>
                                        @endforeach
                                   </option>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Year ID</label>
                        <input type="text" class="form-control" name="year_id" id="description"  required="">
                    </div>
                    <div class="form-group">
                        <label for="password">Item Code PS</label>
                        <input type="text" class="form-control" name="item_code_ps" id="sale_price"  required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Product Family</label>
                        <input type="text" class="form-control" name="product_family" id="product_family"   required="">
                    </div>
                     
                     
                    <div class="form-group">
                        <label for="contact">Item Seq No</label>
                        <input type="text" class="form-control" name="item_seq_no" id="item_seq_no" required="">
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