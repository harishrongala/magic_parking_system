<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Reservations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login_custom_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="scripts/moment.js"></script>
  <script>

function take_me(obj)
{
  window.location.href=("take_me_to_parking.php?id="+obj);
}

function cancel_it(obj)
{
  var val="#"+'tag'+obj;
  var chk=moment($(val).val());
  var nw=moment();
  if(nw.diff(chk,'hours')>24)
  {
  $.post("./support/cancel_ticket.php",{ticket:obj},function(data){
    alert(data);
    location.reload();
  });
}
else {
  alert("You cannot cancel within 24 hours of checkin time");
}
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
    <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
    <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
  </ul>
</div>
</div>
</nav>
<!------------------- Navigation bar ends ------------------------->

<input type="hidden" value=<?php echo $_SESSION['userid']; ?> id="getuserid"></input>

  <div class="container-fluid" id="ticket_container" style="padding-top:20px;">
<?php
$conn=mysqli_connect("localhost","root","","magicparking") or die("Unable to connect with database");
$_que="SELECT * FROM tickets WHERE user_id=".$_SESSION['userid']." AND state='booked'";
$res=mysqli_query($conn,$_que);
if(mysqli_num_rows($res)>0)
{

  ?>
  <div class="row">
      <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Active Tickets</div>


  <?php
  while($row=mysqli_fetch_assoc($res))
  {
      echo '<div class="panel-body">';
      echo '<i class="glyphicon glyphicon-tag"></i> Reservation from '.$row['check_in_time']."     ";
      $idval1="#demo".$row['ticket_id'];
      $idval2="demo".$row['ticket_id'];
      echo '<span><i data-toggle="collapse" data-target='.'"'.$idval1.'"'.' class="button glyphicon glyphicon-chevron-down"></i></span>';
      echo '<div id="'.$idval2.'" class="collapse block_padding" >'.'  <div class="row" >
        <div class="col-xs-5 col-md-2">
          <label for="checkin_modal"> Checkin: </label>
        </div>
        <div class="col-xs-7 col-md-6">
          <div id="checkin_modal">'.$row['check_in_time'].'</div>
        </div>
      </div>

      <div class="row">
      <div class="col-xs-5 col-md-2">
        <label for="checkout_modal"> Checkout: </label>
      </div>
      <div class="col-xs-7 col-md-6">
        <div id="checkout_modal">'.$row['check_out_time'].'</div>
      </div>
      </div>

      <div class="row">
      <div class="col-xs-5 col-md-2">
      <label for="duration_modal"> Duration: </label>
      </div>
      <div class="col-xs-7 col-md-6">
      <div id="duration_modal">'.$row['duration'].'</div>
      </div>
      </div>

      <div class="row">
      <div class="col-xs-5 col-md-2">
      <label for="price_modal"> Price: </label>
      </div>
      <div class="col-xs-7 col-md-6">
      <div id="price_modal">$'.$row['amount'].'</div>
      </div>
      </div>

      <div class="row">
      <div class="col-xs-5 col-md-2">
      <label for="price_modal"> Car Number: </label>
      </div>
      <div class="col-xs-7 col-md-6">
      <div id="price_modal">'.$row['customer_car_num'].'</div>
      </div>
      </div>

      <div class="row">
      <div class="col-xs-2 col-md-2">
      <button class="btn btn-success" id="padding_needed" onclick="take_me('.$row['ticket_id'].')">Take me to parking</button>
      </div>
      <input type="hidden" id="tag'.$row['ticket_id'].'" value="'.$row['check_in_time'].'" >
      <div class="col-xs-2 col-xs-offset-3 col-md-1 col-md-offset-0">
      <button class="btn btn-danger" id="padding_needed" onclick="cancel_it('.$row['ticket_id'].')">Cancel</button>
      </div>
      </div>
      '.'</div></div>';
  }
}
else {
  ?>
  <div class="row">
      <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Active Tickets</div>
  <div class="panel-body"> No Active tickets</div>
</div>
</div>
</div>

<?php
}
$_que="SELECT * FROM tickets WHERE user_id=".$_SESSION['userid']." AND state='cancelled'";
$res=mysqli_query($conn,$_que);
if(mysqli_num_rows($res)>0)
{
 ?>
  </div>
  </div>
</div>






<div class="row">
    <div class="col-md-12">
    <div class="panel panel-danger">
      <div class="panel-heading">Cancelled Tickets</div>
<?php
while($row=mysqli_fetch_assoc($res))
{
    echo '<div class="panel-body">';
    echo '<i class="glyphicon glyphicon-tag"></i> Reservation on '.$row['check_in_time']."     ";
    $idval1="#demo".$row['ticket_id'];
    $idval2="demo".$row['ticket_id'];
    echo '<span><i data-toggle="collapse" data-target='.'"'.$idval1.'"'.' class="button glyphicon glyphicon-chevron-down"></i></span>';
    echo '<div id="'.$idval2.'" class="collapse block_padding" >'.'  <div class="row" >
      <div class="col-xs-5 col-md-2">
        <label for="checkin_modal"> Checkin: </label>
      </div>
      <div class="col-xs-7 col-md-6">
        <div id="checkin_modal">'.$row['check_in_time'].'</div>
      </div>
    </div>

    <div class="row">
    <div class="col-xs-5 col-md-2">
      <label for="checkout_modal"> Checkout: </label>
    </div>
    <div class="col-xs-7 col-md-6">
      <div id="checkout_modal">'.$row['check_out_time'].'</div>
    </div>
    </div>

    <div class="row">
    <div class="col-xs-5 col-md-2">
    <label for="duration_modal"> Duration: </label>
    </div>
    <div class="col-xs-7 col-md-6">
    <div id="duration_modal">'.$row['duration'].'</div>
    </div>
    </div>

    <div class="row">
    <div class="col-xs-5 col-md-2">
    <label for="price_modal"> Price: </label>
    </div>
    <div class="col-xs-7 col-md-6">
    <div id="price_modal">$'.$row['amount'].'</div>
    </div>
    </div>

    <div class="row">
    <div class="col-xs-5 col-md-2">
    <label for="price_modal"> Car Number: </label>
    </div>
    <div class="col-xs-7 col-md-6">
    <div id="price_modal">'.$row['customer_car_num'].'</div>
    </div>
    </div>

    '.'</div></div>';
}
}

$_que="SELECT * FROM tickets WHERE user_id=".$_SESSION['userid']." AND state='inactive'";
$res=mysqli_query($conn,$_que);
if(mysqli_num_rows($res)>0)
{
?>
</div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
    <div class="panel panel-warning">
      <div class="panel-heading">Past Tickets</div>
      <?php
      while($row=mysqli_fetch_assoc($res))
      {
          echo '<div class="panel-body">';
          echo '<i class="glyphicon glyphicon-tag"></i> Reservation on '.$row['check_in_time']."     ";
          $idval1="#demo".$row['ticket_id'];
          $idval2="demo".$row['ticket_id'];
          echo '<span><i data-toggle="collapse" data-target='.'"'.$idval1.'"'.' class="button glyphicon glyphicon-chevron-down"></i></span>';
          echo '<div id="'.$idval2.'" class="collapse block_padding" >'.'  <div class="row" >
            <div class="col-xs-5 col-md-2">
              <label for="checkin_modal"> Checkin: </label>
            </div>
            <div class="col-xs-7 col-md-6">
              <div id="checkin_modal">'.$row['check_in_time'].'</div>
            </div>
          </div>

          <div class="row">
          <div class="col-xs-5 col-md-2">
            <label for="checkout_modal"> Checkout: </label>
          </div>
          <div class="col-xs-7 col-md-6">
            <div id="checkout_modal">'.$row['check_out_time'].'</div>
          </div>
          </div>

          <div class="row">
          <div class="col-xs-5 col-md-2">
          <label for="duration_modal"> Duration: </label>
          </div>
          <div class="col-xs-7 col-md-6">
          <div id="duration_modal">'.$row['duration'].'</div>
          </div>
          </div>

          <div class="row">
          <div class="col-xs-5 col-md-2">
          <label for="price_modal"> Price: </label>
          </div>
          <div class="col-xs-7 col-md-6">
          <div id="price_modal">$'.$row['amount'].'</div>
          </div>
          </div>

          <div class="row">
          <div class="col-xs-5 col-md-2">
          <label for="price_modal"> Car Number: </label>
          </div>
          <div class="col-xs-7 col-md-6">
          <div id="price_modal">'.$row['customer_car_num'].'</div>
          </div>
          </div>

          '.'</div></div>';
      }
      }
?>
</div>
</div>
</div>
</div>
</body>
</html>
