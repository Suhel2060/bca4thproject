<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$data = json_decode(file_get_contents("php://input"), true);
$username=$data['username'];
$query="select bookname,individual_book_id,returndate,issueddate,description,authorname,tag,image from issuebooks natural join individual_book natural join bookdetails where username='$username' and book_issue_status='issued'";
if($row=mysqli_query($conn,$query)){
    $result=mysqli_fetch_all($row,MYSQLI_ASSOC);
    echo json_encode($result);
}