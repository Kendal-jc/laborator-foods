<?php
    require 'db.php';
    
    $data = $database->select("tb_recipe_category","*");
    $data1 = $database->select("tb_recipe_levels","*");
    $data2 = $database->select("tb_recipe_ocassions","*");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/front.css">
    <link rel="stylesheet" href="./css/frontsprincipa.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="body-admin">
    <section class="admin-page">
        <header class="admin-header mt-3">
            <div class="admin-limit">
                <div class="d-flex justify-content-center">
                    <h1 class="tittle-admin-h">Perfil de administrador</h1>
                </div>
            </div>
            <div class=" justify-content-end">
                <button class="button mt-3">Cerrar sesión</button>
            </div>
        </header>


        <div class="container mt-5">
            <div class="row">
                <div class="col-md prueba-c">
                    <h3 class="mb-4 tittle-recipe">Registrar una receta</h3>

                    <form action="response.php" method="post" enctype="multipart/form-data">
                        <!--atributo para enviar archivos desde el form-->

                        <div class="admin-inputs-divs">
                            <h4>Nombre de la receta:</h4>
                            <input class="admin-inputs" type="text" name="recipe_name">
                        </div>

                        <div class="admin-inputs-divs">
                            <h4>Tiempo total:</h4>
                            <input class="admin-inputs" type="" name="total_time">
                        </div>

                        <div class="admin-inputs-divs">
                            <h4>Porciones:</h4>
                            <input class="admin-inputs" type="Name" name="portions">
                        </div>

                        <div class="admin-inputs-divs">
                            <h4>Nivel de complejidad:</h4>
                            <div class="input-group mb-3">
                                <select name="recipe_level" id="">
                                    <?php
                                    $len = count($data1);
                                    for($i=0; $i<$len; $i++){
                                        echo '<option value="'.$data1[$i]
                                        ['id_recipe_level'].'">'.$data1[$i]
                                        ['recipe_level'].'</option>';
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
                        <input class="admin-inputs-h" type="text" name="desciption">
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
                   <!--  <div class="admin-inputs-divs">
                        <h4>ingredientes:</h4>
                        <div id="ingredients">
                        </div>
                        <button type="button" id="add-ingredient">Add ingredient</button>
                        <br>
                        <input type="submit" value="SUBMIT">
                    </div>

                    <div class="admin-inputs-divs">
                        <h4>Instrucciones:</h4>
                        <input class="admin-inputs-h" type="Name">
                    </div> -->

                   
                    <!-- <h4 class="">Imagen de la receta:</h4>
                    <div class="input-group mb-3 admin-inputs-divs">
                        <input type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Subir</label>
                    </div> -->

                    <!-- <div class=" justify-content-end">
                        <button class="mt-3 ms-5">Subir receta</button>
                    </div>-->
                </div>
            </div>
        </div>
        </form>

    </section>

   
</body>

</html>