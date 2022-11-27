<?php
     require('./partials/session.php');
     require('./../db/connector.php'); 
     require('./functions/php/order-details.php');
   
     if(isset($_REQUEST['id'])){
       $results = order($_REQUEST['id'])->fetch_assoc();
       $json = json_decode($results['package']);
       $data = $json->data;
       $subtotal = $json->subtotal;
       $couponID = isset($json->couponID) ? $json->couponID : 0;
       $coupon = $json->coupon;
       $total = $json->total;
     }
   
     if(isset($_POST['submit'])){
       $id = $_REQUEST['id'];
       $status = $_POST['status'];
       $gross = $_POST['gross'];
       $shipping = $_POST['shipping-input'];
       $net = $_POST['net'];
   
       if($status == 'Received'){
           addSale($id, $shipping, $gross, $net);
           foreach($data as $sold){
               $sold = (array)$sold;
   
               updateProductSold($sold['productID'], $sold['productQuantity']);
           }
       }
       
       updateStatus($_REQUEST['id'], $status);
       header('Location: ./order.php');
     }   
?>