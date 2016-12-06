<?php
$_otp=$_GET['key'];
$_email_id=$_GET['email'];
$_type=$_GET['user'];
$conn=mysqli_connect("localhost","root","","magicparking");
if($_type=="owner"){
  $que="SELECT * FROM owner WHERE email='$_email_id'";
  $res=mysqli_query($conn,$que);
  if(mysqli_num_rows($res)>0)
  {
    $row=mysqli_fetch_assoc($res);
    if($row['otp']==$_otp){
      $sec_que="UPDATE owner SET is_verified='TRUE' WHERE email='$_email_id'";
      mysqli_query($conn,$sec_que);
      header('Location: owner_login.php');
      die();
    }
    else {
      echo "Invalid link";
    }
  }
}
else if($_type=="customer")
{
  $que="SELECT * FROM customer WHERE email='$_email_id'";
  $res=mysqli_query($conn,$que);
  if(mysqli_num_rows($res)>0)
  {
    $row=mysqli_fetch_assoc($res);
    if($row['otp']==$_otp){
      $sec_que="UPDATE customer SET is_verified='TRUE' WHERE email='$_email_id'";
      mysqli_query($conn,$sec_que);
      header('Location: login.php');
    }
  }
  else {
    echo "Invalid link";
  }
}




 ?>
