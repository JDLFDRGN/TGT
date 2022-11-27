<?php
    require('./partials/session.php');
    require('./../db/connector.php'); 
    require('./functions/php/order.php');
  
    if(isset($_POST['delete'])){
      $id = $_POST['id'];
  
      deleteOrder($id);
    }
?>