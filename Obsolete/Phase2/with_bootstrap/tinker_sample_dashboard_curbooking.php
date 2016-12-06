<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="css_support_geolocation.css">
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script-->
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjMCVGz3TlmuKFuwQ-H7-ORIQQlZ6s2mA"
    async defer></script>
      <!--script src="support_centerchanged.js"></script-->

    <!--script src="support_geolocation_with_geocoding_tinker.js"></script-->
    <script src="support_centerchanged_type2.js"></script>
    <script src="moment.js"></script>
</head>
<!--body onload="get_location()"-->
<body onload="geolocation();">

<!------------------- Navigation bar ---------------->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="initial.php"><img src="logo2.png" style="width:90px; height:35px;"></a>
  </div>
  <div class="collapse navbar-collapse" id="mynavbar">
  <ul class="nav navbar-nav navbar-right">
    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <li><a href="about_us.php"><span class="glyphicon glyphicon-briefcase"></span> About Us</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->



<!----------------- Modal window ---------------------------->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reserve your parking</h4>
      </div>
      <div class="modal-body">
        <div class="container">
        <div class="row">
          <div class="col-xs-12">

        </div>
        </div>



        <div class="container-fluid">
        <div class="row">
          <div class="col-xs-2 col-xs-offset-4 col-md-2 col-md-offset-2">
            <img class="responsive" src="step1.png" id="parking_space_image" style="width:150px; height:100px;">
          </div>
        </div>

        <div class="row">
        <div class="col-xs-4 col-md-2">
          <label for="spaceid_modal"> Space ID: </label>
        </div>
        <div class="col-xs-6 col-md-6">
          <div id="spaceid_modal">123</div>
        </div>
      </div>


      <div class="row">
      <div class="col-xs-4 col-md-2">
        <label for="address_modal"> Address: </label>
      </div>
      <div class="col-xs-6 col-md-6">
        <div id="address_modal"></div>
      </div>
    </div>

    <div class="row">
    <div class="col-xs-4 col-md-2">
      <label for="checkin_modal"> Checkin: </label>
    </div>
    <div class="col-xs-6 col-md-6">
      <div id="checkin_modal"></div>
    </div>
  </div>

  <div class="row">
  <div class="col-xs-4 col-md-2">
    <label for="checkout_modal"> Checkout: </label>
  </div>
  <div class="col-xs-6 col-md-6">
    <div id="checkout_modal"></div>
  </div>
</div>

<div class="row">
<div class="col-xs-4 col-md-2">
  <label for="duration_modal"> Duration: </label>
</div>
<div class="col-xs-6 col-md-6">
  <div id="duration_modal"></div>
</div>
</div>

<div class="row">
<div class="col-xs-4 col-md-2">
  <label for="carnum_modal"> Enter your car number: </label>
</div>
<div class="col-xs-6 col-md-6">
  <input id="carnum_modal" class="input-group"></input>
</div>
</div>


<div class="row">
  <div class="col-xs-12 col-md-6 col-lg-6 col-sm-8">
    <button class="btn btn-success pull-right" onclick="ajax_reservation()">Reserve</button>
  </div>
</div>

</div>


        </div>
      </div>

            </div>
          </div>
</div>
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
<!-------------------- Modal ends---------------------->


<!-------- Message area------------>
<div class="container-fluid">
  <div class="row">
<div class="alert alert-info " id="notify_here" style="width:100%"><center>Welcome<center> </div>
</div>
</div>
<!------- Message area ends----------->

<!--- Wrapping entire inputs in 'well' --->

<div class="well" id="inputform">

<!----------- Search bar -------------->
<div class="container-fluid" id="search_bar">
  <div class="row">
<div class="col-xs-12 col-md-4 col-md-offset-4 input-group" id="innersearch">

  <input type="text" class="form-control" placeholder="Set location" id="searchtext"/>
  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i>
</span>
</div>
</form>
</div>
</div>
<!------- Search bar ends -------------->


<!---- Checkin checkout --------->

<div class="container-fluid" >
  <div class="row" id="checkinout">

    <div class="col-xs-6 col-md-3 col-md-offset-3">
      <center><label class="input-group">Check in</label></center>
        <div class="input-group date " id="checkinpicker" style="width:100%">
            <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span><input type="text" class="form-control" placeholder="Check in"/>
        </div>
      </div>
        <div class="col-xs-6 col-md-3">
          <center><label class="input-group">Check out</label></center>
        <div class="input-group date " id="checkoutpicker" style="width:100%">
            <input type="text" class="form-control" placeholder="Check out"/>	<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
        </div>
      </div>
    </div>
  </div>



  <script>
  $('#test').click(function(){
    var dt1=$('#datetimepicker1').data('DateTimePicker').date();
    dt1=new Date(dt1);
    alert(dt1.getMinutes());
  })
  </script>


<!---------- Filter search --------------------->

<div class="container-fluid">
  <div class="row" id="filter_submit_row">
    <div class="col-xs-6  col-md-3 col-md-offset-3">
    <div class="input-group">

      <span class="input-group-addon"><span class="glyphicon glyphicon-filter"></span></span><select class="form-control" id="filter">
        <option>Show all</option>
        <option>Within 2 miles</option>
        <option>Within 3 miles</option>
        <option>Within 5 miles</option>
        <option>Within 10 miles</option>
      </select>
    </div>
  </div>
  <div class="col-xs-6  col-md-3">
    <button class="btn btn-success" onclick="cmon_find_parking()">Find Parking</button>
  </div>
</div>
</div>

</div>

<!-------------- Filter ends -------------------->

<!---- Use my location pin ---->
<div class="container-fluid" id="locate_me_on_map">
  <div class="row" >
    <div class="col-md-2">
      <button class="btn btn-danger" onclick="recenter_map()"><span>Locate me <span class="glyphicon glyphicon-map-marker"></button>
    </div>
  </div>
</div>

<!-------- Use my location ends-------->


<!------------- Insert map div here ---------------->
<div class="container-fluid" id="map">
  <div class="row">
  <div class="col-xs-12 col-md-8 col-md-offset-2" id="map" ></div>
</div>
</div>
<!--------------- End map div ---------------------->




</body>
</html>
