<?php
include "invisible.php";
$conn=mysqli_connect(host,user,dbpass,db) or die("cant connect to database");
$quer="SELECT * FROM complaints WHERE complaint_status='placed'";
$res=mysqli_query($conn,$quer) or die("Unable to query");
if(mysqli_num_rows($res)>0)
{
  while ($row=mysqli_fetch_assoc($res)){
    echo $row['ticket_id'];
  }
}
 ?>
