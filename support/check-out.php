<?php
$_ticketid=$_POST['ticket'];
$conn=mysqli_connect("localhost","root","","magicparking");
$que="UPDATE tickets SET check_out='yes', state='inactive' WHERE ticket_id='$_ticketid'";
mysqli_query($conn,$que) or die("Error querying");
mysqli_close($conn);
 ?>
