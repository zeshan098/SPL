@extends('admin.template.admin_template')



@section('content')
<?php
//dd(\Route::current()->getName());
//dd($controller_name.' --- '.$action_name);
?>
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Item Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('admin/add_item') }}" method="post">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="box-body">
                    <div class="form-group">
                        <label for="first_name">Item Code</label>
                        <input type="text" class="form-control" name="item_code" id="item_code" placeholder="item_code" required="">
                    </div>
                    
                    <div class="form-group">
                        <label for="ccrsid">Item Name</label>
                        <input type="text" class="form-control" name="item_name" id="item_name" placeholder="item_name" required="">
                    </div>
                    <div class="form-group">
                        <label for="email">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="description" required="">
                    </div>
                    <div class="form-group">
                        <label for="password">Sale Price</label>
                        <input type="text" class="form-control" name="sale_price" id="sale_price" placeholder="sale_price" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">MRP</label>
                        <input type="text" class="form-control" name="mrp" id="mrp" placeholder="mrp" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Finish Item Code</label>
                        <input type="text" class="form-control" name="finish_item_code" id="finish_item_code" placeholder="finish_item_code" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Lock YN</label>
                        <input type="text" class="form-control" name="lock_yn" id="lock_yn" placeholder="lock_yn" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Brand Type Code</label>
                        <input type="text" class="form-control" name="brand_type_code" id="brand_type_code" placeholder="brand_type_code" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Shipper QTY</label>
                        <input type="text" class="form-control" name="shipper_qty" id="shipper_qty" placeholder="shipper_qty" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Register #</label>
                        <input type="text" class="form-control" name="reg_no" id="reg_no" placeholder="reg_no" required="">
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
@endsection