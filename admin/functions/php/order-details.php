<?php
    function order($id){
        global $connect;

        $query = "SELECT * FROM tbl_order WHERE ID = '$id' LIMIT 1;";
        $result = $connect->query($query);

        return $result;
    }
    function updateStatus($id, $status){
        global $connect;

        $query = "UPDATE tbl_order SET status = '$status' WHERE ID = '$id';";
        $connect->query($query);
    }
    function addSale($orderID, $shipping, $gross, $net){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $query = "INSERT INTO tbl_sales(`order`, shipping, gross, net, received_at) VALUES('$orderID', $shipping, $gross, $net, '$date');";
        $result = $connect->query($query);

        return $result;
    }
    function productSold($productID){
        global $connect;

        $query = "SELECT * FROM tbl_product_sold WHERE product = '$productID';";
        $result = $connect->query($query);

        return $result->fetch_assoc()['sold'];
    }
    function updateProductSold($productID, $productQuantity){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $sold = floatval(productSold($productID)) + floatval($productQuantity);
        $query = "UPDATE tbl_product_sold SET sold = $sold, sold_at = '$date' WHERE product = '$productID'; ";
        $connect->query($query);

    }
?>