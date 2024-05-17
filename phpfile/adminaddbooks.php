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
$description;
$quantity;
$bookid;

if (isset($_FILES["image"])) {
    $imagestatus = bookimagestore();
    if ($imagestatus) {
        $insertdatastatus = bookDataStore();
        if ($insertdatastatus) {
            $date = date('Y-m-d');
           getbookid($bookname,$tags,$authorname);
            echo json_encode([
                'status' => "success",
                'bookid' => $bookid,
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

function getbookid($bookname,$tags,$authorname){
    require('dbconnect.php');
    global $bookid;
    $query="SELECT book_id FROM bookdetails where bookname='$bookname' and authorname='$authorname' and tag='$tags'";
  $row =mysqli_query($conn,$query);
  $bookid=$row->fetch_all(MYSQLI_ASSOC);
  

}

function bookimagestore()
{
    $uploaddir = '../admin/adminaddbooks/bookimg/';
    $imagename=uniqid().'_'.basename($_FILES['image']['name']);
    $uploadfile = $uploaddir.$imagename;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        global $imageurl;
        $imageurl = $imagename;
        return true;
    } else {
        echo json_encode(["imageinsert" => false]);
        return false;
    }
}


function bookDataStore()
{

    global $isbn, $bookname, $authorname, $tags, $description, $quantity, $imageurl;
    require("dbconnect.php");
    $isbn = $_POST['ISBN'];
    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $tags = $_POST['tags'];
    $description = $_POST['description'];
    $quantity = intval($_POST['quantity']);
    $book_issued=intval(0);
    $query = "SELECT book_id,quantity FROM bookdetails WHERE bookname='$bookname'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        $query1 = "INSERT INTO bookdetails(ISBN,bookname,authorname,tag,`image`,`description`,quantity,currentquantity,book_issued) VALUES ('$isbn','$bookname','$authorname','$tags','$imageurl','$description',$quantity,$quantity,$book_issued)";
        if (mysqli_query($conn, $query1)) {
            $flag=0;
            $query2 = "SELECT book_id,quantity FROM bookdetails WHERE bookname='$bookname'";
            $result1 = mysqli_query($conn, $query2);
            $data=mysqli_fetch_assoc($result1);
            $id=intval($data["book_id"]);
            $quantity=intval($data["quantity"]);
            for ($i=1; $i <=$quantity;$i++) { 
                $individualid=$id*100+$i;
                $query2="INSERT INTO individual_book VALUES ($individualid,$id,'notissued','available')";
                if(mysqli_query($conn,$query2)){
                $flag=$flag+1;
                }
            }
            if($flag==$data['quantity']){
                return true;
            }else{
                return false;
            }

        } else {
            echo json_encode(["datainsert" => false]);
            return false;
        }
    } else {
        echo json_encode(["bookexists" => true]);
        return false;
    }
}
