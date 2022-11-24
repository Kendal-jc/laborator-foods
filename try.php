<?php 
    include('simple_html_dom.php');

    $html =file_get_html('https://cocina-casera.com/mx/');

    echo $html;

?>