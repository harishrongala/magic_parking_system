<?php
// Using Session to track user login status
session_start();
include('invisible.php');
if(isset($_SESSION['userid']))
{
  $user=$_SESSION['userid'];
  $conn=mysqli_connect(host,user,dbpass,db);
  $que="SELECT fname FROM owner WHERE user_id='$user'";
  $res=mysqli_query($conn,$que);
  $row=mysqli_fetch_assoc($res);
  $_SESSION['name']=$row['fname'];
  mysqli_close($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css_support_geolocation.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjMCVGz3TlmuKFuwQ-H7-ORIQQlZ6s2mA"
    async defer></script>
    <script src="scripts/support_geolocation.js"></script>
    <script>
    function init(){
      document.getElementById("not_area").innerHTML="Welcome "+$('#getusername').val();
    }
    </script>
</head>
<body onload="init()">

<!------------------- Navigation bar ---------------->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="default.php"><img src="images/logo2.png" style="width:90px; height:35px;"></a>
  </div>
  <div class="collapse navbar-collapse" id="mynavbar">
  <ul class="nav navbar-nav navbar-right">

    <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->

<!-- This hidden input is given the value of username, so it would be easier for Jquery or javascript to access the value-->
<input type="hidden" value=<?php echo $_SESSION['name']; ?> id="getusername"></input>

<!-------- Message area------------>
<div class="container " id="notification_area">
<div class="row" >

  <div class="alert alert-info">
  <div class=" text-center" id="not_area">This notifies you!
  </div>
</div>
</div>
</div>
<!------- Message area ends----------->

<!--- Dashboard options -->

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 thumbnail">
      <img src="images/manage_parking_spaces.png" style="width:30%;">
      <center><a class="btn btn-primary" href="manage_parking.php"> Manage Parking Spaces </a></center>
    </div>
    <div class="col-md-6 thumbnail">
      <img src="images/manage_parking_monitors.png" style="width:30%;">
      <center><a class="btn btn-primary" href="manage_complaints.php"> Manage Parking Complaints </a></center>
    </div>

  </div>
</div>

<!-- Dashboard options end -->

</body>
</html>
<?php
// If user is not logged in show this message
}
else {
  echo "Unauthorized, Please log in";
}
 ?>
