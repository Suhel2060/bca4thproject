<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');
$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'];
$studentname = $data['studentname'];
$bookname = $data['bookname'];
if (identifyStudent($username, $studentname)) {
    $verifyBook = verifybook($bookname);
    if ($verifyBook) {
        issuebook($username, $studentname, $bookname);
    }
}
function issuebook($userID, $studentname, $bookname)
{
    require("dbconnect.php");
    $query = "Select username from issuebooks where bookname='$bookname' and username='$userID' and studentname='$studentname'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        $query1 = "select count(*) as noofbookstaken from issuebooks group by username,studentname having username='$userID' and studentname='$studentname'";
        $result1 = mysqli_query($conn, $query1);
        if (!(mysqli_num_rows($result1) == 0)) {
            $row = mysqli_fetch_assoc($result1);
            if ($row['noofbookstaken'] < 5) {
                $issuedate = date("Y-m-d");
                $returndate = date('Y-m-d', strtotime(' + 20 days'));
                $query2 = "insert into issuebooks VALUES('$userID','$studentname','$bookname','$issuedate','$returndate')";
                if (mysqli_query($conn, $query2)) {
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
            $query2 = "insert into issuebooks VALUES('$userID','$studentname','$bookname','$issuedate','$returndate')";
            if (mysqli_query($conn, $query2)) {
                echo json_encode(["issuebook" => true, "bookstatus" =>  "found", "userstatus" =>  "found", "usertakenbook" =>  false, "booktaken" => "lessthanfive"]);
            } else {
                echo json_encode(["bookstatus" => "found", "userstatus" => "found", "usertakenbook" => false, "issuebook" => false, "booktaken" => "lessthanfive"]);
            }
        }
    } else {
        echo json_encode(["bookstatus" => "found", "userstatus" => "found", "usertakenbook" => true]);
    }
}


function verifyBook($bookname)
{
    require("dbconnect.php");
    $query = "Select bookname from bookdetails where bookname='$bookname';";
    $result1 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result1) == 1) {
        return true;
        // echo json_encode(["bookstatus" => "found"]);
    } else {
        echo json_encode(["bookstatus" => "notfound", "userstatus" => "found"]);
    }
}



function identifyStudent($userID, $studentname)
{
    require("dbconnect.php");
    $query = "select username from userdetails where username='$userID' and studentname='$studentname'";
    $result1 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result1) > 0) {
        return true;
        // echo json_encode(["userstatus" => "found"]);
        // json_encode(["status" => "true"]);
    } else {
        echo json_encode(["userstatus" => "notfound"]);
    }
}
