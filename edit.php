<?php
    require 'db.php';
    
    $categories = $database->select("tb_recipe_category", "*");
    $occasions = $database->select("tb_recipe_ocassions", "*");
 
    session_start();
    if(isset($_SESSION["isLoggedIn"])){

    $data= $database->select("tb_recipes",[//inner
        "[>]tb_recipe_category"=>["id_recipe_category" => "id_recipe_category"],//[>] caracter para hacer el join
        "[>]tb_recipe_ocassions"=>["id_recipe_ocassion" => "id_recipe_ocassion"],//[>] caracter para hacer el join
    ],[
        "tb_recipes.id_recipe",
        "tb_recipes.recipe_name",
        "tb_recipes.prep_time",
       "tb_recipes.recipe_ingredients",
      "tb_recipes.recipe_description",
        "tb_recipes.recipe_image",
       "tb_recipe_ocassions.recipe_ocassion",
        "tb_recipe_category.recipe_category"
    ],[
        "id_recipe" => $_GET["id"]
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
</head>
<body>
    
    <h1>Edit Recipe</h1>
    <form action="update.php" method="post" enctype="multipart/form-data"> <!--atributo para enviar archivos desde el form-->

        <label for="recipe">Recipe</label>
        <input type="text" name="recipe" value="<?php echo $data[0]["recipe_name"]; ?>">
        <label for="category">Category:</label>
        <select name="category" id="">
        <?php 
                $len = count($categories);
                for($i=0; $i < $len; $i++) {
                    if($data[0]["id_recipe_category"] == $categories[$i]['id_recipe_category']){
                        echo '<option value="'.$categories[$i]['id_recipe_category'].'" selected>'.$categories[$i]['recipe_category'].'</option>';
                    }else{
                        echo '<option value="'.$categories[$i]['id_recipe_category'].'">'.$categories[$i]['recipe_category'].'</option>';
                    }
                    
                }
            ?>

        </select>

        <label for="ocassion">Occasions:</label>
        <select name="recipe_ocassion" id="">
    <?php 
                $len = count($occasions);
                for($i=0; $i < $len; $i++) {
                    if($data[0]["id_recipe_ocassion"] == $occasions[$i]['id_recipe_ocassion']){
                        echo '<option value="'.$occasions[$i]['id_recipe_ocassion'].'" selected>'.$occasions[$i]['id_recipe_ocassion'].'</option>';
                    }else{
                        echo '<option value="'.$occasions[$i]['recipe_ocassion'].'">'.$occasions[$i]['recipe_ocassion'].'</option>';
                    }
                    
                }
            ?>
 </select>
        
        <label for="time">Prep. time</label>
        <input type="text" name="time" value="<?php echo $data[0]["prep_time"]; ?>">

        <label for="description">Description:</label>
        <input type="text" name="description" value="<?php echo $data[0]["recipe_description"]; ?>">
        
        <br>
        <label for="recipe_image">Imagen principal</label>
        <img id="preview" src="./imgs/<?php echo $data[0]["recipe_image"]; ?>" width="125" height="125" alt="Preview">
        <input id="recipe_image" type="file" name="recipe_image" onchange="readURL(this)">
        <br>

        
        <p>Ingredients</p>        
        <div id="ingredients">
            <?php
                $ingredients = [];
                $ingredients = explode(",", $data[0]["recipe_ingredients"]);
                //echo count($ingredients);
                foreach ($ingredients as $ingredient) {
                    echo "<div>";
                    echo "<label>Ingredient</label>";
                    echo "<input type='text' name='ingredients[]' value='$ingredient'>";
                      echo "<button class='remove-ingredient'>remove</button>";
                    echo "</div>";
                }
            ?>    
        </div>  
        <br>  
        <button type="button" id="add-ingredient">Add ingredient</button>
        <br>

        <input type="hidden" name="id" value="<?php echo $data[0]["id_recipe"]; ?>">
        <input type="submit" value="SUBMIT">
    </form>

    <script>
    function readURL(input) {
            if(input.files && input.files[0]){
                let reader = new FileReader();

                reader.onload = function(e) {
                    let preview = document.getElementById('preview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.querySelector('#add-ingredient').addEventListener('click', function(){

            event.preventDefault();
            let ingredient = document.createElement("div");
            let id = "ingredient-"+Date.now();
            ingredient.id = id;
            document.querySelector('#ingredients').appendChild(ingredient);

            let label = document.createElement("label");
            label.innerText = "Ingredient";
            label.setAttribute('for', 'ingredient');
            document.querySelector('#'+id).appendChild(label);

            let input = document.createElement("input");
            input.type = "text";
            input.setAttribute('name', "ingredients[]");
            document.querySelector('#'+id).appendChild(input);

            let btn = document.createElement("button");
            btn.innerText = "remove";
            btn.addEventListener("click", function() { 
                document.querySelector('#'+id).remove();
            });
            document.querySelector('#'+id).appendChild(btn);

        });

        let registered_ingredients = document.querySelectorAll('.remove-ingredient');
        //console.log(registered_ingredients.length);
        for(let i=0; i<registered_ingredients.length; i++){
            registered_ingredients[i].addEventListener("click", function(event) {
                event.preventDefault();
                this.parentNode.remove();
            });
        }
   </script>

</body>
</html>