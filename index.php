<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con); 


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
</head>
<body>
    
    <a href="logout.php">logout</a>
    <h1>Index page</h1>
    Hello, <?php echo $user_data['user_name']; ?>

</body>
</html>
