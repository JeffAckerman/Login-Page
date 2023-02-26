<?php 

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST") {      // for collecting data from the form

    $conn = require __DIR__ ."/data.php";

    $sql = sprintf("SELECT * FROM users 
                    WHERE email = '%s'", mysqli_real_escape_string($conn, $_POST["email"])); 
    
    $result = mysqli_query($conn, $sql);   // query to the database

    $user = mysqli_fetch_assoc($result);   // Fetching the result from the database


    if($user){ 

        if (password_verify($_POST["password_1"], $user["password"])){   // $user["password] is the name of the column in database
            
            session_start(); 

            session_regenerate_id();
        

            $_SESSION["user_ID"] = $user["user_ID"];

            header("Location: login.php"); 
            exit;
        }
    }
    $is_invalid = true;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
<h1 class="header">Login Page</h1> 

<div id="signup">
<form method="post">
       <div>
        <label for="email">Email ID<br> <input type="email" name = "email" ><br></label><br>
        </div>
        <div>
        <label for="password">Password<br> <input type="password" name = "password_1" ><br></label><br>
        </div>
        <label for="submit"><button type = "submit">Log In</button></label>
        <p>Not Registered yet? <a href="logout.php">Sign Up</a></p>
    </form>
    
</div>

<div> 

<?php 
 if($is_invalid): ?> 
     <em class="invalid">Invalid Login Credentials </em>
 <?php endif; ?>

</div>
    

</body>
</html>
