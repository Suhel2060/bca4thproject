<?php
require("dbconnect.php");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$data = json_decode(file_get_contents("php://input"), true);
$username=$data["username"];
$bookname=$data["bookname"];
$bookid=$data["bookid"];
$query="delete from issuebooks where username='$username' and individual_book_id=$bookid";
if(mysqli_query($conn,$query)){
    $query="select currentquantity from bookdetails where bookname='$bookname'";
   $result= mysqli_query($conn,$query);
    $result1=mysqli_fetch_assoc($result);
    $currentquantity=intval($result1["currentquantity"]);
    $currentquantity=$currentquantity+1;
    $query="update bookdetails set currentquantity=$currentquantity where bookname='$bookname'";
    mysqli_query($conn,$query);
    $query="update individual_book set book_issue_status='notissued' where individual_book_id='$bookid'";
    mysqli_query($conn,$query);



echo json_encode(["remove" => true]);
}
else{
    echo json_encode(["remove" => false]);
}
?>