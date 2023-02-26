<?php 

// Initial database details to make connection between the page and the Database

$host = "localhost"; 
$database = "login_system";
$user = "root"; 
$pass = "";

$conn = mysqli_connect($host, $user, $pass, $database); 

if(mysqli_connect_errno()){ 
    die("Connection error: ".mysqli_connect_error());
} 

return $conn;
?>