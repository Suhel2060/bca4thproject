<?php
$server="localhost";
$username= "root";
$password= '$uhelmaharjan2060';
$database= "librarymanagement";
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("Error:".mysqli_connect_error());
}
?>