<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
require("dbconnect.php");
$isbn = $_POST['ISBN'];
$bookid = intval($_POST['bookid']);
$bookname = $_POST['bookname'];
$authorname = $_POST['authorname'];
$tags = $_POST['tags'];
$description = $_POST['description'];
$quantity = intval($_POST['quantity']);
$uploaddir = '../admin/addstudents/bookimg/';
$uploadfile = $uploaddir . basename($_FILES['image']['name']);
if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    $imageurl = '../addstudents/bookimg/' . basename($_FILES['image']['name']);
    $query ="update bookdetails set ISBN='$isbn',bookname='$bookname',authorname='$authorname',tag='$tags',description='$description',quantity=$quantity,image='$imageurl' where book_id=$bookid";
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success image" => false]);
    }


