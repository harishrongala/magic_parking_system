<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login_custom_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  $(document).ready(function (){
$('#login_form').submit(function(event){
  event.preventDefault();
  if($('#email').val()=="" | $('#pwd').val()=="")
  {
    $('#alert_class').addClass("alert-danger").removeClass("alert-info");
    $('#change_val').html("Fill all the fields");
  }
else {
  var data=$(this).serializeArray();
  $.post("customer_login_validate.php",data,function(ret){
    if(ret!=="dashboard.php")
    {
      $('#alert_class').addClass("alert-danger").removeClass("alert-info");
      $('#change_val').html(ret);
    }
    else {
      window.location.href=ret;
    }
  });
}
});
});
  </script>
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
    <a class="navbar-brand" href="default.php"><img src="images/logo2.png" style="width:90px; height:35px;"/></a>
  </div>
  <div class="collapse navbar-collapse" id="mynavbar">
  <ul class="nav navbar-nav navbar-right">
    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->
<div class="alert alert-info" id="alert_class">
  <center><h4 id="change_val">Car users login here </h4></center>
</div>
<div class="container-fluid">
<div class="row">
  <div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4">
  <form action="" method="post" id="login_form">
    <div class="form-group ">
      <label for="email" class="input-group">Email address:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="email" class="form-control" id="email" name="email">
      </div>
    </div>

    <div class="form-group">
      <label for="pwd" class="input-group">Password:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input type="password" class="form-control" id="pwd" name="pass">
    </div>
  </div>
    <button type="submit" class="btn btn-success">Login</button>
  </form>
</div>
</div>
</div>
</body>
</html>
