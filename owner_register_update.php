<?php
include 'invisible.php';
$otp=rand(1000,9999);
$conn=mysqli_connect(host,user,dbpass,db) or die("cant connect");
$fname=mysqli_real_escape_string($conn, $_POST["fname"]);
$lname=mysqli_real_escape_string($conn, $_POST["lname"]);
$email=mysqli_real_escape_string($conn, $_POST["email"]);
$pass=mysqli_real_escape_string($conn, $_POST["pass"]);
$phone=mysqli_real_escape_string($conn, $_POST["phone"]);
$quer="SELECT * FROM owner WHERE email='".$email."'";
$res=mysqli_query($conn,$quer) or die("Error querying");
if(mysqli_num_rows($res)>0)
{
  echo "Email al-ready registered";
}
else {
  $quer="INSERT INTO owner (fname, lname, email, pass, otp, is_verified, phone) VALUES ('$fname','$lname','$email','$pass','$otp','TRUE','$phone')";
  if(mysqli_query($conn,$quer)){
    echo "Account Created, Check your Email for confirmation";
    ?>
    <script>
    var msg="Hello "+<?php echo $fname; ?>+" click the following link to activate your account";
    </script>
    <?php
  }
}
mysqli_close($conn);
 ?>
