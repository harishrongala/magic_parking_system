<?php
session_start();
$_SESSION['ticketid']=$_GET['id'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Navigation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="css/css_take_me_to_parking.css">
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script-->
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjMCVGz3TlmuKFuwQ-H7-ORIQQlZ6s2mA"
    async defer></script>

    <script src="scripts/moment.js"></script>
    <script src="scripts/support_take_me_to_parking.js"></script>


</head>
<body onload="initMap();">

<!------------------- Navigation bar ---------------->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="dashboard.php"><img src="images/logo2.png" style="width:90px; height:35px;"></a>
  </div>
  <div class="collapse navbar-collapse" id="mynavbar">
  <ul class="nav navbar-nav navbar-right">
    <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
    <li><a href="myreservations.php"><span class="glyphicon glyphicon-log-in"></span> My Tickets</a></li>
    <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->

<input type="hidden" value=<?php echo $_SESSION['userid']; ?> id="getuserid"></input>
<input type="hidden" value=<?php echo $_SESSION['ticketid']; ?> id="getticketid"></input>

<!----------------- Complaint Modal window ---------------------------->
<!-- Modal -->
<div id="complaintModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">File a complaint</h4>
      </div>

      <div class="modal-body">
        <div class="container-fluid">
          <form enctype="multipart/form-data" action="" method="POST" id="complaintform">

<div class="row" id="maxtimerow">

<div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2">
  <label for="max_modal"> Reason of your complaint: </label>
  <div class="input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-thumbs-down"></span></span><select class="form-control" id="max_modal" name="com_reason">
      <option value="Someone parked in my space">Someone parked in my space</option>
      <option value="Cannot find parking space here">Cannot find parking space here</option>
      <option value="No space to park">No space to park</option>
    </select>
  </div>
</div>
</div>


<div class="row" id="takepicture">

  <div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2">
    <label for="picture_modal"> Please enclose a picture: </label>
    <div class="input-group">
    <label class="btn btn-primary btn-file">
      Take a picture<input type="file" style="display: none;" id="spaceimage" name="userfile" class="form-control"></input>
    </label>
  </div>
  </div>


</div>

<div class="row">
<div class="col-xs-2 col-xs-offset-8 col-md-2 col-md-offset-8" id="submit_button_row">
  <div class="input-group">
  <button type="submit" class="btn btn-danger form-control" >Report</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>




<!-------------------- Complaint Modal ends---------------------->



<!----------------- Checkin Modal window ---------------------------->
<!-- Modal -->
<div id="checkinModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Checkin</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">



        <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">
          <div class="input-group">
          <label for="spaceid_modal"> Do you want to check-in ? </label>
        </div>
      </div>
    </div>


<div class="row">
  <div class="col-xs-2 col-xs-offset-2 col-md-2 col-md-offset-2" id="remove_parking_button">
    <div class="input-group">
    <button class="btn btn-primary" onclick="checkin_checkin()">Yes</button>
  </div>
</div>
  <div class="col-xs-2 col-xs-offset-1 col-md-2 col-md-offset-2" id="remove_parking_button">
    <div class="input-group">
    <button class="btn btn-danger pull-right" onclick="close_checkin()">No</button>
  </div>
  </div>
</div>

</div>

</div>
</div>
</div>
</div>

<script>

</script>


<!-------------------- Checkin Modal ends---------------------->

<!----------------- Checkout Modal window ---------------------------->
<!-- Modal -->
<div id="checkoutModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Checkout</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">



        <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">
          <div class="input-group">
          <label for="spaceid_modal"> Do you want to check-out ? </label>
        </div>
      </div>
    </div>


<div class="row">

  <div class="col-xs-2 col-xs-offset-2 col-md-2 col-md-offset-2" id="remove_parking_button">
    <div class="input-group">
    <button class="btn btn-primary" onclick="checkout_checkout()">Yes</button>
  </div>
</div>
  <div class="col-xs-2 col-xs-offset-1 col-md-2 col-md-offset-2" id="remove_parking_button">
    <div class="input-group">
    <button class="btn btn-danger pull-right" onclick="close_checkout()">No</button>
  </div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>



<!-------------------- Checkout Modal ends---------------------->









<!----------- Search bar -------------->
<div class="container-fluid" id="search_bar">

  <div class="row" id="source_value_row">

<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4" id="innersearch">
  <div class="input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-font"></span></span>
  <input type="text" class="form-control" id="source_value" value="Your location" disabled ></input>
</div>
</div>
</div>

<div class="row">
<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4" >
<div class="input-group">
  <span class="input-group-addon"><span class="glyphicon glyphicon-bold"></span></span>
<input type="text" class="form-control" value=<?php
$conn=mysqli_connect("localhost","root","","magicparking");
$_que="SELECT address FROM parkingspaces WHERE space_id=(SELECT space_id FROM tickets WHERE ticket_id=".$_SESSION['ticketid'].")";
$res=mysqli_query($conn,$_que);
if(mysqli_num_rows($res)>0)
{
  $row=mysqli_fetch_assoc($res);
  echo '"'.$row['address'].'"';
}
 ?> disabled></input>
</div>
</div>
</div>
<br>




<div class="row" id="buttons_row">

        <div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-4">
            <div class="btn-group">
    <button class="btn btn-danger btn-inline" onclick="load_complaint_modal()"><span>Complain <span class="glyphicon glyphicon-bell"></span></span></button>

    <button class="btn btn-primary btn-inline" onclick="load_checkin_modal()"><span>Checkin <span class="glyphicon glyphicon-log-in"></span></span></button>

    <button class="btn btn-warning btn-inline" onclick="load_checkout_modal()"><span>Checkout <span class="glyphicon glyphicon-log-out"></span></span></button>
  </div>
</div>
  </div>


</div>




<!------- Search bar ends -------------->






<!------------- Insert map div here ---------------->
<div class="container-fluid" id="map">
  <div class="row">
  <div class="col-xs-12 col-md-8 col-md-offset-2" id="map" ></div>
</div>
</div>
<!--------------- End map div ---------------------->


<script>
var source;
var dest;
var map;
var cen_marker;
var watch_id;
var space_lat;
var space_lng;
var cur_lat;
var cur_lng;

var directionsDisplay;
var directionsService;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  directionsDisplay.setMap(map);
  calcRoute();
}

