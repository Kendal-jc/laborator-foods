<?php
require 'db.php';
    //https://simplehtmldom.sourceforge.io/docs/1.9/
    include('simple_html_dom.php');

    //https://stackoverflow.com/questions/4356289/php-random-string-generator
    function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

   // if($_POST){

        $links=["https://cocina-casera.com/bacalao-en-salsa-verde/",
        "https://cocina-casera.com/verduras-al-horno/",
        "https://cocina-casera.com/guiso-de-costillas-con-patatas/",
        "https://cocina-casera.com/pastel-de-pavo-y-queso/",
        "https://cocina-casera.com/flan-pastelero-al-horno/",
        "https://cocina-casera.com/ensalada-de-pollo/",
        "https://cocina-casera.com/como-recuperar-bizcocho-estropeado/",
        "https://cocina-casera.com/lomo-saltado-peruano/",
        "https://cocina-casera.com/crema-pastelera-para-una-tarta/",
        "https://cocina-casera.com/pulpo-a-feira/",
        "https://cocina-casera.com/albondigas-de-pollo/"];
        //https://geonode.com/free-proxy-list/
        $proxyurl = '81.95.232.73:3128';

        $context = stream_context_create();
        stream_context_set_params($context, array(
            'proxy' => $proxyurl,
            'ignore_errors' => true, 
            'max_redirects' => 3)
        );

        for($i=0; $i<count($links); $i++){

        $recipe = [];
        $ingredientss = [];
        $descriptionss = [];
        
        $detailed_recipe = file_get_html($links[$i], 0, $context);

        $data['name'] = $detailed_recipe->find('h1',0)->plaintext;
        
        $image = $detailed_recipe->find('.post-thumbnail img',0);
          $data['image'] = "no image"; if($image == null){
         
        }else {
            $data['image'] = $image->src;
            file_put_contents("./imgs/recipe-".generateRandomString().".jpg",file_get_contents($image->src));
        }

        //$data['description'] = $detailed_recipe->find('#recipe-introduction p', 0)->plaintext;

        $data['totaltime'] = $detailed_recipe->find('.valor',0)->plaintext;
        $data['level'] = $detailed_recipe->find('.valor',2)->plaintext;
        
        foreach($detailed_recipe->find('.entry-content ul li') as $ingredient){
            $ingredientss[] = "<li>".$ingredient->plaintext."</li>";
        }
        $data['ingredients'] = $ingredientss;

        foreach($detailed_recipe->find('ol li') as $descriptions){
            $descriptionss[] = "<li>".$descriptions->plaintext."</li>";
        }
        $data['descriptions'] = $descriptionss;

        // Reference: https://medoo.in/api/insert
        $database->insert("tb_recipes",[
            "recipe_name"=>$data['name'],
            "recipe_level"=>$data['level'],
            "id_recipe_category"=> 'sprapped',
            "recipe_time"=> trim($data['totaltime'])
        ]);
        
        $recipe[] = $data;
        //var_dump($recipe);   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data scrapping</title>
</head>
<body>
    <form action="scrapper.php" method="post">
        <label for="link">URL</label>    
        <input name="link" type="text">
        <input type="submit" value="GET DATA">
    </form>
    <a href="https://cocina-casera.com/" target="blank">Recipes</a>
</body>
</html>
