<?php
$email=$_POST['email'];
$password=hash("md5",$_POST['pass']);
echo("Got them ");
echo($email);
echo($password);
?>