<?php
$report=$_POST['report'];
$conn=mysqli_connect("localhost","root","","magicparking");
$que="SELECT email FROM customer WHERE user_id=(SELECT user_id FROM tickets WHERE ticket_id=(SELECT ticket_id FROM complaints WHERE report_id='$report'))";
$res=mysqli_query($conn,$que) or die(mysqli_error($conn));
if(mysqli_num_rows($res)>0)
{
  $row=mysqli_fetch_assoc($res);
  echo $row['email'];
}
mysqli_close($conn);
 ?>