function calcRoute() {
  directionsService = new google.maps.DirectionsService();
  var request = {
    origin: source,
    destination: dest,
    travelMode: 'DRIVING'
  };
  directionsService.route(request, function(result, status) {
    if (status == 'OK') {
      directionsDisplay.setDirections(result);
    }
  });
}


// Get the geolocation
function initMap()
{
  if(navigator.geolocation){
    var opt={
      enableHighAccuracy: true,
      timeout: Infinity,
      maximumAge: 0
    };
    navigator.geolocation.getCurrentPosition(load_geolocation);

  }
}


function tracking(position)
{
  cur_lat=position.coords.latitude;
  cur_lng=position.coords.longitude;
  var temp_cen=new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
  cen_marker.setPosition(temp_cen);
  getDistanceFromLatLonInKm();
}


function create_user_positionmarker()
{
  var mapOptions={
    zoom: 18,
    center: source
  };
  map = new google.maps.Map(document.getElementById('map'),mapOptions);
  cen_marker=new google.maps.Marker({
  position:source,
  map: map,
  icon: {
    path: google.maps.SymbolPath.CIRCLE,
    scale: 7
  }
});
watch_id=navigator.geolocation.watchPosition(tracking);
}







function load_geolocation(position)
{
cur_lat=position.coords.latitude;
cur_lng=position.coords.longitude;
source=new google.maps.LatLng(cur_lat,cur_lng);
var ticketid=$('#getticketid').val();
create_user_positionmarker();
$.post("support/get_space_details_from_ticketid.php",{tickid:ticketid},function(result){
  var obj=$.parseJSON(result);
  space_lat=obj[0].lat;
  space_lng=obj[0].lon;
  dest=new google.maps.LatLng(space_lat,space_lng);
  initialize();
});

}





</script>

</body>
</html>
