<?php
    function allProductsWhere($keyword){
        global $connect;

        if($keyword == '')
            $query = "SELECT * FROM tbl_product;";
        else
            $query = "SELECT tbl_product.ID AS ID, tbl_product.product AS product, tbl_category.category AS category, tbl_product.brand AS brand, tbl_product.description AS description, tbl_product.price FROM tbl_product INNER JOIN tbl_category ON tbl_product.category = tbl_category.ID WHERE tbl_category.category LIKE '%$keyword%' OR tbl_product.brand LIKE '%$keyword%' OR tbl_product.description LIKE '%$keyword%' OR tbl_product.price LIKE '%$keyword%';";

        $result = $connect->query($query);
        return $result;
    }
    function allProductsWhereCategory($category){
        global $connect;

        if($category == '')
            $query = "SELECT * FROM tbl_product";
        else
            $query = "SELECT tbl_product.ID AS ID, tbl_product.product AS product, tbl_category.category AS category, tbl_product.brand AS brand, tbl_product.description AS description, tbl_product.price FROM tbl_product INNER JOIN tbl_category ON tbl_product.category = tbl_category.ID WHERE tbl_product.category = '$category';";

        $result = $connect->query($query);
        return $result;
    }
?>