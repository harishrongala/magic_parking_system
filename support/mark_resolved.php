<?php
$_reportid=$_POST['report'];
$conn=mysqli_connect("localhost","root","","magicparking");
$que="UPDATE complaints SET complaint_status='resolved' WHERE report_id='$_reportid'";
mysqli_query($conn,$que) or die("Error querying");
mysqli_close($conn);
 ?>
