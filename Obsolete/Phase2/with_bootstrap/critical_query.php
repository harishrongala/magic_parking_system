<?php
$_user_chkin=$_GET['checkin'];
$_user_chkout=$_GET['checkout'];
$_user_filter=$_GET['filter'];
$cur_lat=$_GET['lat'];
$cur_lon=$_GET['lon'];
$conn=mysqli_connect("localhost","root","","magicparking");
$sec_que="CREATE OR REPLACE VIEW withoutfilter AS SELECT * FROM parkingspaces WHERE space_id NOT IN (SELECT DISTINCT space_id FROM tickets WHERE (( check_in_time BETWEEN '$_user_chkin' AND '$_user_chkout') OR (check_out_time BETWEEN '$_user_chkin' AND '$_user_chkout')) OR (( '$_user_chkin' BETWEEN check_in_time AND check_out_time) OR ('$_user_chkout' BETWEEN check_in_time AND check_out_time)))";
$sec_res=mysqli_query($conn,$sec_que);
switch($_user_filter)
{
case 'Show all':
    $lon_que="CREATE OR REPLACE VIEW 2cur AS SELECT * FROM withoutfilter";
    mysqli_query($conn,$lon_que) or die("unable to query");
    break;
case 'Within 2 miles':
    $lon_que="CREATE OR REPLACE VIEW 2cur AS SELECT *, ( 3959 * acos( cos( radians('$cur_lat') ) * cos( radians( lat ) ) * cos( radians( lon ) - radians('$cur_lon') ) + sin( radians('$cur_lat') ) * sin( radians( lat ) ) ) ) AS distance FROM withoutfilter HAVING distance < 2 ORDER BY distance";
    mysqli_query($conn,$lon_que) or die("unable to query");
    echo "2 miles handled";
    break;
case 'Within 3 miles':
    $lon_que="CREATE OR REPLACE VIEW 2cur AS SELECT *, ( 3959 * acos( cos( radians('$cur_lat') ) * cos( radians( lat ) ) * cos( radians( lon ) - radians('$cur_lon') ) + sin( radians('$cur_lat') ) * sin( radians( lat ) ) ) ) AS distance FROM withoutfilter HAVING distance < 3 ORDER BY distance";
    mysqli_query($conn,$lon_que) or die("unable to query");
    echo "3 miles handled";
    break;
case 'Within 5 miles':
    $lon_que="CREATE OR REPLACE VIEW 2cur AS SELECT *, ( 3959 * acos( cos( radians('$cur_lat') ) * cos( radians( lat ) ) * cos( radians( lon ) - radians('$cur_lon') ) + sin( radians('$cur_lat') ) * sin( radians( lat ) ) ) ) AS distance FROM withoutfilter HAVING distance < 5 ORDER BY distance";
    mysqli_query($conn,$lon_que) or die("unable to query");
    echo "5 miles handled";
    break;
case 'Within 10 miles':
    $lon_que="CREATE OR REPLACE VIEW 2cur AS SELECT *, ( 3959 * acos( cos( radians('$cur_lat') ) * cos( radians( lat ) ) * cos( radians( lon ) - radians('$cur_lon') ) + sin( radians('$cur_lat') ) * sin( radians( lat ) ) ) ) AS distance FROM withoutfilter HAVING distance < 10 ORDER BY distance";
    mysqli_query($conn,$lon_que) or die("unable to query");
    echo "10 miles handled";
    break;
default:
    break;
}
?>
