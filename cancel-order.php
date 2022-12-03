<?php
    include './db/connector.php';
    include './functions/php/order.php';

    cancelOrder($_POST['ID']);
?>