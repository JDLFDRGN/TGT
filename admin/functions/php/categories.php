<?php
    function allCategories(){
        global $connect;
        $query = "SELECT * FROM tbl_category";
        $result = $connect->query($query);

        return $result;
    }
    function addCategory($category){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $query = "INSERT INTO tbl_category(category, created_at, updated_at) VALUES('$category', '$date', '$date');";
        $result = $connect->query($query);

        return $result;
    }
    function editCategory($id, $category){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');
        
        $query = "UPDATE tbl_category SET category = '$category', updated_at = '$date' WHERE id = '$id';";
        $connect->query($query);
    }
    function deleteCategory($id){
        global $connect;
        $query = "DELETE FROM tbl_category WHERE id = '$id';";
        $result = $connect->query($query);
    }
?>