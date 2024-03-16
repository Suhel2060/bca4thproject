<?php
require("dbconnect.php");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$data = json_decode(file_get_contents("php://input"), true);
$username=$data["username"];
$bookname=$data["bookname"];
$query="delete from issuebooks where username='$username' and bookname='$bookname'";
if(mysqli_query($conn,$query)){
echo json_encode(["remove" => true]);
}
else{
    echo json_encode(["remove" => false]);
}
?>