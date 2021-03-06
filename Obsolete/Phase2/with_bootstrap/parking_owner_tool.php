<?php
session_start();
 ?>
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
    <link rel="stylesheet" href="support_parking_owner_tool.css">
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script-->
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjMCVGz3TlmuKFuwQ-H7-ORIQQlZ6s2mA"
    async defer></script>
      <!--script src="support_centerchanged.js"></script-->

    <!--script src="support_geolocation_with_geocoding_tinker.js"></script-->
    <script src="support_parking_owner_tool.js"></script>
    <script src="moment.js"></script>
</head>
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
    <li><a href="#" onclick="show_help()"><span class="glyphicon glyphicon-info-sign"></span> Help</a></li>
    <li><a href="#" onclick=""><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->

<input type="hidden" value=<?php echo $_SESSION['userid']; ?> id="getuserid"></input>


<!----------------- Add parking Modal window ---------------------------->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Do you want to add this location as parking space ?</h4>
      </div>



      <div class="modal-body">
        <div class="container-fluid">
          <form enctype="multipart/form-data" action="" method="POST" id="addparkingform">

      <div class="row" id="address_modal_row">
      <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
        <label for="address_modal"> Address of this parking: </label>
        <div class="input-group">
          <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
        <input id="address_modal" class="form-control" name="address"></input>
      </div>
    </div>
    </div>


<div class="row" id="maxtimerow">

<div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
  <label for="max_modal"> Maximum parking duration: </label>
  <div class="input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span><select class="form-control" id="max_modal" name="max">
      <option value="NA">Unlimited</option>
      <option value="3">3 Hours</option>
      <option value="6">6 Hours</option>
      <option value="12">12 Hours</option>
    </select>
  </div>
</div>
</div>


<div class="row" id="browse">

  <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
    <label for="picture_modal"> Picture: </label>
    <div class="input-group">
    <label class="btn btn-primary btn-file">
      Browse<input type="file" style="display: none;" id="spaceimage" name="userfile" class="form-control"></input>
    </label>
  </div>
  </div>


</div>

<div class="row">
<div class="col-xs-5 col-xs-offset-2 col-md-3 col-md-offset-3" id="submit_button_row">
  <button type="submit" class="btn btn-success pull-right form-control">Add Parking</button>
</div>
</div>
</form>
</div>


        </div>
      </div>

            </div>
          </div>
                <script>

                $document.ready(function(e){
                  $('#addparkingform').on('submit',(function(e){
                    e.preventDefault();
                    $.ajax({
                      url:"uploadimage.php",
                      type:"POST",
                      data: new FormData(this),
                      contentType:false,
                      cache:false,
                      processData:false,
                      success: function(res){
                        alert(res);
                      },
                      error: function(res){
                        alert("error");
                      }
                    });
                  }));
                });


                </script>
<!-------------------- Modal ends---------------------->


<!----------------- Remove Modal window ---------------------------->
<!-- Modal -->
<div id="removeModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Do you want to delete this parking ?</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">

          <div class="row">
          <div class="col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2">
            <div class="thumbnail">
            <img  src="" id="parking_space_image" style="width:50%; height:50%;">
          </div>
        </div>
      </div>

        <div class="row">
        <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
          <label for="spaceid_modal"> Space ID: </label>
          <div class="input-group">
          <p id="rmspaceid_modal" class="input-group"></p>
        </div>
      </div>
    </div>


      <div class="row">
      <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
        <label for="address_modal"> Address: </label>
      <div class="input-group">
        <p id="rmaddress_modal" class="input-group"></p>
      </div>
    </div>
  </div>


<div class="row">
<div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
  <label for="max_modal"> Maximum parking duration: </label>
<div class="input-group">
  <p id="rmmax_modal" class="input-group"></p>
</div>
</div>
</div>

<div class="row">
  <div class="col-xs-3 col-xs-offset-8 col-md-2 col-md-offset-8" id="remove_parking_button">
    <button class="btn btn-danger pull-right" onclick="remove_parkingspace()">Remove Parking</button>
  </div>
</div>

</div>

</div>
</div>
</div>
</div>
</div>

<!-------------------- Modal ends---------------------->


<!----------------- Help Modal window ---------------------------->
<!-- Modal -->
<!--div id="helpModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    < Modal content>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Here's how to use this tool</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">

          <div class="row">
          <div class="col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2">
            <div class="thumbnail">
            <img  src="step1.png" id="parking_space_image" style="width:50%; height:50%;">
          </div>
        </div>
      </div>

        <div class="row">
        <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
          <label for="spaceid_modal"> Space ID: </label>
          <div class="input-group">
          <p id="spaceid_modal" class="input-group">123</p>
        </div>
      </div>
    </div>


      <div class="row">
      <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
        <label for="address_modal"> Address: </label>
      <div class="input-group">
        <p id="address_modal" class="input-group">127 Charles St, Jersey City, NJ</p>
      </div>
    </div>
  </div>


<div class="row">
<div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
  <label for="max_modal"> Maximum parking duration: </label>
<div class="input-group">
  <p id="max_modal" class="input-group">3 Hour(s)</p>
</div>
</div>
</div>

<div class="row">
  <div class="col-xs-3 col-xs-offset-8 col-md-2 col-md-offset-8" id="remove_parking_button">
    <button class="btn btn-danger pull-right" onclick="ajax_reservation()">Remove Parking</button>
  </div>
</div>

</div>

</div>
</div>
</div>
</div-->

<!-------------------- Modal ends---------------------->





<!-------- Message area------------>
<div class="container-fluid">
  <div class="row">
<div class="alert alert-info " id="notify_here" style="width:100%"><center>Welcome<center> </div>
</div>
</div>
<!------- Message area ends----------->

<!--- Wrapping entire inputs in 'well' --->



<!----------- Search bar -------------->
<div class="container-fluid" id="search_bar">
  <div class="row">
<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4 input-group" id="innersearch">

  <input type="text" class="form-control" placeholder="Set location" id="searchtext"/>
  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i>
</span>
</div>
</form>
</div>
</div>
<!------- Search bar ends -------------->



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
