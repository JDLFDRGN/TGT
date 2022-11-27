<?php
    function couponDeduct($userID, $couponID, $quantity){
        global $connect;

        $query = "UPDATE tbl_loyalty_discount SET quantity = '$quantity' WHERE user = '$userID' AND ID = '$couponID';";
        $connect->query($query);
    }
    function couponQuantity($id){
        global $connect;

        $query = "SELECT quantity FROM tbl_loyalty_discount WHERE ID = '$id' LIMIT 1;";
        $result = $connect->query($query);

        return $result->fetch_assoc()['quantity'];
    }
    function productDeduct($id, $quantity){
        global $connect;

        $query = "UPDATE tbl_product SET quantity = '$quantity' WHERE ID = '$id';";
        $connect->query($query);

    }
    function productQuantity($id){
        global $connect;

        $query = "SELECT quantity FROM tbl_product WHERE ID = '$id' LIMIT 1;";
        $result = $connect->query($query);

        return $result->fetch_assoc()['quantity'];
    }
    function insertOrder($userID, $payment, $package, $firstname, $lastname, $email, $number, $city, $zipcode, $hnos, $barangay, $address, $gcash, $mpin, $appointment){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $query = "INSERT INTO tbl_order(user, payment, package, firstname, lastname, email, number, city, zipcode, barangay, hnos, address, ordered_at, gcash, mpin, appointment) VALUES($userID, '$payment', '$package', '$firstname', '$lastname', '$email', '$number', '$city', '$zipcode', '$barangay', '$hnos', '$address', '$date', '$gcash', '$mpin', '$appointment');";
        $result = $connect->query($query);

        return $result;
    }
    function deleteCart($id){
        global $connect;

        $query = "DELETE FROM tbl_cart WHERE ID = '$id';";
        $connect->query($query);
    }
?>