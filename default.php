<!DOCTYPE html>
<html lang="en">
<head>
  <title>Magic Parking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<!------------------- Navigation bar ---------------->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="initial.php"><img src="images/logo2.png" style="width:90px; height:35px;"></a>
  </div>
  <div class="collapse navbar-collapse" id="mynavbar">
  <ul class="nav navbar-nav navbar-right">
      <li><a href="business.php"><span class="glyphicon glyphicon-briefcase"></span> Business Users</a></li>
    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->

<!----------------- Carousel Slide Show ---------------------------->
<div class="carousel slide" id="welcome_slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-taget="#welcome_slide" data-slide-to="0" class="active"></li>
    <li data-target="welcome_slide" data-slide-to="1"></li>
    <li data-target="welcome_slide" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <a href="#"><img src="images/one.jpg"></a>
    </div>

    <div class="item">
      <img src="images/two.jpg">
    </div>

    <div class="item">
      <img src="images/three.jpg">
    </div>
  </div>

  <a class="left carousel-control" href="#welcome_slide" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" area-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>

  <a class="right carousel-control" href="#welcome_slide" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" area-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!------------------- Carousel ends---------------------->




<!------------------- Login form --------------------------->


<!-------------------- Login form ends --------------------->

</body>
</html>
