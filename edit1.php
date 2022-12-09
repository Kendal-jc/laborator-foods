<?php
    require 'db.php';
    
    $categories = $database->select("tb_recipe_category", "*");
    $occasions = $database->select("tb_recipe_ocassions", "*");
 
    session_start();
    if(isset($_SESSION["isLoggedIn"])){

    $data= $database->select("tb_recipes",[//inner
        "[><]tb_recipe_category"=>["id_recipe_category" => "id_recipe_category"],
        "[><]tb_recipe_levels"=>["id_recipe_level" => "id_recipe_level"],
        "[><]tb_recipe_ocassions"=>["id_recipe_ocassion" => "id_recipe_ocassion"],
    ],[
        "tb_recipes.id_recipe",
        "tb_recipes.id_recipe_category",
        "tb_recipes.recipe_name",  
        "tb_recipes.prep_time", 
       // "tb_recipes.recipe_yields", 
        "tb_recipes.recipe_image", 
        "tb_recipes.recipe_description", 
        "tb_recipes.recipe_likes", 
        "tb_recipes.recipe_ingredients", 
       // "tb_recipes.recipe_directions", 
        "tb_recipe_category.recipe_category",
        "tb_recipes.id_recipe_level", 
        "tb_recipes.id_recipe_ocassion", 
        "tb_recipe_ocassions.recipe_ocassion", 
        "tb_recipe_levels.recipe_level" 
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
    <title>Edit</title>8
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/front.css">
    <link rel="stylesheet" href="./css/frontsprincipa.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="body-admin">
    <section class="admin-page">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md prueba-c">
                    <h3 class="mb-4 tittle-recipe">Editar una receta</h3>

                    <form action="update.php" method="post" enctype="multipart/form-data">

                        <div class="admin-inputs-divs">
                            <h4>Nombre de la receta:</h4>
                            <input class="admin-inputs" type="text" name="recipe_name" value="<?php echo $data[0]["recipe_name"];?>"/>
                        </div>

                        <div class="admin-inputs-divs">
                            <h4>Tiempo total:</h4>
                            <input class="admin-inputs" type="" name="prep_time" value="<?php echo $data[0]["prep-time"];?>"/>
                        </div>

                        <div class="admin-inputs-divs">
                            <h4>Porciones:</h4>
                            <input class="admin-inputs" type="Name" name="portions" value="<?php echo $data[0]["portions"];?>"/>
                        </div>

                        <div class="admin-inputs-divs">
                            <h4>Nivel de complejidad:</h4>
                            <div class="input-group mb-3">
                                <select name="recipe_level" id="">
                                <?php
                                            $len = count($levels);
                                            for($i=0; $i<$len; $i++){
                                                if($data[0]["id_recipe_level"] === $levels[$i] ['id_recipe_level']){
                                                    echo '<option value="'.$levels[$i]
                                                    ['id_recipe_level'].'"selected>'.$levels[$i]
                                                    ['recipe_level'].'</option>';
                                                    } else{
                                                        echo '<option value="'.$levels[$i]
                                                        ['id_recipe_level'].'">'.$levels[$i]
                                                        ['recipe_level'].'</option>';
                                                }
                                            }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="admin-inputs-divs">
                            <h4>Categoría:</h4>
                            <div class="input-group mb-3 ms-4">
                                <select name="category" id="">
                                    <?php
                                    $len = count($data);
                                    for($i=0; $i<$len; $i++){
                                        echo '<option value="'.$data[$i]
                                        ['id_recipe_category'].'">'.$data[$i]
                                        ['recipe_category'].'</option>';
                                    }                       
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="admin-inputs-divs">
                            <h4>Ocasión:</h4>
                            <div class="input-group mb-3 ms-4">
                                <select name="occasion" id="">
                                    <?php
                                    $len = count($data2);
                                    for($i=0; $i<$len; $i++){
                                        echo '<option value="'.$data2[$i]
                                        ['id_recipe_ocassion'].'">'.$data2[$i]
                                        ['recipe_ocassion'].'</option>';
                                    }
                                ?>

                                </select>
                            </div>
                        </div>
                </div>

                <div class="col-md prueba-r">
                    <div class="admin-inputs-divs">
                        <h4>Descripción:</h4>
                        <input class="admin-inputs-h" type="text" name="description">
                    </div>

                     <br>
                    <label for="recipe_image">Imagen principal</label>
                    <img id="preview" src="./imgs/preview.png" width="125" height="125" alt="Preview">
                    <input id="recipe_image" type="file" name="recipe_image" onchange="readURL(this)">
                    <br>

                    <p class="admin-inputs-divs">Ingredients</p>        
                    <div id="ingredients">
                    </div>    
                    <button type="button" id="add-ingredient">Add ingredient</button>
                    <br>
                    <input class="mt-5 button" type="submit" value="SUBMIT">

  
                 
                </div>
            </div>
        </div>
        </form>

    </section>
    <section class="admin-page">
        <div class="container mt-sect">
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
     label. setAttribute('for', 'ingredient')
     document.querySelector('#'+id).appendChild(label);

     let input = document.createElement("input");
     input.type = "text";
     input.setAttribute('name', 'ingredients[]');
     document.querySelector('#'+id).appendChild(input);

     let btn = document.createElement("button");
     btn.innerText = "remove";
     btn.addEventListener("click", function(){
         document.querySelector('#'+id).remove();
     });
     document.querySelector('#'+id).appendChild(btn);

 });

</script>
   
</body>

</html>