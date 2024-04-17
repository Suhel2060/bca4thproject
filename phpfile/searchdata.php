<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');

$searchtype=$_POST["searchtype"];
if($searchtype=="book"){
$search=$_POST["searchdata"];
$searchstring1="%,".$search."%";
$searchstring2="%".$search.",%";
$searchstring3="%".$search."%";
$searchstring5="%".$search."%";
// $searchstring3="%".$search."%";
$query="select * from bookdetails where tag like '$searchstring1' or tag like '$searchstring5' or tag like '$searchstring2' or bookname like '$searchstring3'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($row);
}
elseif($searchtype=="user"){
$search1=$_POST["searchdata"];
$searchstring4="%".$search1."%";
// $searchstring3="%".$search."%";
$query1="select * from userdetails where username like '$searchstring4'";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_all($result1,MYSQLI_ASSOC);
echo json_encode($row1);
}




?>
