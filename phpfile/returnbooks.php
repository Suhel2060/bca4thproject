<?php
require('dbconnect.php');
$query="select * from issuebooks";
$result=mysqli_query($conn,$query);
$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($data);

?>