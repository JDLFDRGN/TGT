<?php
    include './../db/connector.php';
    include './functions/php/index.php';

    $results = todaySales();
    $array = array();
    foreach($results as $result)
        array_push($array, $result);
    
    print_r(json_encode($array));
?>