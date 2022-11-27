<?php
     require('./partials/session.php');
     require('./../db/connector.php'); 
     require('./functions/php/loyalty.php');
   
     if(isset($_POST['add'])){
       $id = $_POST['user'];
       $code = $_POST['code'];
       $quantity = $_POST['quantity'];
       $percentage = $_POST['percentage'];
       $expiration = $_POST['expiration'];
       $user = user($id);
       $type = "loyalty";
       $title = "Loyalty Coupon";
       $message = "Hi ".ucwords($user['firstname'])." ".ucwords($user['lastname']).", thanks for being such a loyal customer. As a thank you, we grant you ".$quantity." coupon code valid for ".$expiration.", just type \"$code\" to use discount.";
   
       addLoyaltyDiscount($id, $code, $quantity, $percentage, $expiration);
       addNotification($type, $title, $id, $message);
     }
   
     if(isset($_POST['edit'])){
       $id = $_POST['id'];
       $user_id = $_POST['user'];
       $code = $_POST['code'];
       $quantity = $_POST['quantity'];
       $percentage = $_POST['percentage'];
       $expiration = $_POST['expiration'];
   
       editLoyaltyDiscount($id, $user_id, $code, $quantity, $percentage, $expiration);
     }
   
     if(isset($_POST['delete'])){
       $id = $_POST['id'];
   
       deleteLoyaltyDiscount($id);
     }
?>