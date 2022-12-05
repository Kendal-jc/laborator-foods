<?php

    require 'db.php';

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // array -> $items = [];
    if(isset($_POST)){
        //var_dump($_POST);
        $ingredients = "";
        /* foreach($_POST["ingredients"] as $ingredient){//$ingredient es cada ingrediente en el array
            $ingredients.= $ingredient." ";//despues del espacio se agrega el siguiente ingrediente
        } */
        foreach($_POST["ingredient"] as $key => $ingredient){
            if($key == array_key_last($_POST["ingredients"])){
                $ingredients.= $ingredient;
            } else{
                $ingredients.= $ingredient.",";
            }
        }

        if(isset($_FILES["recipe_image"])){
            $error = array();
            $file_name = $_FILES["recipe_image"]["name"];
            $file_size = $_FILES["recipe_image"]["size"];
            $file_tmp = $_FILES["recipe_image"]["tmp_name"];
            $file_type = $_FILES["recipe_image"]["type"];
            $file_ext_arr = explode(".", $_FILES["recipe_image"]["name"]); //explote descompone el string

            $file_ext = end($file_ext_arr);
            $img_ext = array("jpeg","png", "jpg", "gif");

            if(!in_array($file_ext, $img_ext)){
                $errors[] = "File type is not supported";
            }

            if(empty($errors)){
                $img = "recipe-upload-".generateRandomString().".".$file_ext;//genera el nombre
                move_uploaded_file($file_tmp, "imgs/".$img);


                $database->insert("tb_recipes", [
                    "recipe_name" => $_POST["recipe_name"],
                    "id_recipe_category" => $_POST["category"],
                    "prep_time" => $_POST["prep_time"],
                    //"cook_time" => $_POST["cook_time"],
                   // "total_time" => $_POST["total_time"],
                    //"id_recipe_level" => $_POST["recipe_level"],
                    //"id_recipe_ocassion" => $_POST["ocassion"],
                   // "recipe_description" => $_POST["description"],
                    "recipe_image" => $img,
                   // "recipe_ingredients" => $ingredients
                   // "id_recipe_ocassion" => $ocassion
                ]);
                header("location: recipes.php");

            }


        }


       
    }

   /*  if(isset($_POST)){
    $database->insert("tb_recipe_category", [
        "recipe_category" => $_POST["category"],
    ]);
        header("location: recipes.php");
    } */

?>