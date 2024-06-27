<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$bookid=intval($_POST['bookid']);
require('dbconnect.php');
$query="select book_id from individual_book natural join issuebooks where book_id=$bookid";
$row=mysqli_query($conn,$query);
$result=mysqli_fetch_row($row);
if($result==0){
    $query="select image from bookdetails where book_id='$bookid'";

    $result=mysqli_query($conn,$query);
    $image=mysqli_fetch_assoc($result);
    if(!$image['image']=="null"){
    $imageurl='../admin/adminaddbooks/bookimg/'.$image['image'];
    unlink($imageurl);
    }
$conn->begin_transaction();
try{
$conn->query("delete from individual_book where book_id=$bookid");
$conn->query("delete from bookdetails where book_id=$bookid");
$conn->commit();
echo json_encode(["remove" => true]);

}
catch(Exception $e){
    $conn->rollback();
    echo json_encode(["remove" => false]);

}
}
else{
    echo json_encode(["remove" => false]);
}