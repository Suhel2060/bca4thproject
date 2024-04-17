<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');

require('dbconnect.php');

$query1 = "SELECT COUNT(username) AS total_users FROM userdetails";
$query2 = "SELECT COUNT(*) AS total_returned_books FROM issuebooks WHERE book_issue_status='returned'";
$query3 = "SELECT COUNT(*) AS total_issued_books FROM issuebooks WHERE book_issue_status='issued'";
$query4 = "SELECT COUNT(book_id) AS total_books_issued FROM bookdetails";

$data = [];

// Function to execute query and fetch result
function fetchCount($conn, $query) {
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row ? $row[array_key_first($row)] : 0;
    } else {
        return 0; // Default value if query fails
    }
}

// Fetch counts
$data['users'] = fetchCount($conn, $query1);
$data['return'] = fetchCount($conn, $query2);
$data['issue'] = fetchCount($conn, $query3);
$data['total'] = fetchCount($conn, $query4);

echo json_encode($data);
?>