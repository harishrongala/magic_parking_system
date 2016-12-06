<?php
$to=$_POST['to_email'];
$subject=$_POST['subject'];
$message=$_POST['msg'];
mail($to,$subject,$message);
?>
