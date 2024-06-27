<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$bookid=$_POST["bookid"];
$query="select * from bookdetails where book_id='$bookid'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
echo json_encode($row);

?>