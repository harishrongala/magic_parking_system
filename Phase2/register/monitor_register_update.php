<?php
include 'invisible.php';
$otp=rand(1000,9999);
$conn=mysqli_connect(host,user,dbpass,db) or die("cant connect");
$fname=mysqli_real_escape_string($conn, $_POST["fname"]);
$lname=mysqli_real_escape_string($conn, $_POST["lname"]);
$email=mysqli_real_escape_string($conn, $_POST["email"]);
$pass=mysqli_real_escape_string($conn, $_POST["pass"]);
$ownerid=mysqli_real_escape_string($conn, $_POST["owner_id"]);
$mobile=mysqli_real_escape_string($conn, $_POST["mobile"]);
$quer="SELECT * FROM monitor WHERE email='".$email."'";
$res=mysqli_query($conn,$quer) or die("Error querying");
if(mysqli_num_rows($res)>0)
{
  echo "Email already registered";
}
else {
  $quer="SELECT * FROM owner WHERE user_id='".$ownerid."'";
  $res=mysqli_query($conn,$quer) or die("Error querying");
  if(mysqli_num_rows($res)==0){
    echo "Invalid Owner ID";
  }
  else {
    $quer="INSERT INTO monitor (fname, lname, email, pass, otp, owner_id, phone) VALUES ('$fname','$lname','$email','$pass','$otp','$ownerid','$mobile')";
    if(mysqli_query($conn,$quer)){
      echo "Account Created";
    }
  }
}
mysqli_close($conn);
 ?>
