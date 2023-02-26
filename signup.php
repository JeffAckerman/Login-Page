<?php  

// Checks if the name is empty 
if(empty($_POST["name"])){ 
    die("Name is Required");
}

// Checks for valid email
if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { 
    die("Valid Email is required.");
}

if(strlen($_POST["password_1"]) < 8){ 
    die("Password must contain 8 characters");
}


if($_POST["password_1"] !== $_POST["password_2"] ){ 
    die("Both passwords must be equal");
}

$password_hash = password_hash($_POST["password_1"], PASSWORD_DEFAULT);  // This hash function is used to encrypt the passoword for 
                                                                         // Security reasons.

$conn = require __DIR__ ."/data.php";


$sql = "INSERT INTO users (name, email, password )    
VALUES (?, ?, ?)";                                     // SQL 


$stmt = mysqli_stmt_init($conn);   // Initializing for prepare() function  

 if( ! mysqli_stmt_prepare($stmt, $sql)) { 
    die(mysqli_error($conn));
 }

 mysqli_stmt_bind_param($stmt, "sss", $_POST["name"], $_POST["email"], $password_hash);

 if(mysqli_stmt_execute($stmt)){ 

    header("Location: signin.html"); 
    exit;

 } else{ 
    echo "Mail used";
 }




?>