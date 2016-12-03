<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css_support_geolocation.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjMCVGz3TlmuKFuwQ-H7-ORIQQlZ6s2mA"
    async defer></script>
    <script src="support_geolocation.js"></script>
    <script>
    function init(){
      document.getElementById("not_area").innerHTML="Welcome Owner";
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
<!-------- Message area------------>
<div class="container " id="notification_area">
<div class="row panel panel-info" >
<div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-4 panel-body"  >
  <div class=" text-center" id="not_area">This notifies you!
  </div>
</div>
</div>
</div>
<!------- Message area ends----------->

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 thumbnail">
      <img src="manage_parking_spaces.png" style="width:30%;">
      <center><a class="btn btn-primary" href="parking_owner_tool.php"> Manage Parking Spaces </a></center>
    </div>
    <div class="col-md-4 thumbnail">
      <img src="manage_parking_monitors.png" style="width:30%;">
      <center><a class="btn btn-primary" href="owner_dashboard_manage_parking_monitors.php"> Manage Parking Complaints </a></center>
    </div>
    <div class="col-md-4 thumbnail">
      <img src="manage_parking_monitors.png" style="width:30%;">
      <center><a class="btn btn-primary" href="owner_dashboard_manage_parking_monitors.php"> Analytics </a></center>
    </div>
  </div>
</div>

<!------------- Insert map div here ---------------->

<!--------------- End map div ---------------------->

</body>
</html>
