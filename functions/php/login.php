<?php
    function accountExists($userType, $username, $password){
        global $connect;

        if($userType == 'admin'){
            $table = 'tbl_admin ';
            $where = "WHERE username = '$username' AND password = '$password' ";
        }else if($userType == 'user'){
            $table = 'tbl_user ';
            $where = "WHERE email = '$username' AND password = '$password' ";
        }else{
            $_SESSION['error'] = "User Type Error!";
            return 0;
        }

        $query = "SELECT * FROM $table $where LIMIT 1";
        $result = $connect->query($query);
        
        if($result->num_rows > 0){
            $_SESSION['result'] = $result->fetch_assoc();
            return 1;
        }else{
            $_SESSION['error'] = "Invalid Username or Password";
            return 0;
        }
    }
    function accountActivated($id){
        global $connect;

        $query = "SELECT * FROM tbl_user WHERE ID = '$id' AND activate = 'yes' LIMIT 1;";
        $result = $connect->query($query);

        return $result->num_rows > 0 ? 1 : 0;
    }
?>