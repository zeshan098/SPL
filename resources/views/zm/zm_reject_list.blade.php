@extends('zm.template.admin_template')



@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Rejected / Returned Cases</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                <!--<div class="box-body table-responsive no-padding">-->
                    <table id="users_list" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               <th style="display:none"></th>
                                <th>CaseID</th>
                                <th>FMCCRSID</th>
                                <th>Team</th>
                                <th>Station</th>
                                <th>Dr Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($zm_case_record as $case_record)
                            <tr>
                                <td style="display:none">YYYY/mm/dd</td>
                                <td>{{ $case_record->team }}-{{ $case_record->district }}-{{ $case_record->id }}</td>
                                <td>{{ $case_record->fmccrsid }}</td>
                                <td>{{ $case_record->team }}</td>
                                <td>{{ $case_record->station }}</td>
                                <td>{{ $case_record->dr_name }}</td>
                                @if($case_record->is_rejected_zm == '3')
                                <td> Returned </td>
                                @else
                                <td> Rejected </td>
                                @endif
                                <td><a href="{{route('zm.view_case',$case_record->id)}}">View Case</a> | <a href="{{route('zm.generate-pdf',$case_record->id)}}">PDF</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th style="display:none"></th>
                                <th>CaseID</th>
                                <th>FMCCRSID</th>
                                <th>Team</th>
                                <th>Station</th>
                                <th>Dr Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot> -->
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