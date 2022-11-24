<?php 
    include('simple_html_dom.php');

    $html =file_get_html('https://www.recetasgratis.net/');

    echo $html;

?>