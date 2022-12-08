<?php
    require 'db.php';

    if($_GET){

        $results = $database->select("tb_recipes",[
            "[><]tb_recipe_category"=>["id_recipe_category" => "id_recipe_category"]
        ],[
            "tb_recipes.id_recipe",
            "tb_recipes.recipe_name",
            "tb_recipes.recipe_time",
            "tb_recipes.recipe_image",
            "tb_recipes.recipe_description",
            "tb_recipes.recipe_likes",
            "tb_recipe_category.recipe_category"
        ],[
            "tb_recipes.recipe_name[~]" => $_GET["keyword"]
        ]);
        
    }

    $levels = $database->select("tb_recipe_levels","*");
    $categories = $database->select("tb_recipe_category","*");
    $ocassions = $database->select("tb_recipe_ocassions","*");

    //featured recipes
    $featured_recipes = $database->select("tb_recipes","*",[
        "recipe_is_featured" => 1
    ]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodscode</title>

    <!--fonts roboto-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Roboto:ital,wght@1,900&display=swap"
        rel="stylesheet">

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
    <link rel="stylesheet" href="./css/frontsprincipa.css">
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
<section class="principal testimonial1">

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

<div class="row g-0 mt-5">
                <form class="d-flex pe-3 ps-3" action="search.php" method="get" role="search">
                    <input class="form-control search-recipe" type="search" name="keyword" placeholder="Search recipe" aria-label="Search">
                    <button class="btn btn-outline-success ms-2" type="submit">Search</button>
                </form>

                <?php 
                    if(count($results) > 0){
                        echo "<h4 class='text-center mt-3'>".count($results)." results for <span class='fw-bolder'>".$_GET["keyword"]."</span></h4>";
                    }else{
                        echo "<h4 class='text-center mt-3'>No results for <span class='fw-bolder'>".$_GET["keyword"]."</span></h4>";
                    }
                ?>
            </div>
</body>
</html>