<?php
    require('./partials/session.php');
    require('./../db/connector.php'); 
    require('./functions/php/seasonal.php');
  
    if(isset($_POST['add'])){
      $id = $_POST['product'];
      $percentage = $_POST['percentage'];
      $expiration = $_POST['expiration'];
  
      addSeasonalDiscount($id, $percentage, $expiration);
    }
  
    if(isset($_POST['edit'])){
      $id = $_POST['id'];
      $productID = $_POST['product'];
      $percentage = $_POST['percentage'];
      $expiration = $_POST['expiration'];
  
      editSeasonalDiscount($id, $productID, $percentage, $expiration);
  
    }
  
    if(isset($_POST['delete'])){
      $id = $_POST['id'];
  
      deleteSeasonalDiscount($id);
    }
?>