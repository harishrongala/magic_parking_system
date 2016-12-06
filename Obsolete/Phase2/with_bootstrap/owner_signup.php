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
    <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
    <li><a href="about_us.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->
<div class="well">
  <center><h4> Parking owners register here </h4></center>
</div>
<div class="container-fluid">
<div class="row">
  <div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4">
  <form action="owner_register_update.php" method="post" >
      <label for="fname">First Name:</label>
    <div class="form-group">
      <input type="name" class="form-control" id="fname" name="fname">
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="name" class="form-control" id="lname" name="lname">
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="name" class="form-control" id="address" name="address">
    </div>
    <div class="form-group">
      <label for="zip">Zipcode:</label>
      <input type="name" class="form-control" id="zip" name="zip">
    </div>
    <div class="form-group">
      <label for="state">State:</label>
      <input type="name" class="form-control" id="state" name="state">
    </div>
    <div class="form-group">
      <label for="city">City:</label>
      <input type="name" class="form-control" id="city" name="city">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pass">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-success">Register</button>
  </form>
</div>
</div>
</div>
</body>
</html>
