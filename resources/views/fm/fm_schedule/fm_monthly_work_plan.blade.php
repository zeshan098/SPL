@extends('fm.template.admin_template')



@section('content')
<!-- DataTables -->

<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/toaster/custom.css") }}">

<link type="text/css" href="css/bootstrap-timepicker.min.css" />
<!-- Main content -->
<section class="content">
          <div class="box box-primary">
                <div class="box-header with-border">
                   <h3 class="box-title">Add Monthly Work Plan</h3>
                </div>
                
<div class="box">
    <div class="row">
      <div class="col-md-12">
    <!-- /.tab-pane -->
       <div class="tab-pane" id="tab_3">
                <!-- /.box-body -->
                <div class="box-body">
                    <div class="row">
                      <div id="education_fields">
            
                      
                      <div class="col-lg-2 nopadding">
                       <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control datepicker" id="date" name="date[]" value="" >
                        
                      </div>
                    </div>
                    
                    <div class="col-lg-2 nopadding">
                       <div class="form-group">
                        <label>Area</label>
                        <input type="text" class="form-control" id="area" name="area[]" value="" >
                        
                      </div>
                    </div>

                    <div class="col-lg-2 nopadding">
                       <div class="form-group">
                        <label>MSO Name</label>
                        <input type="text" class="form-control" id="mso_name" name="mso_name[]" value="" >
                        
                      </div>
                    </div>

                    <div class="col-lg-4 nopadding">
                       <div class="form-group">
                        <label>Contact Point</label>
                        <input type="text" class="form-control" id="contact_point" name="contact_point[]" value="" >
                        
                      </div>
                    </div>


                    <div class="col-lg-2 nopadding">
                      <div class="form-group">
                      <label>Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="time" name="time[]" value="" >
                          <div class="input-group-btn">
                            <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="clear"></div>
                       
                    </div>         
                  </div>
                </div> 
                <button type="submit" name="submit" value="1" id="submit" class="btn btn-primary">Submit</button>
                <!-- /.box-body -->
            </div>
              <!-- /.tab-pane -->
        </div>
       </div>
    </div>
    </div>
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
        format: 'dd-mm-yyyy',
        todayHighlight:'TRUE',
        startDate: '-0d',
        autoclose: true,
    })
</script>
 
<script>
var room = 1;
function education_fields() {
    
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    
    $('#education_fields').on('click', function() {      
            $(".datepicker").on('focus', function(){
            var $this = $(this);
            if(!$this.data('datepicker')) {
                $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight:'TRUE',
                startDate: '-0d',
                autoclose: true,
            })
            $this.removeClass("hasDatepicker");
            $this.datepicker();
            $this.datepicker("show");
            }
            
        });
     });
    divtest.innerHTML = `<div class="col-lg-2 nopadding">
                              <div class="form-group" >
                                <input type="text" class="form-control datepicker" id="date" name="date[]" value="" >
                               </div>
                            </div>
                            <div class="col-lg-2 nopadding">
                              <div class="form-group">
                                <input type="text" class="form-control " id="area" name="area[]" value="" >
                              </div>
                            </div>
                            <div class="col-lg-2 nopadding">
                              <div class="form-group"> 
                                <input type="text" class="form-control" id="mso_name" name="mso_name[]" value="" >
                              </div>
                            </div>
                            <div class="col-lg-4 nopadding">
                                <div class="form-group"> 
                                    <input type="text" class="form-control" id="contact_point" name="contact_point[]" value="" >
                                </div>
                            </div>
                            <div class="col-lg-2 nopadding">
                              <div class="form-group">
                                <div class="input-group">
                                <input type="text" class="form-control" id="time" name="time[]" value="" >
                                  <div class="input-group-btn">
                                  <button class="btn btn-danger" type="button" onclick="remove_education_fields(` + room + `);"> 
                                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> 
                                  </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>`;
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
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