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
$query="update issuebooks set book_issue_status='returned' where username='$username' and individual_book_id='$bookid'";
try{
    $conn->begin_transaction();
if(mysqli_query($conn,$query)){
    $query="update individual_book set book_issue_status='notissued' where individual_book_id='$bookid'";
    if(mysqli_query($conn,$query)){
        $query="select currentquantity from bookdetails where bookname='$bookname'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
        $currentquantity=intval($row['currentquantity']);
        $currentquantity=$currentquantity+1;
        $query="update bookdetails set currentquantity=$currentquantity where bookname='$bookname'";
        if(mysqli_query($conn,$query)){
        echo json_encode(["bookreturned" => "successful"]);
        } else{
            throw new Exception("data update unsuccessful");
        }
    }
    else{
        throw new Exception("data update unsuccessful");
    }
}else{
    throw new Exception("data update unsuccessful");
}
$conn->commit();
}catch(Exception $e){
$conn->rollback();
echo json_encode(["error" => $e->getMessage()]);
}
?>