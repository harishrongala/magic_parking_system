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
    <li><a href="about_us.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->
  <div class="alert alert-info" id="owner_notify_class" >
  <center><h4 id="owner_notify_space"> Parking owners login here </h4></center>
</div>

<div class="row">
  <div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4">
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
    <button type="submit" class="btn btn-success" onclick="post_credentials()">Login</button>
</div>
</div>

<script>
function post_credentials()
{
  var emailid=$('#email').val();
  var pass=$('#pwd').val();
  $.post("owner_login_validate.php",{email: emailid, password: pass}, function(data){
    if(data!="Success")
    {
      $('#owner_notify_class').addClass('alert-danger').removeClass('alert-info');
      $('#owner_notify_space').html(data);
    }
    else if(data=="Success"){
      window.location.href="parking_owner_tool.php";
    }
  });

}
</script>

</body>
</html>
