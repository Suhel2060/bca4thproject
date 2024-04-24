<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8' );
$data = json_decode(file_get_contents("php://input"), true);
$username=$data['username'];
$password=$data['password'];
$query="select username from userdetails where username='$username'";
if($rows=mysqli_query($conn,$query)){
    if(mysqli_num_rows($rows)>0){
        $changepassword=password_hash($password,PASSWORD_DEFAULT);
        $query="update userdetails set password='$changepassword' where username='$username'";
        if(mysqli_query($conn,$query)){
            echo json_encode(["success" => true]);
        }else{
            echo json_encode(["success" => false]);
        }
    }else{
        echo json_encode(["success" => false]);

    }
}else{
    echo json_encode(["success" => false]);

}