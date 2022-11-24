<?php
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

    if($_POST){
        //https://geonode.com/free-proxy-list/
        $proxyurl = '81.95.232.73:3128';

        $context = stream_context_create();
        stream_context_set_params($context, array(
            'proxy' => $proxyurl,
            'ignore_errors' => true, 
            'max_redirects' => 3)
        );

        $recipe = [];
        $ingredients = [];
        $descriptions = [];
        
        $detailed_recipe = file_get_html($_POST["link"], 0, $context);

        $data['name'] = $detailed_recipe->find('h1',0)->plaintext;
        
        $image = $detailed_recipe->find('.img',0);
        if($image == null){
            $data['image'] = "no image";
        }else {
            $data['image'] = $image->src;
            file_put_contents("./imgs/recipe-".generateRandomString().".png",file_get_contents($image->src));
        }

       // $data['description'] = $detailed_recipe->find('#recipe-introduction p', 0)->plaintext;
       
        $data['level'] = $detailed_recipe->find('.rdr-tag',0)->plaintext;
        $data['totaltime'] = $detailed_recipe->find('.rdr-tag',1)->plaintext;
        
        foreach($detailed_recipe->find('.ingredients ul li') as $ingredient){
            $ingredients[] = "<li>".$ingredient->plaintext."</li>";
        }
        $data['ingredients'] = $ingredients;

        foreach($detailed_recipe->find('.description ol li') as $description){
            $descriptions[] = "<li>".$description->plaintext."</li>";
        }
        $data['descriptions'] = $descriptions;
        
        $recipe[] = $data;

        var_dump($recipe);
        
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
    <a href="https://www.recetasderechupete.com/" target="blank">Recipes</a>
</body>
</html>