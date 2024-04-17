<?php
require("dbconnect.php");
$query="select book_id,bookname,ISBN,authorname,image from bookdetails";
$rows=mysqli_query($conn,$query);
$data =mysqli_fetch_all($rows,MYSQLI_ASSOC);

echo json_encode($data);
?>