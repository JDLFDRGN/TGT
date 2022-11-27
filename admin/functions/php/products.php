<?php
    function allProducts(){
        global $connect;
        $query = "SELECT tbl_product.ID, tbl_product.product, tbl_product.brand, tbl_product.category AS categoryID, tbl_product.description, tbl_product.quantity, tbl_product.price, tbl_product.created_at, tbl_product.updated_at, tbl_category.category FROM tbl_product  INNER JOIN tbl_category ON tbl_product.category = tbl_category.ID;";
        $result = $connect->query($query);

        return $result;
    }

    function addProduct($product, $brand, $category, $description, $quantity, $price){
    global $connect;

    date_default_timezone_set('Asia/Manila');
    $date = date('m-d-Y h:ia');
    
    if(is_numeric($price)){
        $query = "INSERT INTO tbl_product(product, brand, category, description, quantity, price, created_at, updated_at) VALUES('$product','$brand','$category','$description','$quantity', $price, '$date', '$date');";
        $result = $connect->query($query);
        
        if($result)
            return 1;
        else{ 
            $_SESSION['error'] = 'Error occured';
            return 0;
        }
    }else{
        $_SESSION['error'] = 'Please enter numeric value';
        return 0;
    }

    }

    function addProductSold($productID){
        global $connect;

        $query = "INSERT INTO tbl_product_sold(product, sold) VALUES('$productID', 0);";
        $result = $connect->query($query);

        return $result;
    }

    function editProduct($id, $product, $brand, $category, $description, $quantity, $price){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');
  
        if(is_numeric($price)){
                  
            if($product != '')
                $query = "UPDATE tbl_product SET product = '$product', brand = '$brand', category = '$category', description = '$description', quantity = '$quantity', price = '$price', updated_at = '$date' WHERE id = '$id';";
            else
                $query = "UPDATE tbl_product SET brand = '$brand', category = '$category', description = '$description', quantity = '$quantity', price = '$price', updated_at = '$date' WHERE id = '$id';";
            
            $connect->query($query);
            return 1;
        }else{
            $_SESSION['error'] = 'Please enter numeric value';
            return 0;
        }
    }

    function deleteProduct($id){
        global $connect;
        $query = "DELETE FROM tbl_product WHERE id = '$id';";
        $result = $connect->query($query);
    }

    function getLatestProduct(){
        global $connect;

        $query = "SELECT * FROM tbl_product ORDER BY ID DESC LIMIT 1";
        $result = $connect->query($query);

        return $result;
    }
?>