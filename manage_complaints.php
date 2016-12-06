<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Complaints</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login_custom_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  function mark_as_resolved(obj)
  {
    $.post("./support/mark_resolved.php",{report:obj});
    $.post("./support/get_email_from_report.php",{report:obj},function(dat){
        alert(dat);
        var email=dat;
        var msg="Your complaint has been resolved, you are good to park";
        var subject="Issue resolved";
        $.post("http://magicparking.x10host.com/send_mail.php",{to_email:email, subject:subject, msg:msg});
      });
    setTimeout(reload, 2000);
  }


  function reload()
  {
    location.reload();
  }
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
    <li><a href="owner_dash.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
    <li><a href="signout.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->

<input type="hidden" value=<?php echo $_SESSION['userid']; ?> id="getuserid"></input>

  <div class="container-fluid" id="ticket_container" style="padding-top:20px;">
<?php
$conn=mysqli_connect("localhost","root","","magicparking") or die("Unable to connect with database");
$_que="SELECT * FROM complaints WHERE owner_id=".$_SESSION['userid']." AND complaint_status='placed'";
$res=mysqli_query($conn,$_que);
if(mysqli_num_rows($res)>0)
{

  ?>

    <div class="row">
        <div class="col-md-12">
        <div class="panel panel-success">
          <div class="panel-heading">Active Complaints</div>

  <?php
  while($row=mysqli_fetch_assoc($res))
  {
      echo '<div class="panel-body">';
      echo '<i class="glyphicon glyphicon-tag"></i> Complaint placed on '.$row['time_reported']."     ";
      $idval1="#demo".$row['report_id'];
      $idval2="demo".$row['report_id'];
      echo '<span><i data-toggle="collapse" data-target='.'"'.$idval1.'"'.' class="button glyphicon glyphicon-chevron-down"></i></span>';
      echo '<div id="'.$idval2.'" class="collapse block_padding" >'.'

      <div class="row">
      <div class="col-xs-4 col-md-2">
        <label for="checkin_modal"> Space ID: </label>
      </div>
      <div class="col-xs-8 col-md-6">
      <div id="checkin_modal">'.$row['space_id'].'</div>
      </div>
      </div>

      <div class="row" >
        <div class="col-xs-4 col-md-2">
          <label for="checkin_modal"> Reason: </label>
        </div>
        <div class="col-xs-8 col-md-6">
          <div id="checkin_modal">'.$row['reason'].'</div>
        </div>
      </div>



      <div class="row">
      <div class="col-xs-4 col-md-2">
        <label for="checkin_modal"> Picture: </label>
      </div>
      <div class="col-xs-8 col-md-6">
        <img src="./user_images/'.$row['picture'].'"'.' style="width:100px; height:100px">
      </div>
      </div>

      <div class="row">
      <div class="col-xs-4 col-md-2">
      <button class="btn btn-success" id="padding_needed" onclick="mark_as_resolved('.$row['report_id'].')">Mark as resolved</button>
      </div>
      </div>'.'</div></div>';
  }
}

else {
 ?>
 <div class="row">
     <div class="col-md-12">
     <div class="panel panel-success">
       <div class="panel-heading">Active Complaints</div>

<div class="panel-body">
  <div class="col-md-6">No Active Complaints</div>
</div>
</div>
</div>
</div>
 <?php
}
  ?>
  </div>
  </div>
</div>



</div>
</body>
</html>
