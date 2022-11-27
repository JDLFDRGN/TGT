<?php
    require('./partials/session.php');
    require('./../db/connector.php');
    require('./functions/php/categories.php');

    if(isset($_POST['add'])){
        $category = $_POST['category'];
    
        addCategory($category);
      }
    
      if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $category = $_POST['category'];
    
        editCategory($id, $category);
      }
    
      if(isset($_POST['delete'])){
        $id = $_POST['id'];
    
        deleteCategory($id);
      }
?>