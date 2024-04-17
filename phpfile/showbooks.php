<?php
require('dbconnect.php');
$query="select bookname,authorname,image,description,quantity,tag from bookdetails";
$result=mysqli_query($conn,$query);
$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($data);

?>