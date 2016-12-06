<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login_custom_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  $(document).ready(function (){
$('#formdata').submit(function(event){
  event.preventDefault();
  if($('#fname').val()=="" | $('#lname').val()=="" | $('#email').val()=="" | $('#pwd').val()=="")
  {
    $('#alert_class').addClass("alert-danger").removeClass("alert-info").removeClass("alert-success");
    $('#change_val').html("Please fill all the fields");
  }
  else {

  var data=$(this).serializeArray();
  $.post("customer_register_update.php",data,function(ret){
    if(ret.startsWith('A'))
    {
      $('#alert_class').addClass("alert-success").removeClass("alert-info");
      $('#change_val').html(ret);
    }
    else {
      $('#alert_class').addClass("alert-danger").removeClass("alert-info").removeClass("alert-success");
      $('#change_val').html(ret);
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
    <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->
<div class="alert alert-info" id="alert_class">
  <center><h4 id="change_val"> Car users register here </h4></center>
</div>
<div class="container-fluid">
<div class="row">
  <div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4">
  <form action="" method="post" id="formdata">
      <label for="fname">First Name:</label>
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input type="name" class="form-control" id="fname" name="fname">
    </div>
    </div>
    <div class="form-group">
        <label for="lname">Last Name:</label>
      <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input type="name" class="form-control" id="lname" name="lname">
    </div>
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <div class="input-group">

        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input type="password" class="form-control" id="pwd" name="pass">
    </div>
    </div>
    <button type="submit" class="btn btn-success" >Register</button>
  </form>
</div>
</div>
</div>
</body>
</html>
