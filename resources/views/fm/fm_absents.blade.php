@extends('fm.template.admin_template')



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
                   <h3 class="box-title">Add Absents Record</h3>
                </div>
                <!-- /.box-header -->
                <!-- <div class="row">
                    <div class="col-xs-12"> -->
                        <div class="box">
                            <!-- <div class="box-header">
                                <h3 class="box-title">Case Lists</h3>
                            </div> -->
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                            <!--<div class="box-body table-responsive no-padding">-->
                                <table id="users_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th style="display:none"></th>
                                            <th>From Date</th>
                                            <th>To Date</th> 
                                            <th>CCRSID</th>
                                            <th>Assign CCRSID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fm_absent_record as $fm_absent_record)
                                        <tr>
                                            <td style="display:none">YYYY/mm/dd</td>
                                            <td>{{ $fm_absent_record->from_date }}</td>
                                            <td>{{ $fm_absent_record->to_date }}</td> 
                                            <td>{{ $fm_absent_record->absent_ccrsid }}</td>
                                            <td>{{ $fm_absent_record->assign_ccrsid }}</td>
                                            
                                        </tr>
                                    @endforeach
                                    </tbody> 
                                </table>
                            </div>
                            <!-- /.box-body -->
                        <!-- </div> -->
                        <!-- /.box -->
                    <!-- </div> -->
                <!-- form start -->
                <form method="post" action="{{ route('fm.fm_absents') }}">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="Team">Team:</label>
                            <select name="assign_ccrsid" class="form-control" required>
                                    <option value="">Select Team</option>
                                    @foreach ($values as $value) {
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach

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
<!--<script src="/bower_components/admin-lte/dist/js/adminlte.min.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("bower_components/admin-lte/dist/js/demo.js") }}"></script>
<!-- page script -->
<script src="{{ asset("bower_components/datepicker/bootstrap-datepicker.min.js") }}"></script>
<script src="{{ asset("bower_components/datepicker/daterangepicker.js") }}"></script>
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