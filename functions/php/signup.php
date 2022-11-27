<?php
    function insertAccount($profile, $email, $firstname, $lastname, $gender, $birthdate, $password){
        global $connect;

        date_default_timezone_set('Asia/Manila');
        $date = date('m-d-Y h:ia');

        $query = "INSERT INTO tbl_user(profile, email, firstname, lastname, gender, birthdate, password, created_at, updated_at) VALUES('$profile','$email','$firstname','$lastname','$gender','$birthdate','$password', '$date', '$date');";
        $result = $connect->query($query);

        if($result){
            $_SESSION['result'] = "Registered Successfully!";
            return 1;
        }else{
            $_SESSION['error'] = "Error Occured";
            return 0;
        }
    }
    function emailExists($email){
        global $connect;

        $query = "SELECT * FROM tbl_user WHERE email = '$email';";
        $result = $connect->query($query);

        return $result->num_rows > 0 ? 1 : 0 ; 
    }
?>