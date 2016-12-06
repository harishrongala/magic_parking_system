<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body onload="handle_field_time()">
  <!-- Bootstrap stylesheet -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

  <!-- ClockPicker Stylesheet -->
  <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">

  <!-- Input group, just add class 'clockpicker', and optional data-* -->
<div class="container-fluid">
  <div class="row">
<label>Check-in</label>
  <div class="input-group clockpicker col-md-2" data-placement="bottom" data-align="top" id="clock1">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
      <input type="text" class="form-control" value="" id="field1">

  </div>
  <label>Check-out</label>
  <div class="input-group clockpicker  col-md-2" data-placement="bottom" data-align="top" id="clock2">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
      <input type="text" class="form-control" value="" id="field2">

  </div>

</div>
</div>
<center>
  <button onclick="getval()" class="btn btn-primary">Reserve Parking</button>
</center>

  <!-- jQuery and Bootstrap scripts -->
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  <!-- ClockPicker script -->
  <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
  <script src="infowindow_support.js"></script>

</body>
</html>
