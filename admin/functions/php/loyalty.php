<?php
    function allUsersAlphabetical(){
        global $connect;

        $query = "SELECT * FROM tbl_user ORDER BY firstname;";
        $result = $connect->query($query);

        return $result;
    }
    function allLoyaltyDiscount(){
        global $connect;

        $query = "SELECT tbl_loyalty_discount.ID AS ID, tbl_loyalty_discount.code AS code, tbl_loyalty_discount.quantity AS quantity, tbl_loyalty_discount.percentage AS percentage, tbl_loyalty_discount.created_at AS created_at, tbl_loyalty_discount.updated_at AS updated_at, tbl_loyalty_discount.expired_at AS expired_at, tbl_user.ID AS userID, tbl_user.firstname AS firstname, tbl_user.lastname AS lastname FROM tbl_loyalty_discount INNER JOIN tbl_user ON tbl_loyalty_discount.user = tbl_user.ID;";
        $result = $connect->query($query);

        return $result;
    }   
    function deleteLoyaltyDiscount($id){
        global $connect;

        $query = "DELETE FROM tbl_loyalty_discount WHERE ID = '$id';";
        $result = $connect->query($query);
    }
    function addLoyaltyDiscount($id, $code, $quantity, $percentage, $expiration){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $query = "INSERT INTO tbl_loyalty_discount(user, code, quantity, percentage, created_at, updated_at, expired_at) VALUES($id,'$code',$quantity,$percentage,'$date','$date','$expiration');";
        $result = $connect->query($query);

        return $result;
    }
    function editLoyaltyDiscount($id, $userID, $code, $quantity, $percentage, $expiration){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $query = "UPDATE tbl_loyalty_discount SET user ='$userID', code = '$code', quantity = '$quantity', percentage = $percentage, expired_at = '$expiration' WHERE ID = '$id';";
        $result = $connect->query($query);

        return $result;
    }
    function user($id){
        global $connect;

        $query = "SELECT * FROM tbl_user WHERE ID = '$id' LIMIT 1;";
        $result = $connect->query($query);

        return $result->fetch_assoc();
    }
    function addNotification($type, $title, $id, $message){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');
        $expiration=Date('Y-m-d', strtotime('+3 days'));

        $query = "INSERT INTO tbl_notification(type, title, user, message, created_at, expired_at) VALUES('$type' , '$title', '$id', '$message', '$date', '$expiration');";
        $result = $connect->query($query);

        return $result;
    }

?>