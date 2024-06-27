<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$username=$_POST["username"];
$query="select username,studentname,email,phonenumber,image from userdetails where username='$username'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
echo json_encode($row);

?>