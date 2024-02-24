<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8' );
function authenticate($username1, $password2){
    require("../phpfile/dbconnect.php");
    $query = "SELECT * FROM userdetails WHERE username='$username1' AND password='$password2'";
    $result = mysqli_query($conn, $query);
    if(   $pulldata=mysqli_fetch_array($result)){
    if($pulldata["username"]==$username1 && $pulldata["password"]==$password2) {
            $status = $pulldata["userstatus"];
            $_SESSION["loginstatus"] = "login";
            $_SESSION["admin_username"] = $username1;
            $_SESSION["user_status"] = $status;
            return true;
    } else{
        return false;
    }
}
else{
    return false;
}
}

$data = json_decode(file_get_contents("php://input"), true);
if(isset($data)){
    $username = $data["username"];
    $password = $data["password"];
    $validate = authenticate($username, $password);
    if($validate){
        echo json_encode(["success" => true, "username" => $username, "user_status" =>  $_SESSION["user_status"]]);
    }
    else {
        echo json_encode(["success" => false]);
    }
}


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST["username"]) && isset($_POST["password"])) {
//         $username = $_POST['username'];
//         $password = $_POST['password'];
//         $query = "select * from userdetails where username='$username' and password='$password'";
//         $result = mysqli_query($conn, $query);
//         if ( mysqli_num_rows($result)== 1) {
//             if ($array = mysqli_fetch_array($result)) {
//                 $status = $array["status"];
//                 if($status=="Admin"){
//                     $Adminlogin=true;
//                     session_start();
//                     $_SESSION["adminstatus"] = "login";
//                     $_SESSION["admin_username"] = $username;
//                     header("Location:../Admin/AdminDashboard/AdminDashboard.php");
//                 }
//                 else{
//                     $userlogin=true;
//                     session_start();
//                     $_SESSION["userstatus"] = "login";
//                     $_SESSION["user_username"] = $username;
//                     header("Location:../User/usernavbar.php");
//                 }
//             }
//         }
//     }
// }
