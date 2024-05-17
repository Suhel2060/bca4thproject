<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
$query="select * from bookdetails order by book_issued desc";
$row=mysqli_query($conn,$query);
$result=mysqli_fetch_all($row,MYSQLI_ASSOC);
echo json_encode($result);
?>