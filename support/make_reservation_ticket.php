<?php
include 'invisible.php';
$conn=mysqli_connect(host,user,dbpass,db) or die("cant connect");
$_user_id=mysqli_real_escape_string($conn,$_POST['userid']);
$_space_id=mysqli_real_escape_string($conn,$_POST['spaceid']);
$_chkin=mysqli_real_escape_string($conn,$_POST['res_chkin']);
$_chkout=mysqli_real_escape_string($conn,$_POST['res_chkout']);
$_time_of_booking=mysqli_real_escape_string($conn,$_POST['time_of_bo']);
$_duration=mysqli_real_escape_string($conn,$_POST['duration']);
$_amount=mysqli_real_escape_string($conn,$_POST['amount']);
$_cust_car=mysqli_real_escape_string($conn,$_POST['cust_car']);
$pri_que="SELECT space_id FROM 2cur WHERE space_id='$_space_id'";
$pri_res=mysqli_query($conn,$pri_que);
if(mysqli_num_rows($pri_res)>0)
{
$sec_que="INSERT INTO tickets(user_id, space_id, time_of_booking, check_in_time, check_out_time, duration, amount, customer_car_num, state) VALUES('$_user_id','$_space_id','$_time_of_booking','$_chkin','$_chkout','$_duration','$_amount','$_cust_car','booked')";
mysqli_query($conn,$sec_que) or die("Error secondary");
}
else {
  echo "unavailable";
}
mysqli_close($conn);
?>
