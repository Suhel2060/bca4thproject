<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:GET, POST');
header('Access-Control-AllowpHeaders: *');
header('Content-Type: application/json; charset=UTF-8');

$data=json_decode(file_get_contents('php://input'),true);
echo json_encode($data);
// if(isset($data)){
//     $uploaddir = '../Addstudents/studentimg/';
//     // $file=$data["image"];
//     $uploadfile = $uploaddir . basename($_FILES['img']['name']);
//     if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
//     echo json_encode(["success" => true]);
// }else{
//     echo json_encode(["error"=> "not uploaded"]);
// }
// }


?>