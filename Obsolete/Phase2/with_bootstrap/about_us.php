<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="login_custom_style.css">
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
    <a class="navbar-brand" href="initial.php"><img src="logo2.png" style="width:90px; height:35px;"/></a>
  </div>
  <div class="collapse navbar-collapse" id="mynavbar">
  <ul class="nav navbar-nav navbar-right">
    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->
<div class="well">
  <center><h4> About Us </h4></center>
</div>
<div class="container-fluid">
<div class="row">
  <div class="col-sm-4 thumbnail">
    <img src="harish.png" class="img-circle" style="width: 30%;">
    <center><h4> Something about them </h4></center>
  </div>
    <div class="col-sm-4 thumbnail">
    <img src="harish.png" class="img-circle" style="width: 30%;">
    <center><h4> Something about them </h4></center>
  </div>
  <div class="col-sm-4 thumbnail">
    <img src="harish.png" class="img-circle" style="width: 30%;">
    <center><h4> Something about them </h4></center>
  </div>

</div>
</div>
</body>
</html>
