<?php
$cur_lat=$_POST["cur_lat"];
$cur_lon=$_POST["cur_lon"];
//$cur_lat="40.750313";
//$cur_lon="-74.053935";
$con=mysqli_connect("localhost","root","","parking");
$qu1="IF EXISTS(DROP VIEW 2cur)";
mysqli_query($con,$qu1);
$qu="CREATE OR REPLACE VIEW 2cur AS SELECT *, ( 3959 * acos( cos( radians(".$cur_lat.") ) * cos( radians( lat ) ) * cos( radians( lon ) - radians(".$cur_lon.") ) + sin( radians(".$cur_lat.") ) * sin( radians( lat ) ) ) ) AS distance FROM availability HAVING distance < 0.5 ORDER BY distance LIMIT 0 , 20";
$res=mysqli_query($con,$qu);
print($res);
mysqli_close($con);
/*

*/
?>


    