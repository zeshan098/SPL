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
                    <h3 class="box-title">MSO Monthly Plan Report</h3>
                </div>
                <form method="POST" action="{{ url('fm/generate_plan_pdf') }}" class="form">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="box-body" style="display:none">
                
                    <div class="form-group">
                        <label for="first_name">Select MSO:</label>
                        <input type="text" class="form-control pull-right datepicker"
                                       name="mso_id" value="{{$mso_id}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="first_name">From Date:</label>
                        <input type="text" class="form-control pull-right datepicker"
                                       name="from_date" value="{{$from_date}}">
                    </div>
                    <div class="form-group">
                        <label for="first_name">To Date:</label>
                        <input type="text" class="form-control pull-right datepickers"
                                       name="to_date" value="{{$to_date}}">
                    </div> 
                    
                   
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Download Report</button>
                </div>
            </form>
                <div class="form-horizontal">
                <div class="box-body">
                <!--Head Scetion -->
                    <div class="row"> 
                        <div class="col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Name</span> 
                                <input type="text" class="form-control" value="1101"   readonly />
                                
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Month</span> 
                                <input type="text" class="form-control" value="June-2020"   readonly />
                                
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row"> 
                        <div class="col-md-4 col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">Tean</span> 
                                <input type="text" class="form-control" value="Ranax"   readonly />
                                
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">District</span> 
                                <input type="text" class="form-control" value="LHR-1"   readonly />
                                
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">Zone</span> 
                                <input type="text" class="form-control" value="Center"   readonly />
                                
                            </div>
                        </div>
                    </div>
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
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach($mso_lists as $mso_lists)
                                
                                <tr> 
                                    <td style="display:none"></td>
                                    <td>{{ date('d-m-Y', strtotime($mso_lists->date)) }}</td> 
                                    <td>{{ $mso_lists->area }}</td> 
                                    <td>{{ $mso_lists->mso_id }}</td> 
                                    <td>{{ $mso_lists->contact_point }}</td> 
                                    <td>{{ $mso_lists->time }}</td> 
                                    
                                    
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
<script src="{{ asset("bower_components/datepicker/bootstrap-datepicker.min.js") }}"></script>
<script src="{{ asset("bower_components/datepicker/daterangepicker.js") }}"></script>
<script src="{{ asset("bower_components/moment/moment.js") }}"></script>   
 
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