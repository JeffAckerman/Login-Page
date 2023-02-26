<?php 
$full_name = $_POST["full_name"]; 
$workplace = $_POST["workplace"]; 
$age = $_POST["age"]; 
$contact = $_POST["contact"];

$conn = require __DIR__ ."/data.php";


$sql = "INSERT INTO profile (full_name, workplace, age, contact )    
VALUES (?, ?, ?, ?)";                                     // SQL 


$stmt = mysqli_stmt_init($conn);   // Initializing for prepare() function  

 if( ! mysqli_stmt_prepare($stmt, $sql)) { 
    die(mysqli_error($conn));
 }

 mysqli_stmt_bind_param($stmt, "ssii", $_POST["full_name"], $_POST["workplace"], $_POST["age"],$_POST["contact"]);

 if(mysqli_stmt_execute($stmt)){ 

   die("Profile Created Successfully");


 } 







?>