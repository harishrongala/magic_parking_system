<?php
include 'invisible.php';
$conn=mysqli_connect(host,user,dbpass,db) or die("cant connect");
$email=mysqli_real_escape_string($conn, $_POST["email"]);
$pass=$_POST["pass"];
$quer="SELECT * FROM customer WHERE email='".$email."'";
$res=mysqli_query($conn,$quer) or die("Error querying");
if(mysqli_num_rows($res)==1)
{
  $row=mysqli_fetch_assoc($res);
  if($pass==$row["pass"]){
    header('Location: sample_dashboard.php');
	die();
  }
  else {
    echo "Invalid Email / Password";
  }
}
else {
  echo "Not registered or Incorrect Email";
}
mysqli_close($conn);
 ?>
