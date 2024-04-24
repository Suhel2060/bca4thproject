<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$data = json_decode(file_get_contents("php://input"), true);
$searchname=$data["searchdataname"];
$searchid=$data["searchdataid"];
if($searchname=="null"){
    $searchstring2="%".$searchid."%";
    $searchstring1="%".$searchid."%";
}elseif($searchid=="null"){
    $searchstring1="%".$searchname."%";
    $searchstring2="%".$searchname."%";
}else{
    $searchstring1="%".$searchid."%";
    $searchstring2="%".$searchname."%";
}

// $searchstring3="%".$search."%";
if($searchname=="null"||$searchid=="null"){
$query="select individual_book_id,bookname from bookdetails natural join individual_book where bookname like '$searchstring2' or individual_book_id like '$searchstring1' and book_issue_status='notissued' and book_status='available'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($row);
}
else{
    $query="select individual_book_id from bookdetails natural join individual_book where bookname like '$searchstring2' and individual_book_id like '$searchstring1' and book_issue_status='notissued' and book_status='available'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($row); 
}





?>
