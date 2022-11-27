<?php
    function allOrders(){
        global $connect;

        $query = "SELECT * FROM tbl_order";
        $result = $connect->query($query);

        return $result;
    }
    function deleteOrder($id){
        global $connect;

        $query = "DELETE FROM tbl_order WHERE ID = '$id';";
        $connect->query($query);
    }
?>