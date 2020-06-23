<!DOCTYPE html>
<html>
<head>
<style>
.fields {
            border: 1px solid grey;
            width: 23%;
            white-space:nowrap;
        }
        .fields1 {
            border: 1px solid grey;
            width: 18%;
            white-space:nowrap;
        }
        table, th, td {
            border: 1px solid black;
  border-collapse: collapse;
}
 
</style>
</head>
<body>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                   <h4 class="box-title"  style="text-align:center">MSO Monthly Plan Report</h4>
                </div>
                <div class="form-horizontal">
                    <div class="box-body">
                    <!--Head Scetion -->
                    <span class="input-group-addon"  style="font-size:13px;">Name:</span>
                    <span><input type="text" class="form-control" size="50" style="font-size:10px;" value="1101" placeholder="Team" readonly /></span>
                    <span class="input-group-addon"  style="font-size:13px;">Month:</span>
                    <span><input type="text" class="form-control" size="30" style="font-size:10px;" value="June-2020" placeholder="Team" readonly /></span>
                    <br/><br/>
                    <span class="input-group-addon"  style="font-size:13px;">Team:</span>
                    <span><input type="text" class="form-control" size="15" style="font-size:10px;" value="Ranax" placeholder="Team" readonly /></span>
                    <span class="input-group-addon" style="font-size:13px;">Zone:</span>
                    <span><input type="text" class="form-control" size="16"  style="font-size:10px;" value="Center" placeholder="Zone" readonly /></span>
                    <span class="input-group-addon" style="font-size:13px;">District:</span>
                    <span><input type="text" class="form-control" size="16" style="font-size:10px;" value="LHR-1" placeholder="District" readonly /></span>
                    <span class="input-group-addon" style="font-size:13px;">Station:</span>
                    <span><input type="text" class="form-control" size="16" style="font-size:10px;" value="LHR-1" placeholder="District" readonly /></span>
            
                         
                        
                        
                    </div>
                    <br><br>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                <!--<div class="box-body table-responsive no-padding">-->
                    <table id="example" class="table table-bordered table-striped" style="width:100%">
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
    </body>
</html>