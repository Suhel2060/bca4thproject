<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$updateusername = $_POST['updateusername'];
$username = $_POST['username'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$name = $_POST['name'];
if ($_POST['imagedata'] == "true") {
    $uploaddir = '../admin/addstudents/studentimg/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        $imageurl = '../addstudents/studentimg/' . basename($_FILES['image']['name']);
        $query = "update userdetails set username='$updateusername',studentname='$name', email='$email', phonenumber='$phonenumber', image='$imageurl' where username='$username'";
        if (mysqli_query($conn, $query)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success image" => false]);
        }
    }
} else {
    $query = "update userdetails set username='$updateusername', studentname='$name', email='$email', phonenumber='$phonenumber' where username='$username'";
    if (mysqli_query($conn, $query)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["username" => $updateusername,"email" => $email,"name" => $name,"ph" => $phonenumber]);
    }
}
