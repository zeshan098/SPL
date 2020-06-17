@extends('admin.template.admin_template')



@section('content')
<?php
//dd(\Route::current()->getName());
//dd($controller_name.' --- '.$action_name);
?>
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/selecter/select2.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Zone Station Detail</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('admin/add_fm_zone_station') }}" method="post">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="box-body">
                     
                     
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="first_name">CCRSID</label>
                                <select name="ccrsid[]" class="form-control select2" multiple="multiple" data-placeholder="Select CCRSIR" style="width: 100%;" required>
                                    <option value="">Select CCRSID</option>
                                        @foreach($fmccrsid as $fmccrsid)
                                        <option value="{{$fmccrsid->ccrsid}}">{{$fmccrsid->ccrsid}}</option>
                                        @endforeach
                                     
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="first_name">TEAM</label>
                                <select name="team[]" class="form-control select2" multiple="multiple" data-placeholder="Select Team" style="width: 100%;" required>
                                    <option value="">Select Team</option>
                                        @foreach($team as $team)
                                        <option value="{{$team->team_code}}">{{$team->team_code}}</option>
                                        @endforeach
                                     
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="first_name">Zone</label>
                                <select name="zone[]" class="form-control select2" multiple="multiple" data-placeholder="Select Zone" style="width: 100%;" required>
                                    <option value="">Select Zone</option>
                                        @foreach($zone as $zone)
                                        <option value="{{$zone->zone_abbr}}">{{$zone->zone_abbr}}</option>
                                        @endforeach
                                     
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="first_name">District</label>
                                <select name="district[]" class="form-control select2" multiple="multiple" data-placeholder="Select District" style="width: 100%;" required>
                                <option value="">Select District</option>
                                        @foreach($district as $district)
                                        <option value="{{$district->district_code}}">{{$district->district}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="first_name">Station</label>
                                <select name="station[]" class="form-control select2" multiple="multiple" data-placeholder="Select Station" style="width: 100%;" required>
                                    <option value="">Select Station</option>
                                        @foreach($station as $station)
                                        <option value="{{$station->station_code}}">{{$station->station}}</option>
                                        @endforeach
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label>Select</label>
                        <select class="form-control" name="role" required="">
                            <option value="">Select Option</option>
                            <option value="fm">Field Manager</option>
                            <option value="zm">Zone Manager</option>
                            <option value="nsm">National Sales Manager</option>
                            <option value="pm">Country Sales Manager</option>
                        </select>
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