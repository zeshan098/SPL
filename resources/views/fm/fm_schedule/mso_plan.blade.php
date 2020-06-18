@extends('fm.template.admin_template')



@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">View MSO Plan</h3>
                </div>
                 
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                <!--<div class="box-body table-responsive no-padding">-->
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                               <th style="display:none"></th>
                                <th>Date</th>
                                <th>Area</th> 
                                <th>MSO ID</th> 
                                <th>Contact Point</th>
                                <th>Time</th> 
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($mso_lists as $mso_lists)
                            <tr> 
                                <td style="display:none"></td>
                                <td>{{ $mso_lists->date }}</td> 
                                <td>{{ $mso_lists->area }}</td> 
                                <td>{{ $mso_lists->mso_id }}</td> 
                                <td>{{ $mso_lists->contact_point }}</td> 
                                <td>{{ $mso_lists->time }}</td> 
                                <td>{{ $mso_lists->id }}</td>  
                                
                                
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr> 
                               <th style="display:none"></th>
                               <th>Date</th>
                                <th>Area</th> 
                                <th>MSO ID</th> 
                                <th>Contact Point</th>
                                <th>Time</th> 
                                <th>Action</th>  
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
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
        $('#users_list').DataTable({
            responsive: true,
            autoWidth: false,
            "scrollX": true,
        });
    });
</script>
 
@endsection