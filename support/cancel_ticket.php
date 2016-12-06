<?php
include 'invisible.php';
$conn=mysqli_connect(host,user,dbpass,db) or die("cant connect");
$_ticket_id=mysqli_real_escape_string($conn,$_POST['ticket']);
$pri_que="UPDATE tickets SET state='cancelled' WHERE ticket_id='$_ticket_id'";
$pri_res=mysqli_query($conn,$pri_que);
echo "Ticket cancelled";
mysqli_close($conn);
?>
