<?php
    function latestUsers(){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y');

        $query = "SELECT * FROM tbl_user WHERE created_at LIKE '%$date%';";
        $result = $connect->query($query);

        return $result;
    }
    function latestCustomers(){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y');

        $query = "SELECT DISTINCT user FROM tbl_order WHERE ordered_at LIKE '%$date%';";
        $result = $connect->query($query);

        return $result;
    }
    function salesTotal(){
        global $connect;

        $query = "SELECT SUM(gross) AS sum FROM tbl_sales;";
        $result = $connect->query($query);

        return $result;
    }
    function netProfit(){
        global $connect;

        $query = "SELECT SUM(net) AS net FROM tbl_sales;";
        $result = $connect->query($query);

        return $result;
    }
    function topThreeProducts(){
        global $connect;

        $query = "SELECT * FROM tbl_product_sold INNER JOIN tbl_product ON tbl_product_sold.product = tbl_product.ID ORDER BY tbl_product_sold.sold DESC LIMIT 3;";
        $result = $connect->query($query);

        return $result;
    }
    function todaySales(){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y');

        $query = "SELECT * FROM tbl_product_sold INNER JOIN tbl_product ON tbl_product_sold.product = tbl_product.ID WHERE tbl_product_sold.sold_at LIKE '%$date%';";
        $result = $connect->query($query);

        return $result;
    }
?>