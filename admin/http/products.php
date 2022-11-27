<?php
    require('./partials/session.php');
    require('./../db/connector.php');
    require('./functions/php/customers.php');
    require('./functions/php/categories.php');
    require('./functions/php/products.php');

    if(isset($_POST['add'])){
        $product = $_FILES['product']['name'];
        $product_temp = $_FILES['product']['tmp_name'];
        $brand = $_POST['brand'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
     
        if(addProduct($product, $brand, $category, $description, $quantity, $price)){
            $latest = getLatestProduct()->fetch_assoc();
            addProductSold($latest['ID']);
            if($product != '')
              move_uploaded_file($product_temp, "./img/uploaded/".$product);
        }else
          $error = $_SESSION['error'];
        
    }
    
      if(isset($_POST['edit'])){
          $id = $_POST['id'];
          $product = $_FILES['product']['name'];
          $product_temp = $_FILES['product']['tmp_name'];
          $recent_product = $_POST['recent-product'];
          $brand = $_POST['brand'];
          $category = $_POST['category'];
          $description = $_POST['description'];
          $quantity = $_POST['quantity'];
          $price = $_POST['price'];
    
          if(editProduct($id, $product, $brand, $category, $description, $quantity, $price)){
            if($product != '')
              move_uploaded_file($product_temp, "./img/uploaded/".$product);
          }else
            $error = $_SESSION['error'];
      }
    
      if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $product = $_POST['product'];
    
        deleteProduct($id);
      }
?>
