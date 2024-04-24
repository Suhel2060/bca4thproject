<?php
require('dbconnect.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$isbn = $_POST['ISBN'];
$bookid = intval($_POST['bookid']);
$bookname = $_POST['bookname'];
$authorname = $_POST['authorname'];
$tags = $_POST['tags'];
$quantity = intval($_POST['quantity']);
$description = $_POST['description'];
$imagedata = $_POST['imagedata'];
if ($imagedata == "true") {
    $uploaddir = '../admin/adminaddbooks/bookimg/';
    $imageurl1 = uniqid() . basename($_FILES['image']['name']);
    $uploadfile = $uploaddir . $imageurl1;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        $query = "select image from bookdetails where book_id='$bookid'";
        $result = mysqli_query($conn, $query);
        $image = mysqli_fetch_assoc($result);
        $imageurl = '../admin/adminaddbooks/bookimg/' . $image['image'];
        unlink($imageurl);
        $imageurl = $imageurl1;
        try {
            $conn->begin_transaction();
            $query = "select currentquantity,quantity from bookdetails where book_id='$bookid'";
            $row = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($row);
            $quantity1 = $result['quantity'] + $quantity;
            $currentquantity2 = $result['currentquantity'] + $quantity;
            for ($i = $result['quantity'] + 1; $i <= $quantity1; $i++) {
                $individualid = $bookid * 100 + $i;
                $query2 = "INSERT INTO individual_book VALUES ($individualid,$bookid,'notissued','available')";
                mysqli_query($conn, $query2);
            }
        

            $query = "update bookdetails set bookname='$bookname',authorname='$authorname',description='$description',tag='$tags', quantity=$quantity1, currentquantity= $currentquantity2, image='$imageurl', isbn='$isbn' where book_id=$bookid'";
            if (mysqli_query($conn, $query)) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false]);
            }
            $conn->commit();
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    } else {
        echo json_encode(["success image" => false]);
    }
} else {
    try {
        $conn->begin_transaction();
        $query = "select currentquantity,quantity from bookdetails where book_id='$bookid'";
        $row = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($row);
        $requiredquantity=$quantity-$result['quantity'];
        $quantity1 = $result['quantity'] + $requiredquantity;
        $currentquantity2 = $result['currentquantity'] + $requiredquantity;
        for ($i = $result['quantity'] + 1; $i <= $quantity1; $i++) {
            $individualid = $bookid * 100 + $i;
            $query2 = "INSERT INTO individual_book VALUES ($individualid,$bookid,'notissued','available')";
            mysqli_query($conn, $query2);
        }
        $query = "update bookdetails set bookname='$bookname',authorname='$authorname',description='$description',tag='$tags', quantity=$quantity1, currentquantity= $currentquantity2, isbn='$isbn' where book_id=$bookid";
        mysqli_query($conn, $query);
        echo json_encode(["success" => true]);
        $conn->commit();
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage(),"success" => false]);
    }
}
