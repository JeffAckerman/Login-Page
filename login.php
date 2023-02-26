<?php 

session_start();

// if(isset($_SESSION ["user_ID"])){ 

//     $conn = require __DIR__ ."/data.php";

//     $sql = "SELECT * FROM users WHERE id = {$_SESSION["user_ID"]}" ;

//     $result = mysqli_query($conn, $sql);   // query to the database

//     $user = mysqli_fetch_assoc($result);   // Fetching the result from the database

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged In</title>
</head>
<body>
    <!--  -->
    
    <h2>Logged In Succesfully</h3>
    <p>Click here to create a <a href="profile.html">profile</a><p>
</body>
</html>