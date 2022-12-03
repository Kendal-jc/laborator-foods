<?php
    require 'db.php';

    session_start();
    if(isset($_SESSION["isLoggedIn"])){

   

    $data= $database->select("tb_recipes",[//inner
        "[>]tb_recipe_category"=>["id_recipe_category" => "id_recipe_category"]//[>] caracter para hacer el join
    ],[
        "tb_recipes.id_recipe",
        "tb_recipes.recipe_name",
        "tb_recipes.prep_time",
        "tb_recipes.recipe_image",
        "tb_recipes.recipe_likes",
        //"tb_recipes_levels.recipe_level",
        "tb_recipe_category.recipe_category"
    ]);

    }else{
        header("Location: login.php");
    }

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style-recipes.css">
    <link rel="stylesheet" href="./css/Components/front.css">
    <link rel="stylesheet" href="./css/frontsprincipa.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <p>User: <?php echo $_SESSION["username"] ?></p>
    <p><a href="logout.php">Logout</a></p>
    <h1>Registered Recipes</h1>

    <table>
        <tr>
          
        </td><td>Recipe image</td></td>
                <td>Recipe name</td>
                <td>Recipe <br>likes</td>
                <td>Recipe <br>Category</td>
                <td>Prep. <br> time</td>
               <td>Options</td>
           
        </tr>
        <tr>

        </tr>
        <?php

            $len = count($data);

            for($i=0; $i<$len; $i++){
                echo "<tr>";
                echo "<td><img src='./imgs/".$data[$i]["recipe_image"]."'class='thumb img-25'>";
                echo "<td>".$data[$i]["recipe_name"]."</td>";
                echo "<td>".$data[$i]["recipe_likes"]."</td>";
                echo "<td>".$data[$i]["recipe_category"]."</td>";
                echo "<td>".$data[$i]["prep_time"]."</td>";
                echo "<td>  <a href='edit.php?id=".$data[$i]["id_recipe"]."'>Edit</a>
                <a href='delete.php?id=".$data[$i]["id_recipe"]."'>Delete</a> <a href='likes.php?id=".$data[$i]["id_recipe"]."'>Likes</a></td> ";
                echo "</tr>";
            }

        ?>
    </table>
</body>
</html>