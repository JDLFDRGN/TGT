<?php
    function product($id){
        global $connect;

        $query = "SELECT * FROM tbl_product WHERE ID = '$id';";
        $result = $connect->query($query);

        return $result;
    }
    function deleteProduct($id){
        global $connect;

        $query = "DELETE FROM tbl_cart WHERE ID = '$id';";
        $connect->query($query);
    }
    function addToCart($customer_id, $product_id){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $query = "INSERT INTO tbl_cart(user, product, added_at, updated_at) VALUES('$customer_id','$product_id','$date','$date');";
        $result = $connect->query($query);

        return $result;
    }
    function myCart($id){
        global $connect;

        $query = "SELECT tbl_cart.ID as ID, tbl_product.brand as name, tbl_product.ID as productID, tbl_product.product as product, tbl_product.brand as brand, tbl_product.price as price FROM tbl_cart INNER JOIN tbl_user ON tbl_cart.user = tbl_user.ID INNER JOIN tbl_product ON tbl_cart.product = tbl_product.ID WHERE tbl_user.ID = '$id';";
        $result = $connect->query($query);

        return $result;
    }
    function myCoupon($id){
        global $connect;

        $query = "SELECT * FROM tbl_loyalty_discount WHERE user = '$id';";
        $result = $connect->query($query);

        return $result;
    }
?>
