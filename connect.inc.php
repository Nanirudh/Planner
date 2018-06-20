<?php
$mysqli_host='localhost';
$mysqli_user='root';
$mysqli_pass='';
$mysqli_db='adatabase';
$con=new mysqli($mysqli_host,$mysqli_user,$mysqli_pass,$mysqli_db);
if($con->connect_error)
die("Connection failed: ".$con->connect_error);


?>