<?php
    require 'db.php';

    $levels = $database->select("tb_recipe_levels","*");
    $categories = $database->select("tb_recipe_category","*");
    $ocassions = $database->select("tb_recipe_ocassions","*");

 
    //recipe
    $recipe = $database->select("tb_recipes",[
        "[><]tb_recipe_category"=>["id_recipe_category" => "id_recipe_category"],
        "[><]tb_recipe_levels"=>["id_recipe_level" => "id_recipe_level"],
        "[><]tb_recipe_ocassions"=>["id_recipe_ocassion" => "id_recipe_ocassion"],
    ],[
        "tb_recipes.id_recipe",
        "tb_recipes.id_recipe_category",
        "tb_recipes.recipe_name",
        "tb_recipes.prep_time",
       // "tb_recipes.recipe_total_time",
       // "tb_recipes.recipe_yields",
        "tb_recipes.recipe_image",
        "tb_recipes.recipe_description",
        "tb_recipes.recipe_likes",
        "tb_recipes.recipe_ingredients",
        //"tb_recipes.recipe_directions",
        "tb_recipe_category.recipe_category",
        "tb_recipes.id_recipe_level",
        "tb_recipes.id_recipe_ocassion",
        "tb_recipe_levels.recipe_level"
    ],[
        "tb_recipes.id_recipe" => $_GET["id_recipe"]
    ]);

    //related recipes
    $related_recipes = $database->select("tb_recipes", "*", [
        "id_recipe_category" => $recipe[0]["id_recipe_category"],
        "id_recipe_category" => $recipe[0]["id_recipe_category"],
        'LIMIT' => 4
    ]);
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    <!--fonts oswald-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Oswald:wght@300;400;700&display=swap"
        rel="stylesheet">

    <!---Bootsrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!--Iconos-->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--fronts.css-->
    <link rel="stylesheet" href="./css/Components/front.css">
    <link rel="stylesheet" href="./css/components.css">
    <link rel="stylesheet" href="./css/frontsprincipa.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <section class="principal decoration2">
        <header class="header">
            <div class="header-limit">
                <a href="./foodscode.html"> <img class="logo-header" src="./imgs/Logo (1).png" alt="logo"> </a>
                <div class="search-limit">
                    <div class="group">
                        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                            <g>
                                <path
                                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                                </path>
                            </g>
                        </svg>
                        <input placeholder="¿Qué vas a comer?" type="search" class="input">
                    </div>
                </div>
            </div>
        </header>
        <a href="./foodscode.html"> <img class="back-icon" src="./imgs/atras.png" alt="atras"> </a>
</section>

    
            <div class="row g-0 mt-3">
                <ul class="">
                    <li class=""><span class='title-md'>Cook time:</span> <?php echo $recipe[0]["prep_time"]; ?></li>
                    <li class=""><span class='fw-bolder'>Skill level:</span> <?php echo $recipe[0]["recipe_level"]; ?></li>
                </ul>
                <a type="button" href="likes.php?id_recipe=<?php echo $recipe[0]["id_recipe"]; ?>" class="btn btn-dark position-relative mt-3 mx-auto likes">
                    Likes <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php echo $recipe[0]["recipe_likes"]; ?>
                        <span class="visually-hidden">likes</span>
                    </span>
                </a>
            </div>
            
            <div class="row g-0 mt-3">
                <p class="p-3"><?php echo $recipe[0]["recipe_description"]; ?></p>
            </div>

            <div class="row g-0 mt-1">
                <div class="col-6 p-3">
                    <h4>Ingredients</h4>
                    <ul>
                        <?php 
                            $ingredients = [];
                            $ingredients = explode(",", $recipe[0]["recipe_ingredients"]);
                        
                            foreach ($ingredients as $key => $ingredient){
                                if($key != array_key_last($ingredients)){
                                    echo "<li>".$ingredient."</li>";
                                }
                            }

                        ?>
                    </ul>

                    <?php 
                        echo "<a href='pdf.php?id_recipe=".$recipe[0]["id_recipe"]."' target='blank' class='mt-3 btn btn-outline-secondary'>Download this recipe</a>";
                    ?>

                </div>
       
            <div class="row g-0 mt-1">
                <h4 class='fw-bolder ps-3'>Related recipes</h4>
            </div>

         
            
        </div>
    </div>


















    <!-- contact us -->
    <footer class="container-fluid mt-5 text-grn p-0 m-0">
        <div class="container-footerr">

            <p class="badge badge-blue text-start">CONTACT US</p>
            <a class="nav-item nav-link title-lg text-white" href="ermaill:hello@foods.com">Hello@Foods.com
                <span><img src="./imgs/arrow.svg" alt="arrow"></span></a>
            <div class="d-flex justify-content-center mt-xl-5">

                <span class="fa-stack fa-lg icons-color">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x"></i>
                </span>

                <span class="fa-stack fa-lg icons-color">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-youtube-play fa-stack-1x"></i>
                </span>

                <span class="fa-stack fa-lg icons-color">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-facebook-f fa-stack-1x"></i>
                </span>
            </div>
        </div>
    </footer>

</body>

</html>