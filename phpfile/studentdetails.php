<?php
require("dbconnect.php");
$query="select username,email,userstatus,studentname,image from userdetails";
$rows=mysqli_query($conn,$query);
$data =mysqli_fetch_all($rows,MYSQLI_ASSOC);

echo json_encode($data);
?>