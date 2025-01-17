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
                <h3 class="box-title">Add User Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('register') }}" method="post">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="box-body">
                    <div class="form-group">
                        <label for="first_name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="">
                    </div>
                    
                    <div class="form-group">
                        <label for="ccrsid">CCRSID</label>
                        <input type="text" class="form-control" name="ccrsid" id="ccrsid" placeholder="CCRSID" required="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" required="">
                    </div>
                    <div class="form-group">
                        <label>Select</label>
                        <select class="form-control" name="role" required="">
                            <option value="fm">Field Manager</option>
                            <option value="zm">Zone Manager</option>
                            <option value="nsm">National Sales Manager</option>
                            <option value="csm">Country Sales Manager</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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

@endsection