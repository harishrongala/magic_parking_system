<?php
$ticket_id=$_POST['tickid'];
$conn=mysqli_connect("localhost","root","","magicparking");
$que="SELECT space_id FROM tickets WHERE ticket_id='$ticket_id'";
$res=mysqli_query($conn,$que);
if(mysqli_num_rows($res)>0)
{
  $row=mysqli_fetch_assoc($res);
  $space_id=$row['space_id'];
  $sec_que="SELECT * FROM parkingspaces WHERE space_id='$space_id'";
  $sec_res=mysqli_query($conn,$sec_que);
  if(mysqli_num_rows($sec_res)>0)
  {
    $container=array();
    while($sec_row=mysqli_fetch_assoc($sec_res)){
    	$container[]=$sec_row;
    }
    print json_encode($container);
  }
}
mysqli_close($conn);
 ?>
