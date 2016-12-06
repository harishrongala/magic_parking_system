<?php
$_ownerid=$_POST['user'];
$_lat=$_POST['lat'];
$_lng=$_POST['lng'];
$conn=mysqli_connect("localhost","root","","magicparking") or die("Unable to connect with database".mysqli_error);
$que="SELECT * FROM parkingspaces WHERE owner_id='$_ownerid' AND lat='$_lat' AND lon='$_lng'";
$res=mysqli_query($conn,$que) or die("Unable to query".mysql_error);
$container=array();
$num=mysqli_num_rows($res);
while($row=mysqli_fetch_assoc($res)){
	$container[]=$row;
}
print json_encode($container);
mysqli_close($conn);

?>
