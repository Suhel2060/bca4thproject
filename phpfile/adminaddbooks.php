<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: multipart/form-data');

$imageurl;
$isbn;
$bookname;
$authorname;
$tags;
$catagories;
$description;
$quantity;

if (isset($_FILES["image"])) {
    $imagestatus = bookimagestore();
    if ($imagestatus) {
        $insertdatastatus = bookDataStore();
        if ($insertdatastatus) {
            $date = date('Y-m-d');
            echo json_encode([
                'status' => "success",
                'isbn' => $isbn,
                'bookname' => $bookname,
                'authorname' => $authorname,
                'image' => $imageurl,
                'date' => $date,
                'tags' => $tags,
                'quantity' => $quantity
            ]);
        }
    }
}

function bookimagestore()
{
    $uploaddir = '../admin/adminaddbooks/bookimg/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        global $imageurl;
        $imageurl = '../adminaddbooks/bookimg/' . basename($_FILES['image']['name']);
        return true;
    } else {
        echo json_encode(["imageinsert" => false]);
        return false;
    }
}

function bookDataStore()
{

    global $isbn, $bookname, $authorname, $tags, $catagories, $description, $quantity, $imageurl;
    require("dbconnect.php");
    $isbn = $_POST['ISBN'];
    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $tags = $_POST['tags'];
    $description = $_POST['description'];
    $catagories = $_POST['Catagories'];
    $quantity = intval($_POST['quantity']);
    $query = "SELECT bookname FROM bookdetails WHERE bookname='$bookname'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        $query1 = "INSERT INTO bookdetails(ISBN,bookname,authorname,tag,catagory,`image`,`description`,quantity) VALUES ('$isbn','$bookname','$authorname','$tags','$catagories','$imageurl','$description',$quantity)";
        if (mysqli_query($conn, $query1)) {
            return true;
        } else {
            echo json_encode(["datainsert" => false]);
            return false;
        }
    } else {
        echo json_encode(["bookexists" => true]);
        return false;
    }
}
