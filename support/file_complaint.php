<?php
$_ticketid=$_POST['ticket_id'];
$_time_reported=$_POST['timereported'];
$_reason=$_POST['com_reason'];
$uploaddir = 'C:\wamp64\www\Parking\user_images\\';
$uploadfile = $uploaddir .$_ticketid. basename($_FILES['userfile']['name']);
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
$_pic_loc=$_ticketid. basename($_FILES['userfile']['name']);

$conn=mysqli_connect("localhost","root","","magicparking");
$pri_que="SELECT space_id FROM tickets WHERE ticket_id='$_ticketid'";
$pri_res=mysqli_query($conn,$pri_que) or die("pri error");
if(mysqli_num_rows($pri_res)>0)
{
  $pri_row=mysqli_fetch_assoc($pri_res);
  $_spaceid=$pri_row['space_id'];
}
$sec_que="SELECT owner_id FROM parkingspaces WHERE space_id='$_spaceid'";
$sec_res=mysqli_query($conn,$sec_que) or die("sec error");
if(mysqli_num_rows($sec_res)>0)
{
  $sec_row=mysqli_fetch_assoc($sec_res);
  $_ownerid=$sec_row['owner_id'];
}

$ter_que="INSERT INTO complaints (ticket_id, space_id, owner_id, time_reported, complaint_status, reason, picture) VALUES('$_ticketid', '$_spaceid', '$_ownerid', '$_time_reported', 'placed', '$_reason', '$_pic_loc')";
mysqli_query($conn,$ter_que) or die("ter error".mysqli_error($conn));
echo"Complaint placed";
mysqli_close($conn);



 ?>
