<?php
session_start();

    include("connection.php");
    include("functions.php");

    $activation_token = bin2hex(random_bytes(16));

    $activation_token_hash = hash("sha256", $activation_token);


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Email = $_POST['Email'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $activation_token_hash = ['account_activation_hash'];
        
    }

    if(!empty($Email) && !empty($user_name) && !empty($password))
    {
        $user_id = random_num(20);
        $query = "insert into users (user_id,Email,user_name,password, account_activation_hash) values ('$user_id','$Email','$user_name','$hashed_password')";

        mysqli_query($con, $query);

        header("location: login.php");
        die;
    }else
    {
        echo "fill out both fields";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup page</title>
</head>
<body>
    <style type="text/css">
        
        #text{
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
        }

        #button{
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }
        
        #box{
            background-color: gray;
            margin: auto;
            width: 300px;
            padding: 20px;
        }

    </style>

    <div id="box">

        <form method="post">
            <div style="font-size: 20px;margin: 10px;color: white;">signup</div>
            <input id="text" type="text" name="Email" placeholder="E-mail"><br><br>
            <input id="text" type="text" name="user_name" placeholder="user name"><br><br>
            <input id="text" type="password" name="password" placeholder="password"><br><br>
            <input id="button" type="submit" value="sign up"><br><br>

            <a href="login.php">login</a><br><br>
        </form>

    </div>


</body>
</html>
