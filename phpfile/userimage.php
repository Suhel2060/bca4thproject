<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$data = json_decode(file_get_contents("php://input"), true);
$username=$data["username"];
if(!($username=="")){
    if(checkusername($username)){
        senduserimage($username);
    }
}

function senduserimage($userid){
    require("dbconnect.php");
    $query = "select image from userdetails where username='$userid'";
    $result1 = mysqli_query($conn, $query);
    if($row=mysqli_fetch_all($result1)){
        echo json_encode(["imagestatus" => "true", "image" => $row]);
    }
}


function checkusername($userid){
    require("dbconnect.php");
    $query = "select username from userdetails where username='$userid'";
    $result1 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result1) > 0) {
        return true;
        // echo json_encode(["userstatus" => "found"]);
        // json_encode(["status" => "true"]);
    } else {
        echo json_encode(["userstatus" => "notfound"]);
    }
}
?>