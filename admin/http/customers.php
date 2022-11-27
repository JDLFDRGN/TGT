<?php
    require('./partials/session.php');
    require('./../db/connector.php'); 
    require('./functions/php/customers.php');
  
    if(isset($_POST['add'])){
      $profile = $_FILES['profile']['name'];
      $profile_temp = $_FILES['profile']['tmp_name'];
      $email = $_POST['email'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $gender = $_POST['gender'];
      $birthdate = $_POST['birthdate'];
      $password = $_POST['password'];
      $reenter = $_POST['reenter'];

      if($password != $reenter){
        $error = "Passwords don't match";
      }else{
          addCustomer($profile, $email, $firstname, $lastname, $gender, $birthdate, md5($password));

          if($profile != '')
              move_uploaded_file($profile_temp, "./../img/uploaded/".$profile);
      }
    }
  
    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $profile = $_FILES['profile']['name'];
        $profile_temp = $_FILES['profile']['tmp_name'];
        $recent_profile = $_POST['recent-profile'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $old_password = $_POST['old'];
        $new_password = $_POST['new'];
        $reenter_password = $_POST['reenter'];

        if(isset($_POST['check-password-change'])){
          $valid = true;
          $oldPasswordValid = checkOldPassword($id, md5($old_password));
          if(!$oldPasswordValid){
              $valid = false;
              $error = "Invalid Old Password";
          }else if($new_password != $reenter_password){
              $valid = false;
              $error = "Passwords don't match";
          }
          if($valid){
              if($profile != '')
                  move_uploaded_file($profile_temp, "./../img/uploaded/".$profile);

              editCustomerWithPassword($id, $profile, $email, $firstname, $lastname, $gender, $birthdate, md5($new_password));
          }
        }else{
            if($profile != '')
                move_uploaded_file($profile_temp, "./../img/uploaded/".$profile);
            editCustomer($id, $profile, $email, $firstname, $lastname, $gender, $birthdate);
        }
    }
    if(isset($_POST['activate'])){
        $id = $_POST['id'];
        $status = checkCustomerStatus($id);

        if($status == 1)
            deactivateCustomer($id);
        else
            activateCustomer($id);
        
    }
    if(isset($_POST['delete'])){
      $id = $_POST['id'];
      $profile = $_POST['profile'];
  
      deleteCustomer($id);
    }
?>