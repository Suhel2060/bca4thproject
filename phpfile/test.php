<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: multipart/form-data');
$username = $_POST['username'];
$query="select email, phonenumber from userdetails where username='$username'";
$row=mysqli_query($conn,$query);
$result=mysqli_fetch_all($row,MYSQLI_ASSOC);
echo json_encode($result);