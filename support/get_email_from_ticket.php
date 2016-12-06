<?php
$ticket_id=$_POST['ticket'];
$conn=mysqli_connect("localhost","root","","magicparking");
$que="SELECT email FROM owner WHERE user_id=(SELECT owner_id FROM parkingspaces WHERE space_id=(SELECT space_id FROM tickets WHERE ticket_id='$ticket_id'))";
$res=mysqli_query($conn,$que) or die(mysqli_error($conn));
if(mysqli_num_rows($res)>0)
{
  $row=mysqli_fetch_assoc($res);
  echo $row['email'];
}
mysqli_close($conn);
 ?>
