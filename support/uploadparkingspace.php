<?php
include 'invisible.php';
$conn=mysqli_connect(host,user,dbpass,db) or die("cant connect");
$_user_id=mysqli_real_escape_string($conn,$_POST['userid']);
$_loc_lat=mysqli_real_escape_string($conn,$_POST['lat']);
$_loc_lng=mysqli_real_escape_string($conn,$_POST['lng']);
$_loc_address=mysqli_real_escape_string($conn,$_POST['address']);
$_max=mysqli_real_escape_string($conn,$_POST['max']);
$uploaddir = 'C:\wamp64\www\Parking\magic_parking_system\user_images\\';
$uploadfile = $uploaddir .$_user_id. basename($_FILES['userfile']['name']);
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
$picname=$_user_id. basename($_FILES['userfile']['name']);
$que="INSERT INTO parkingspaces (owner_id, lat, lon, address, price, picture) VALUES ('$_user_id', '$_loc_lat', '$_loc_lng', '$_loc_address', '$_max', '$picname')";
mysqli_query($conn,$que);
mysqli_close($conn);
?>
