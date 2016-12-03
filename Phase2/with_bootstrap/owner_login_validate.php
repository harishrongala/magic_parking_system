<?php
include 'invisible.php';
$conn=mysqli_connect(host,user,dbpass,db) or die("cant connect");
$email=mysqli_real_escape_string($conn, $_POST["email"]);
$pass=$_POST["password"];
$quer="SELECT * FROM owner WHERE email='".$email."'";
$res=mysqli_query($conn,$quer) or die("Error querying");
if(mysqli_num_rows($res)==1)
{
  $row=mysqli_fetch_assoc($res);
  if($pass==$row["pass"]){
    session_start();
    $_SESSION['userid']=$row["user_id"];
    echo "Success";
    //header('Location:parking_owner_tool.php');
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
