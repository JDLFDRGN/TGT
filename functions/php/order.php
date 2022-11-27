<?php
    function myOrder($id){
        global $connect;

        $query = "SELECT * FROM tbl_order WHERE user = '$id';";
        $result = $connect->query($query);

        return $result;
    }
    function addRating($order, $userID, $productID, $star, $recommendation){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $query = "INSERT INTO tbl_rating(`order`, user, product, star, recommendation, submitted_at) VALUES('$order', '$userID', '$productID', '$star', '$recommendation', '$date');";
        $result = $connect->query($query);

        return $result;
    }
    function ratingExists($orderID ,$userID, $productID){
        global $connect;

        $query = "SELECT * FROM tbl_rating WHERE `order` = '$orderID' AND user = '$userID' AND product = '$productID';";
        $result = $connect->query($query);

        return $result->num_rows > 0 ? 1 : 0;
    }
    function deleteOrder($id){
        global $connect;

        $query = "DELETE FROM tbl_order WHERE ID = '$id';";
        $connect->query($query);
    }
?>