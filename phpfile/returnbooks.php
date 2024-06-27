<?php
require('dbconnect.php');
$query="select username,bookname,individual_book_id,book_issue_status,issueddate,returndate from issuebooks natural join bookdetails natural join individual_book";
$result=mysqli_query($conn,$query);
$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($data);

?>