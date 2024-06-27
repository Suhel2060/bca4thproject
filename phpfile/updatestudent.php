<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: multipart/form-data');
$updateusername = $_POST['updateusername'];
$username = $_POST['username'];
$email = $_POST['email'];
$phonenumber =intval( $_POST['phonenumber']);
$result=getEmailandNumber($username,$conn);

// $result=getEmailandNumber($username);
if($username!=$updateusername||$email!=$result[0]['email']||$phonenumber!=$result[0]['phonenumber']){
    if($username!=$updateusername&&!checkusername($updateusername,$conn)){
        echo json_encode(["userexist" => true, "phonenumber" => false, "email" => false]);
        exit;
    }
    elseif($email!=$result[0]['email']&&!checkEmail($email,$conn)){
        echo json_encode(["userexist" => false, "phonenumber" => false, "email" => true]);
        exit;
    }
    elseif($phonenumber!=$result[0]['phonenumber']&&!checkNumber($phonenumber,$conn)){
        echo json_encode(["userexist" => false, "phonenumber" => true, "email" => false]);
        exit;
    }
    else{
        updateData($username,$updateusername,$email,$phonenumber,$conn);
    }
}else{
        updateData($username,$updateusername,$email,$phonenumber,$conn);
}



function getEmailandNumber($username,$conn){
    
    $query="select email, phonenumber from userdetails where username='$username'";
    $row=mysqli_query($conn,$query);
    $data=mysqli_fetch_all($row,MYSQLI_ASSOC);
    return $data;
}

function checkusername($updateusername,$conn){
    
    $query="select username from userdetails where username='$updateusername'";
    $row=mysqli_query($conn,$query);
    if(mysqli_fetch_row($row)==0){
        return true;
    }else{
        return false;
    }
}

function checkEmail($email,$conn){
    
    $query="select username from userdetails where email='$email'";
    $row=mysqli_query($conn,$query);
    if(mysqli_fetch_row($row)==0){
        return true;
    }else{
        return false;
    }
}
function checkNumber($phonenumber,$conn){

    $query="select username from userdetails where phonenumber='$phonenumber'";
    $row=mysqli_query($conn,$query);
    if(mysqli_fetch_row($row)==0){
        return true;
    }else{
        return false;
    }
}




function updateData($username,$updateusername,$email,$phonenumber,$conn){
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
            $query = "update userdetails set username='$updateusername',studentname='$name', email='$email', phonenumber=$phonenumber, image='$imageurl' where username='$username'";
            if (mysqli_query($conn, $query)) {
                $query="select username,phonenumber,email,image,studentname from userdetails where username='$updateusername'";
                if($row=mysqli_query($conn, $query)){
                    $result=mysqli_fetch_all($row,MYSQLI_ASSOC);
                    echo json_encode(["success" => true,"data" => $result]);
                }
            } else {
                echo json_encode(["success" => false]);
            }
    }
    else {
        echo json_encode(["success image" => false]);
    }
} else {
            $query = "update userdetails set username='$updateusername', studentname='$name', email='$email', phonenumber=$phonenumber where username='$username'";
            if (mysqli_query($conn, $query)) {
                $query="select username,phonenumber,email,image,studentname from userdetails where username='$updateusername'";
                if($row=mysqli_query($conn, $query)){
                    $result=mysqli_fetch_all($row,MYSQLI_ASSOC);
                    echo json_encode(["success" => true,"data" => $result]);
                }
            } else {
                echo json_encode(["success" => false]);
            }

    }
}