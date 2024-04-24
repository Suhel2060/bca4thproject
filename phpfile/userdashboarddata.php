<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$data = json_decode(file_get_contents("php://input"), true);
$tag=$data['tags'];
$searchstring1="%,".$tag."%";
$searchstring2="%".$tag.",%";
$searchstring3="%".$tag."%";
$query="select * from bookdetails where tag like '$searchstring1' or tag like '$searchstring2' or tag like '$searchstring3'";
$row=mysqli_query($conn,$query);
$result=mysqli_fetch_all($row,MYSQLI_ASSOC);
echo json_encode($result);
?>