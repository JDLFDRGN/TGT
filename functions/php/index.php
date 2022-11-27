<?php
     function allProducts(){
        global $connect;
        $query = "SELECT tbl_product.ID, tbl_product.product, tbl_product.brand, tbl_product.category AS categoryID, tbl_product.description, tbl_product.quantity, tbl_product.price, tbl_product.created_at, tbl_product.updated_at, tbl_category.category FROM tbl_product  INNER JOIN tbl_category ON tbl_product.category = tbl_category.ID;";
        $result = $connect->query($query);

        return $result;
    }
    function allProductsLimit($limit){
        global $connect;
        $query = "SELECT tbl_product.ID, tbl_product.product, tbl_product.brand, tbl_product.category AS categoryID, tbl_product.description, tbl_product.quantity, tbl_product.price, tbl_product.created_at, tbl_product.updated_at, tbl_category.category FROM tbl_product  INNER JOIN tbl_category ON tbl_product.category = tbl_category.ID LIMIT $limit;";
        $result = $connect->query($query);

        return $result;
    }
    function allProductsLimitDescending($limit){
        global $connect;
        $query = "SELECT tbl_product.ID, tbl_product.product, tbl_product.brand, tbl_product.category AS categoryID, tbl_product.description, tbl_product.quantity, tbl_product.price, tbl_product.created_at, tbl_product.updated_at, tbl_category.category FROM tbl_product  INNER JOIN tbl_category ON tbl_product.category = tbl_category.ID ORDER BY ID DESC LIMIT $limit;";
        $result = $connect->query($query);

        return $result;
    }
    function productDiscount($id){
        global $connect;

        $query = "SELECT * FROM tbl_seasonal_discount WHERE product = '$id';";
        $result = $connect->query($query);

        return $result;
    }
    function allCategories(){
        global $connect;

        $query = "SELECT * FROM tbl_category";
        $result = $connect->query($query);

        return $result;
    }
    function myNotification($id){
        global $connect;

        $query = "SELECT * FROM tbl_notification WHERE user = '$id';";
        $result = $connect->query($query);

        return $result;
    }
    function rating($productID){
        global $connect;

        $query = "SELECT * FROM tbl_rating WHERE product = '$productID';";
        $result = $connect->query($query);

        return $result;
    }
    function productSold($productID){
        global $connect;

        $query = "SELECT sold FROM tbl_product_sold WHERE product = '$productID';";
        $result = $connect->query($query);

        return $result->fetch_assoc();
    }
    function productAverage($productID){
        global $connect;

        $query = "SELECT AVG(star) AS average FROM tbl_rating WHERE product = '$productID';";
        $result = $connect->query($query);

        return $result->fetch_assoc();
    }
?>
