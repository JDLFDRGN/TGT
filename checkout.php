<?php
    require("partials/session.php");
    require("./db/connector.php");
    require("./functions/php/checkout.php");
    require("./functions/php/index.php");

    if(isset($_REQUEST['package'])){
        $json = json_decode($_REQUEST['package']);
        $data = $json->data;
        $subtotal = $json->subtotal;
        $couponID = isset($json->couponID) ? $json->couponID : 0;
        $coupon = $json->coupon;
        $total = $json->total;
    }

    if(isset($_POST['submit']) || isset($_POST['submit-gcash'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $package = $_POST['package'];
        $address = $_POST['address'] != '' ? $_POST['address'] : 'NA';
        $gcash = $_POST['gcash'] != '' ? md5($_POST['gcash']) : 'NA';
        $mpin = $_POST['mpin'] != '' ? md5($_POST['mpin']) : 'NA';
        $appointment = $_POST['appointment'] != '' ? $_POST['appointment'] : 'NA';
        $hnos = $_POST['hnos'] != '' ? $_POST['hnos'] : 'NA';
        $city = $_POST['city'] != '' ? $_POST['city'] : 'NA';
        $barangay = $_POST['barangay'] != '' ? $_POST['barangay'] : 'NA';
        $zipcode =  $_POST['zipcode'] != '' ? $_POST['zipcode'] : 'NA';

        $valid = true;
        foreach($data as $item){
            $result = (array)$item;

            $quantity = intval($result['productQuantity']);

            for($i=0;$i<$quantity;$i++){
                if(productQuantity($result['productID']) < $quantity){
                    $valid = false;
                    echo "<script>alert('error');</script>";
                    break;
                }
            }

            if($valid){
                productDeduct($result['productID'], productQuantity($result['productID']) - $quantity);      
                deleteCart($result['cartID']);
            }
                
        }

        if($valid){

            if($_POST['gcash'] != '' && $_POST['mpin'] != '')
                $payment = 'gcash';
            else if($_POST['appointment'] != '')
                $payment = 'cop';
            else
                $payment = 'cod';

            echo $payment;

                insertOrder($_SESSION['result']['ID'], $payment, $package, $firstname, $lastname, $email, $number, $city, $zipcode, $hnos, $barangay, $address, $gcash, $mpin, $appointment);
            
            if($coupon != 0)
                couponDeduct($_SESSION['result']['ID'], $couponID, couponQuantity($couponID) - 1);

            if($payment == 'gcash')
                header('Location: ./gcash-login.php?total='.$total);
            else
                header('Location: ./order.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php include "partials/header.php";?>
<title>Contact Us</title>
<body class="w-full relative">
    <?php include "partials/navbar.php";?>
    <section class="bg-white overflow-hidden relative z-10 min-h-screen">
        <div class="container p-12 mx-auto mt-40">
            <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
                <div class="flex flex-col md:w-full">
                    <div class="flex justify-between">
                        <h2 class="mb-4 font-bold md:text-xl text-heading ">Customer Information</h2>
                        <div><?php include "./partials/payment.php";?></div>
                    </div>
                    <form class="justify-center w-full mx-auto" method="post" action>
                        <textarea class="hidden package" name="package">
                            <?php echo $_REQUEST['package'];?>
                        </textarea> 
                        <div class="">
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="firstname" class="block mb-3 text-sm font-semibold text-gray-500">First
                                        Name</label>
                                    <input required name="firstname" type="text" placeholder="First Name"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                                <div class="w-full lg:w-1/2 ">
                                    <label for="lastname" class="block mb-3 text-sm font-semibold text-gray-500">Last
                                        Name</label>
                                    <input required name="lastname" type="text" placeholder="Last Name"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full">
                                    <label for="email"
                                        class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                                    <input required name="email" type="email" placeholder="Email"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full">
                                    <label for="number"
                                        class="block mb-3 text-sm font-semibold text-gray-500">Phone Number</label>
                                    <input required name="number" type="text" placeholder="Phone Number"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                            <div class="mt-4 address-container">
                                <div class="flex items-center justify-between mt-8">
                                    <h2 class="font-bold md:text-xl text-heading ">Address Information</h2>
                                    <div class="flex items-center">
                                        <input type="checkbox">
                                        <label class="capitalize text-sm ml-2 font-semibold text-gray-500">use default address</label>
                                    </div>
                                </div>
                                <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
                                    <div class="w-full lg:w-1/2">
                                        <label for="firstname" class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                                        <select name="city" class="city w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">                    
                                            <option value="" class="city-select">--Cities--</option>
                                         </select>
                                    </div>
                                    <div class="w-full lg:w-1/2 ">
                                        <label for="lastname" class="block mb-3 text-sm font-semibold text-gray-500">Zip Code</label>
                                        <input required maxlength="4" name="zipcode" type="text" placeholder="Zip Code"
                                            class="w-full zipcode px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    </div>
                                </div>
                                <!-- <div class="w-full mt-4">
                                    <label for="number"
                                        class="block mb-3 text-sm font-semibold text-gray-500">House Number or Street</label>
                                    <input required name="hnos" type="text" placeholder="House Number or Street"
                                        class="w-full px-4 py-3 hnos text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div> -->
                                <div class="w-full mt-4">
                                    <label for="number" class="block mb-3 text-sm font-semibold text-gray-500">Barangay</label>
                                    <select name="barangay" disabled class="barangay w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">                    
                                        <option value="" class="barangay-select">--Barangay--</option>
                                    </select>
                                </div>
                                <div class="w-full mt-4">
                                    <label for="address" class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                                    <textarea required class="w-full address px-4 py-3 text-xs border border-gray-300 resize-none rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600" name="address" cols="20" rows="4" placeholder="Address"></textarea>
                                </div>
                                <div class="flex items-center mt-2">
                                    <input type="checkbox">
                                    <label class="capitalize text-sm ml-2 font-semibold text-gray-500">set as default</label>
                                </div>
                            </div>
                            <!-- Gcash -->
                            <div class="gcash-container hidden">
                                <div class="mt-4">
                                    <div class="w-full">
                                        <label for="gcash"
                                            class="block mb-3 text-sm font-semibold text-gray-500">Gcash Number</label>
                                        <input name="gcash" type="number" placeholder="Gcash Number"
                                            class="gcash w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="w-full">
                                        <label for="mpin"
                                            class="block mb-3 text-sm font-semibold text-gray-500">MPIN</label>
                                        <input name="mpin" type="number" placeholder="MPIN"
                                            class="mpin w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    </div>
                                </div>
                            </div>
                            <!-- Cash on Pickup -->
                            <div class="cop-container hidden">
                                <div class="mt-4">
                                    <div class="w-full">
                                        <label for="appointment"
                                            class="block mb-3 text-sm font-semibold text-gray-500">Pickup Appointment</label>
                                        <input name="appointment" type="date" 
                                            class="appointment w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 submit-button">
                                <button type="submit" class=" w-full font-bold px-6 py-2 text-white bg-gradient-to-r from-green-600 to-cyan-500" name="submit">Place Order</button>
                            </div>
                            <div class="gcash-button hidden hover:cursor-pointer">
                                <div class="mt-4 w-full bg-blue-700 px-6 py-2 flex justify-center items-center">
                                    <button type="submit" name="submit-gcash" class="font-bold text-white">Pay Via Gcash</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">
                    <div class="pt-12 md:pt-0 2xl:ps-4">
                        <h2 class="text-xl font-bold">Order Summary
                        </h2>
                        <?php
                          foreach($data as $row){
                            $result = (array)$row;
                            $imageLocation = $result['productImg'] != '' ? "$result[productImg]" : "default/no-image.png";
                            echo "<div class='mt-8 row'>";
                                echo "<div class='flex flex-col space-y-4'>";
                                    echo "<div class='flex space-x-4'>";
                                        echo "<div>";
                                            echo "<img src='./admin/img/uploaded/$imageLocation' alt='item' class='w-20 h-20'>";
                                        echo "</div>";
                                        echo "<div class='flex flex-col justify-center'>";
                                            echo "<h2 class=' text-lg font-bold'>$result[productName]</h2>";
                                            echo "<div class='flex items-center'>";
                                                echo "<span>Price:</span>";
                                                echo "<span class='ml-2'>₱<span class='price'>$result[productPrice]</span></span>";
                                            echo "</div>";
                                            echo "<div class='flex items-center'>";
                                                echo "<span>Quantity:</span>";
                                                echo "<span class='ml-2 quantity'>$result[productQuantity]</span>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                          }
                        ?>
                        <div class="flex items-center justify-between w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            <span class="text-slate-500">Subtotal</span>   
                            <span class="ml-2 subtotal text-slate-500">₱<?php echo $subtotal;?></span>
                        </div>
                        <div class="flex items-center justify-between w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            <span class="text-slate-500">Coupon</span>   
                            <span class="ml-2 coupon text-slate-500">-₱<?php echo $coupon;?></span>
                        </div>
                        <div class="flex items-center justify-between w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            <span class="text-slate-500">Total</span>   
                            <span class="ml-2 text-slate-500">₱<span class="total text-slate-500"><?php echo $total;?></span></span>
                        </div>
                        <div class="flex items-center justify-between w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            <span class="text-slate-500">Shipping</span>   
                            <span class="ml-2 text-slate-500">₱<span class="shipping text-slate-500">200.00</span></span>
                        </div>
                        <div class="flex items-center justify-between w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            <span class=" text-slate-700">Overall</span>   
                            <span class="ml-2 text-slate-700">₱<span class="overall">0.00</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <?php include "partials/footer.php";?>
</body>
</html>

<script>
    $('.payment-method').on('click', ()=>{
        let paymentID = $('.payment-method:checked').val();

        $('.gcash-container').addClass('hidden');
        $('.cop-container').addClass('hidden');
        $('.gcash').removeAttr('required');
        $('.mpin').removeAttr('required');
        $('.appointment').removeAttr('required');
        $('.address').removeAttr('required');
        $('.hnos').removeAttr('required');
        $('.city').removeAttr('required');
        $('.zipcode').removeAttr('required');
        $('.city-select').attr('selected', 1);
        $('.submit-button').show();
        $('.gcash-button').hide();

        if(paymentID == 1){
            $('.address-container').removeClass('hidden');
            $('.shipping').html('200.00');
            $('.address').attr('required', '1');
            $('.hnos').attr('required', '1');
            $('.city').attr('required', '1');
            $('.zipcode').attr('required', '1');
        }
        if(paymentID == 2){
            // $('.gcash-container').removeClass('hidden');
            $('.address-container').removeClass('hidden');
            $('.gcash').val(1);
            $('.mpin').val(1);
            $('.address').attr('required', '1');
            $('.hnos').attr('required', '1');
            $('.city').attr('required', '1');
            $('.zipcode').attr('required', '1');
            $('.submit-button').hide();
            $('.gcash-button').show();
        }
        if(paymentID == 3){
            $('.cop-container').removeClass('hidden');
            $('.address-container').addClass('hidden');
            $('.shipping').text('0.00');
            $('.appointment').attr('required', '1');
            $('.overall').text(computeOverall());
        }
    });

    $(document).ready(()=>{
        var city = '';
        var shippingFee = 200;

        $('.overall').text(computeOverall());
        storePackage();

        $.getJSON('./location.json', (data)=>{
            $.each(data.province_list, (key, value)=>{
                $.each(value.municipality_list, (key2, value2)=>{
                    city += `<option value="${key2}" data-shipping-fee="${shippingFee.toFixed(2)}">${key2}</option>`;
                    shippingFee += 5;
                })
            })
            $('.city').html($('.city').html() + city);
        })

        $('.city').change(()=>{
            let barangay = '';
            let shippingValue = $('.city>option:selected').attr('data-shipping-fee');

            $('.barangay').html("<option value=''>--Barangay--</option>");
            $('.shipping').html(shippingValue);
            $('.overall').text(computeOverall());
            storePackage();
            
            if($('.city').val() == ''){
                $('.barangay').attr('disabled', true);
                $('.barangay').val('');
            }else{
                $('.barangay').attr('disabled', false);

                $.getJSON('./location.json', (data)=>{
                    $.each(data.province_list, (key, value)=>{
                        $.each(value.municipality_list, (key2, value2)=>{
                            $.each(value2.barangay_list, (key3, value3)=>{
                                if($('.city').val() == key2){
                                    barangay += `<option value="${value3}">${value3}</option>`;
                                }
                            })
                        })
                    })
                    $('.barangay').html($('.barangay').html() + barangay);
                })
            }
        })
    });

    function computeOverall(){
        let overall = parseFloat($('.total').text()) + parseFloat($('.shipping').text());
        return overall.toFixed(2);
    }

    function storePackage(){
        var package = JSON.parse($('.package').val());
        
        package.overall = $('.overall').html();
        package.shipping = $('.shipping').html();

        $('.package').val(JSON.stringify(package));

        console.log(package);
    }
</script>
