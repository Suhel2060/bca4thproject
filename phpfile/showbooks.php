<?php
require('dbconnect.php');
$query="select book_id,bookname,authorname,image,description,currentquantity,tag from bookdetails";
$result=mysqli_query($conn,$query);
$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($data);

?>