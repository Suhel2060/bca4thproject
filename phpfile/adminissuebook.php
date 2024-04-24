<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$data = json_decode(file_get_contents("php://input"), true);
$currentquantity;
$username = $data['username'];
$bookid = intval($data['bookid']);
$bookname = $data['bookname'];
if (identifyStudent($username)) {
    $verifyBook = verifybook($bookid,$bookname);
    if ($verifyBook) {
        issuebook($username, $bookid,$bookname);
    }
}
function issuebook($userID, $bookid,$bookname)
{
    global $currentquantity;
    require("dbconnect.php");
    $query = "Select username from issuebooks natural join individual_book natural join bookdetails where username='$userID' and bookname='$bookname' and book_issue_status='issued'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        $query1 = "select count(*) as noofbookstaken from issuebooks where book_issue_status='issued' group by username having username='$userID'";
        $result1 = mysqli_query($conn, $query1);
        if (!(mysqli_num_rows($result1) == 0)) {
            $row = mysqli_fetch_assoc($result1);
            if ($row['noofbookstaken'] < 5) {
                $issuedate = date("Y-m-d");
                $returndate = date('Y-m-d', strtotime(' + 20 days'));
                $query2 = "insert into issuebooks VALUES('$userID',$bookid,'issued','$issuedate','$returndate')";
                if (mysqli_query($conn, $query2)) {
                    $currentquantity=$currentquantity-1;
                    $query3="update individual_book set book_issue_status='issued' where individual_book_id=$bookid";
                    mysqli_query($conn,$query3);
                    $query4="update bookdetails set currentquantity= $currentquantity where bookname='$bookname'";
                    mysqli_query($conn,$query4);
                    echo json_encode(["issuebook" => true, "bookstatus" =>  "found", "userstatus" =>  "found", "usertakenbook" =>  false, "booktaken" => "lessthanfive"]);
                } else {

                    echo json_encode(["issuebook" => false, "bookstatus" => "found", "userstatus" => "found", "usertakenbook" => false, "booktaken" => "lessthanfive"]);
                }
            } else {
                echo json_encode(["bookstatus" => "found", "userstatus" => "found", "usertakenbook" => false, "booktaken" => "morethanfive"]);
            }
        } else {
            $issuedate = date("Y-m-d");
            $returndate = date('Y-m-d', strtotime(' + 20 days'));
            $query2 = "insert into issuebooks VALUES('$userID',$bookid,'issued','$issuedate','$returndate')";
            if (mysqli_query($conn, $query2)) {
                $currentquantity=$currentquantity-1;
                $query3="update individual_book set book_issue_status='issued' where individual_book_id=$bookid";
                mysqli_query($conn,$query3);
                $query3="update bookdetails set currentquantity= $currentquantity where bookname='$bookname'";
                mysqli_query($conn,$query3);
                echo json_encode(["issuebook" => true, "bookstatus" =>  "found", "userstatus" =>  "found", "usertakenbook" =>  false, "booktaken" => "lessthanfive"]);
            } else {
                echo json_encode(["bookstatus" => "found", "userstatus" => "found", "usertakenbook" => false, "issuebook" => false, "booktaken" => "lessthanfive"]);
            }
        }
    } else {
        echo json_encode(["bookstatus" => "found", "userstatus" => "found", "usertakenbook" => true]);
    }
}


function verifyBook($bookid,$bookname)
{
    require("dbconnect.php");
    $query = "Select bookname,individual_book_id,currentquantity from bookdetails natural join individual_book where bookname='$bookname' and individual_book_id=$bookid and book_issue_status='notissued' and book_status='available'";
    $result1 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result1)==1) {
        $result=mysqli_fetch_assoc($result1);
        global $currentquantity;
        $currentquantity=intval($result["currentquantity"]);
        return true;
        // echo json_encode(["bookstatus" => "found"]);
    } else {
        echo json_encode(["bookstatus" => "notfound", "userstatus" => "found"]);
    }
}



function identifyStudent($userID)
{
    require("dbconnect.php");
    $query = "select username from userdetails where username='$userID'";
    $result1 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result1) > 0) {
     

        return true;
        // echo json_encode(["userstatus" => "found"]);
        // json_encode(["status" => "true"]);
    } else {
        echo json_encode(["userstatus" => "notfound"]);
    }
}
