<?php
    function allProductAlphabetical(){
        global $connect;

        $query = "SELECT * FROM tbl_product ORDER BY brand";
        $result = $connect->query($query);

        return $result;
    }
    function allSeasonalDiscount(){
        global $connect;

        $query = "SELECT tbl_seasonal_discount.ID AS ID, tbl_seasonal_discount.product AS productID, tbl_seasonal_discount.percentage AS percentage, tbl_seasonal_discount.created_at AS created_at, tbl_seasonal_discount.updated_at AS updated_at, tbl_seasonal_discount.expired_at AS expired_at, tbl_product.brand AS brand FROM tbl_seasonal_discount INNER JOIN tbl_product ON tbl_seasonal_discount.product = tbl_product.ID;";
        $result = $connect->query($query);

        return $result;
    }
    function deleteSeasonalDiscount($id){
        global $connect;

        $query = "DELETE FROM tbl_seasonal_discount WHERE ID = '$id';";
        $result = $connect->query($query);
    }
    function addSeasonalDiscount($productID, $percentage, $expiration){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $query = "INSERT INTO tbl_seasonal_discount(product, percentage, created_at, updated_at, expired_at) VALUES('$productID', $percentage, '$date', '$date', '$expiration');";
        $result = $connect->query($query);

        return $result;
    }
    function editSeasonalDiscount($id, $productID, $percentage, $expiration){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $query = "UPDATE tbl_seasonal_discount SET product ='$productID', percentage = $percentage, updated_at = '$date', expired_at = '$expiration' WHERE ID = '$id';";
        $result = $connect->query($query);

        return $result;
    }
?>