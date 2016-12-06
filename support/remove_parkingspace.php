<?php
$_ownerid=$_POST['user'];
$_lat=$_POST['lat'];
$_lng=$_POST['lng'];
$conn=mysqli_connect("localhost","root","","magicparking") or die("Unable to connect with database".mysqli_error);
$que="DELETE FROM parkingspaces WHERE owner_id='$_ownerid' AND lat='$_lat' AND lon='$_lng'";
$res=mysqli_query($conn,$que) or die("Unable to query");
mysqli_close($conn);

?>
