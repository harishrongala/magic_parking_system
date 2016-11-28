<?php

class data{
	public $lat="";
	public $lon="";
}
$conn=mysqli_connect("localhost","root","","parking") or die("Unable to connect with database".mysqli_error);
$res=mysqli_query($conn,"SELECT * FROM 2cur") or die("Unable to query".mysql_error);
$container=array();
$num=mysqli_num_rows($res);
while($row=mysqli_fetch_assoc($res)){
	$container[]=$row;
	//echo "<p>".$row["locname"];
	//echo " Latitude: ".$row['lat']." Longitude: ";
	//echo "".$row['lon']."</p>";
}
print json_encode($container);
mysqli_close($conn);

?>