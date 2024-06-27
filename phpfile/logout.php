
<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8' );
$data = json_decode(file_get_contents("php://input"), true);
if($data["logout"]=="true"){
    session_start();
    session_unset();
    session_destroy();
    echo json_encode(["logout_status" => true]);
}
?>