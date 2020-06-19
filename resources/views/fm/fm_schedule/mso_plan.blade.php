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
                            <tr id="mso_{{$mso_lists->id}}"> 
                                <td style="display:none"></td>
                                <td class="mso_date_{{$mso_lists->id}}">{{ date('d-m-Y', strtotime($mso_lists->date)) }}</td> 
                                <td class="mso_area_{{$mso_lists->id}}">{{ $mso_lists->area }}</td> 
                                <td class="mso_mso_id_{{$mso_lists->id}}">{{ $mso_lists->mso_id }}</td> 
                                <td class="mso_contact_{{$mso_lists->id}}">{{ $mso_lists->contact_point }}</td> 
                                <td class="mso_time_{{$mso_lists->id}}">{{ $mso_lists->time }}</td> 
                                <!-- <td><a href="{{url('fm/edit_mso_plan',$mso_lists->id)}}">
                                    <i class="fa fa-fw fa-edit"></i></a>
                                  </td>   -->
                                <td><button type="button" id="{{$mso_lists->id}}" class="btn btn-primary btn-xs edit_button" 
                                    data-toggle="modal" data-target="#myModal"
                                    data-date="{{ date('d-m-Y', strtotime($mso_lists->date)) }}"
                                    data-area="{{ $mso_lists->area }}"
                                    data-mso_id="{{ $mso_lists->mso_id }}"
                                    data-contact_point="{{ $mso_lists->contact_point }}"
                                    data-time="{{ $mso_lists->time}}" 
                                    data-id="{{ $mso_lists->id}}">
                                    Edit
                                  </button>
                                </td>
                                
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

<!-- Modal for Edit button -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Plan<span class="qr_winner_name_show" style="color: #32c5d2;"></span></h4>
            </div>
            <form method="post" id="contactFormDriver" action="{{ url('fm/edit_mso_plan') }}">
            <input name="_token" type="hidden" id="token" value="{{ csrf_token() }}"/>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control mso_view_id" type="hidden" name="id">
                        <label for="heading">Enter Date</label>
                        <input class="form-control mso_view_date datepicker" name="date" placeholder="Enter Date" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control mso_view_area" type="hidden" name="area">
                        <label for="heading">Enter Area</label>
                        <input class="form-control mso_view_area" name="area" placeholder="Enter Area" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control mso_view_mso_id" type="hidden" name="mso_id">
                        <label for="heading">Enter MSO_ID</label>
                        <select name="mso_id" class="form-control mso_view_mso_id"> 
                            <option value="1101">1101</option>
                            <option value="1102">1102</option>
                          
                          </select> 
                    </div>
                    <div class="form-group">
                        <input class="form-control mso_view_contact_point" type="hidden" name="contact_point">
                        <label for="heading">Enter Contact Point</label>
                        <input class="form-control mso_view_contact_point" name="contact_point" placeholder="Enter Contact Point" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control mso_view_time date datetimepicker3" id="datetimepicker3" type="hidden" name="time">
                        <label for="heading">Enter Time</label>
                        <input class="form-control mso_view_time date datetimepicker3" id="datetimepicker3" name="time" placeholder="Enter Time" required>
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal for Edit button -->

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
<script src="{{ asset("bower_components/datepicker/bootstrap-datetimejs.js") }}"></script> 
 
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
<script>
$(function () {
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight:'TRUE',
        startDate: '-0d',
        autoclose: true,
    })
    $('.datetimepicker3').datetimepicker({
			format: 'LT'
		});
		$('.datetimepicker3').datetimepicker({
			format: 'LT'
        });
    });
</script>

<script>
$(document).on( "click", '.edit_button',function(e) {
    var date = $(this).data('date');
    var area = $(this).data('area');
    var mso_id = $(this).data('mso_id');
    var contact_point = $(this).data('contact_point');
    var time = $(this).data('time');
    var id = $(this).data('id');

    // var id = $(this).attr('relid'); //get the attribute value
          
          $.ajax({
              url :"{{ url('fm/mso_get_value') }}",
              data:{id : id},
              type:'POST', 
              headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
     },
              success:function(response) {
                $.each(response, function(i, item) { 
                var second_date = moment(item.date).format('DD-MM-YYYY');
                $(".mso_view_date").val(second_date);
                $(".mso_view_area").val(item.area);
                $(".mso_view_mso_id").val(item.mso_id);
                $(".mso_view_contact_point").val(item.contact_point);
                $(".mso_view_time").val(item.time);
                $(".mso_view_id").val(item.id);
            });
            }
          }); 
        
});
</script>

<script>
$('body').on('submit','#contactFormDriver',function(e){

e.preventDefault();
$.ajax({
    url : "{{ url('fm/edit_mso_plan') }}",
    data: new FormData(this),
    type: 'POST',
    contentType: false,       
    cache: false,             
    processData:false, 
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
     },
    beforeSend: function(){
      //loding..
    },
    success:function(result){
     
        $.each(result, function(i, item) { 
            var second_date = moment(item.date).format('DD-MM-YYYY');
            $('.mso_date_'+item.id).text(second_date);
            $('.mso_area_'+item.id).text(item.area);
            $('.mso_mso_id_'+item.id).text(item.mso_id);
            $('.mso_contact_'+item.id).text(item.contact_point);
            $('.mso_time_'+item.id).text(item.time);

            });
      $('#myModal').modal('hide'); 


    },
   
     
});
});
 
</script>
@endsection