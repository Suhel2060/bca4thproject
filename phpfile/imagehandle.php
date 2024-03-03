<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: multipart/form-data');
$imageurl;
$username;
$password;
$email;
$studentname;
$phonenumber;
if (isset($_FILES['img'])) {
    $imagestatus = imagestore();
    if ($imagestatus) {
        $insertdatastatus = studentDataStore();
        if ($insertdatastatus) {
            $date = date('Y-m-d');
            echo json_encode(['status' => true,"username" => $username,"email" => $email,"studentname" => $studentname,"image" => $imageurl,"date" => $date]);
        }
    }
} else {
    echo json_encode(["error" => false]);
}



//image store in a file
function imagestore()
{
    $uploaddir = '../admin/addstudents/studentimg/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);
    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
        global $imageurl;
        $imageurl = '../addstudents/studentimg/' . basename($_FILES['img']['name']);
        return true;
    } else {
        echo json_encode(["error" => false]);
    }
}


//insert student data in table
function studentDataStore()
{
    global $username, $password, $email, $studentname, $phonenumber, $imageurl;
    require("dbconnect.php");
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $studentname = $_POST['studentname'];
    $phonenumber = $_POST['phonenumber'];
    $query = "select username from userdetails where username='$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {

        $query1 = "INSERT INTO userdetails(`username`,`password`,userstatus,email,`image`,studentname,phonenumber) VALUES ('$username','$password','user','$email','$imageurl','$studentname','$phonenumber')";
        // $stmt=$conn->prepare($query);
        // $stmt->bind_param("ssssssi", $username,$password,"user",$email, $imageurl,$studentname,$phonenumber);
        // $stmt->execute();
        if (mysqli_query($conn, $query1)) {
            return true;
        }else{
            echo json_encode(["error"=> false]);
        }
    } else {
        echo json_encode(["userexist" => true]);
    }
}
