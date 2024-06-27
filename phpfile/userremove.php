<?php
require("dbconnect.php");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$data = json_decode(file_get_contents("php://input"), true);
$username=$data["username"];
$name=$data["studentname"];
$query="select * from issuebooks where username='$username'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)==0){
$query="select image from userdetails where username='$username'";
if($image=mysqli_query($conn,$query)){
    $result=mysqli_fetch_assoc($image);
$query="delete from userdetails where username='$username'";
if(mysqli_query($conn,$query)){
$imageurl="../admin/addstudents/studentimg/".$result['image'];
unlink($imageurl);
echo json_encode(["remove" => true, "error" => mysqli_error($conn)]);
}
else{
    echo json_encode(["remove" => false]);
}

}else{
    echo json_encode(["remove" => false]);
}
}else{
    echo json_encode(["remove" => false]);
}
?>