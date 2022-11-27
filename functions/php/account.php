<?php
    function editAccount($id, $profile, $email, $firstname, $lastname, $gender, $birthdate){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');
        
        if($profile != '')
            $query = "UPDATE tbl_user SET profile = '$profile', email = '$email', firstname = '$firstname', lastname = '$lastname', gender = '$gender', birthdate = '$birthdate', updated_at = '$date' WHERE id = '$id';";
        else
            $query = "UPDATE tbl_user SET email = '$email', firstname = '$firstname', lastname = '$lastname', gender = '$gender', birthdate = '$birthdate', updated_at = '$date' WHERE id = '$id';";
        
        $connect->query($query);
    }
    function editAccountWithPassword($id, $profile, $email, $firstname, $lastname, $gender, $birthdate, $password){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');
        
        if($profile != '')
            $query = "UPDATE tbl_user SET profile = '$profile', email = '$email', firstname = '$firstname', lastname = '$lastname', gender = '$gender', birthdate = '$birthdate',password = '$password' , updated_at = '$date' WHERE id = '$id';";
        else
            $query = "UPDATE tbl_user SET email = '$email', firstname = '$firstname', lastname = '$lastname', gender = '$gender', birthdate = '$birthdate', password = '$password', updated_at = '$date' WHERE id = '$id';";
        
        $connect->query($query);
    }
    function updateSession($id){
        global $connect;

        $query = "SELECT * FROM tbl_user WHERE ID = '$id' LIMIT 1;";
        $result = $connect->query($query);
        $_SESSION['result'] = $result->fetch_assoc();
        return $result;
    }
    function checkOldPassword($id, $password){
        global $connect;

        $query = "SELECT * FROM tbl_user WHERE ID = '$id' AND `password` = '$password';";
        $result = $connect->query($query);

        return $result->num_rows > 0 ? 1 : 0;
    }
?>