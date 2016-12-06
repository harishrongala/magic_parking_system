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
  echo "Email al-ready registered";
}
else {
  $quer="INSERT INTO customer (fname, lname, email, pass, otp) VALUES ('$fname','$lname','$email','$pass','$otp')";
  if(mysqli_query($conn,$quer)){
    $url="http://magicparking.x10host.com/verify.php";
    $key="iamlegend";
    $user_mail=$email;
    $data='key='.$key.'&user='.$user_mail;
    $msg='';
    echo "Account Created, Check your Email for confirmation";
  }
}
mysqli_close($conn);
 ?>
