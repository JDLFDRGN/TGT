<?php
    include './db/connector.php';
    include './functions/php/order.php';

    receivedOrder($_POST['ID']);
?>