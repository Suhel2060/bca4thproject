<?php
require('dbconnect.php');
$query="select bookname,authorname,catagory,image,description,quantity from bookdetails";
$result=mysqli_query($conn,$query);
$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($data);

?>