<!----------"http://eonasdan.github.io/bootstrap-datetimepicker/"--------->

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>

</head>
<br/>
<!-- padding for jsfiddle -->
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">

        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                 <h6>Check-in</h6>

                <div class="form-group">
                    <div class="input-group date" id="datetimepicker1">
                        <input type="text" class="form-control" />	<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                    </div>
                </div>
                 <h6>Check-out</h6>

                <input type="text" class="form-control" id="datetimepicker2" />
                  <button type="button" class="btn btn-default" id="test">Test</button>
                <script>
                $('#datetimepicker1').datetimepicker(
                  {format : "LT"
                });
                $('#datetimepicker2').datetimepicker({format : "DD/MM/YYYY hh:mm"});

                $('#test').click(function(){
                  var dt1=$('#datetimepicker1').data('DateTimePicker').date();
                  dt1=new Date(dt1);
                  alert(dt1.getMinutes());
                })
                </script>
            </div>
        </div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
