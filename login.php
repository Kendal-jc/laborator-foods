<?php

    require 'db.php';

    if($_POST){
        //var_dump($_POST);
        $user = $database-> select("tb_users","*",[
            "user_name" => $_POST["username"]
        ]);

        if(count($user) > 0){
            if(password_verify($_POST["password"], $user[0]["password"])){
                //echo "valid username and password";

                //init session
                session_start();
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["username"] = $user[0]["user_name"];
                //redireccionar
                header("Location: recipes.php");

            }else{
                echo "wrong username or password";
            }
        }else{
            echo "wrong username or password";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="./css/login.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div id="bg"></div>

  <form action="login.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username">

        <label for="password">Password</label>
        <input type="password" name="password">
        
        <input type="submit" value="LOG IN">
    </form>

</body>

</html>