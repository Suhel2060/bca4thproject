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
    $imageurl1 = uniqid() . basename($_FILES['image']['name']);
    $uploadfile = $uploaddir . $imageurl1;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        $query="select image from userdetails where username='$username'";
        $result=mysqli_query($conn,$query);
        $image=mysqli_fetch_assoc($result);
        $imageurl='../admin/addstudents/studentimg/'.$image['image'];
        unlink($imageurl);
        $imageurl = $imageurl1;
            $query = "update userdetails set username='$updateusername',studentname='$name', email='$email', phonenumber='$phonenumber', image='$imageurl' where username='$username'";
            if (mysqli_query($conn, $query)) {
                    echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false]);
            }
    }
    else {
        echo json_encode(["success image" => false]);
    }
} else {
            $query = "update userdetails set username='$updateusername', studentname='$name', email='$email', phonenumber='$phonenumber' where username='$username'";
            if (mysqli_query($conn, $query)) {
                    echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false]);
            }

    }

