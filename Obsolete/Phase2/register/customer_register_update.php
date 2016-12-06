<?php
include 'invisible.php';
$otp=rand(1000,9999);
$conn=mysqli_connect(host,user,dbpass,db) or die("cant connect");
$fname=mysqli_real_escape_string($conn, $_POST["fname"]);
$lname=mysqli_real_escape_string($conn, $_POST["lname"]);
$email=mysqli_real_escape_string($conn, $_POST["email"]);
$pass=mysqli_real_escape_string($conn, $_POST["pass"]);
$quer="SELECT * FROM customer WHERE email='".$email."'";
$res=mysqli_query($conn,$quer) or die("Error querying");
if(mysqli_num_rows($res)>0)
{
  echo "Already registered";
}
else {
  $quer="INSERT INTO customer (fname, lname, email, pass, otp) VALUES ('$fname','$lname','$email','$pass','$otp')";
  if(mysqli_query($conn,$quer)){
    echo "Account Created";
  }
}
mysqli_close($conn);
 ?>
