<?php
    function allCustomers(){
        global $connect;
        $query = "SELECT * FROM tbl_user";
        $result = $connect->query($query);

        return $result;
    }
    function addCustomer($profile, $email, $firstname, $lastname, $gender, $birthdate, $password){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $query = "INSERT INTO tbl_user(profile, email, firstname, lastname, gender, birthdate, password, created_at, updated_at) VALUES('$profile','$email','$firstname','$lastname','$gender','$birthdate','$password', '$date', '$date');";
        $result = $connect->query($query);
    }

    function editCustomer($id, $profile, $email, $firstname, $lastname, $gender, $birthdate){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');
        
        if($profile != '')
            $query = "UPDATE tbl_user SET profile = '$profile', email = '$email', firstname = '$firstname', lastname = '$lastname', gender = '$gender', birthdate = '$birthdate', updated_at = '$date' WHERE id = '$id';";
        else
            $query = "UPDATE tbl_user SET email = '$email', firstname = '$firstname', lastname = '$lastname', gender = '$gender', birthdate = '$birthdate', updated_at = '$date' WHERE id = '$id';";
        
        $connect->query($query);
    }
    function editCustomerWithPassword($id, $profile, $email, $firstname, $lastname, $gender, $birthdate, $password){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');
        
        if($profile != '')
            $query = "UPDATE tbl_user SET profile = '$profile', email = '$email', firstname = '$firstname', lastname = '$lastname', gender = '$gender', birthdate = '$birthdate',password = '$password' , updated_at = '$date' WHERE id = '$id';";
        else
            $query = "UPDATE tbl_user SET email = '$email', firstname = '$firstname', lastname = '$lastname', gender = '$gender', birthdate = '$birthdate', password = '$password', updated_at = '$date' WHERE id = '$id';";
        
        $connect->query($query);
    }

    function deleteCustomer($id){
        global $connect;
        $query = "DELETE FROM tbl_user WHERE id = '$id';";
        $result = $connect->query($query);
    }
    function checkOldPassword($id, $password){
        global $connect;

        $query = "SELECT * FROM tbl_user WHERE ID = '$id' AND `password` = '$password';";
        $result = $connect->query($query);

        return $result->num_rows > 0 ? 1 : 0;
    }
    function activateCustomer($id){
        global $connect;

        $query = "UPDATE tbl_user SET activate = 'yes' WHERE ID = '$id';";
        $connect->query($query);
    }
    function deactivateCustomer($id){
        global $connect;

        $query = "UPDATE tbl_user SET activate = 'no' WHERE ID = '$id';";
        $connect->query($query);
    }
    function checkCustomerStatus($id){
        global $connect;

        $query = "SELECT * FROM tbl_user WHERE ID = '$id' AND activate = 'yes';";
        $result = $connect->query($query);

        return $result->num_rows > 0 ? 1 : 0;
    }
?>