<?php
    require('./partials/session.php');
    require('./db/connector.php');
    require('./functions/php/cart.php');
    require('./functions/php/index.php');

    if(isset($_GET['id'])){
        $customer_id = $_SESSION['result']['ID'];
        $product_id = $_GET['id'];

        addToCart($customer_id, $product_id);
        header('Location: ./cart.php');
    }

    if(isset($_POST['removetocart'])){
        $cart_id = $_POST['id'];

       deleteProduct($cart_id);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<?php include "partials/header.php";?>
<title>Cart</title>
<body class="w-full relative">
    <?php include "partials/navbar.php";?>
        <section class="min-h-screen mx-auto p-5"> 
            <link rel="stylesheet" href="dist/output.css">
            <div class="flex justify-center my-6  pt-20">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                    <thead>
                    <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell"></th>
                        <th class="text-left">Product</th>
                        <th class="lg:text-right text-left pl-5 lg:pl-0">
                        <span class="lg:hidden" title="Quantity">Qtd</span>
                        <span class="hidden lg:inline">Quantity</span>
                        </th>
                        <th class="hidden text-right md:table-cell">Unit price</th>
                        <th class="text-right">Total price</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            date_default_timezone_set('Asia/Manila');
                            $date = date('Y-m-d');

                            $results = myCart($_SESSION['result']['ID']);

                                foreach($results as $result){
                                    $discount = productDiscount($result['productID'])->fetch_assoc();

                                if(productDiscount($result['productID'])->num_rows > 0 && $date >= $discount['expired_at'])
                                    $price = floatval($result['price']) * (floatval($discount['percentage'])/100);
                                else
                                    $price = floatval($result['price']);

                                $price = number_format((float)$price, 2, '.', '');
                                
                                $imageLocation = $result['product'] != '' ? "$result[product]" : "default/no-image.png";
                                echo "<tr data-id='$result[ID]' data-product-id='$result[productID]' data-product='$result[product]' data-name='$result[name]' data-price='$price'>";
                                    echo "<td class='hidden pb-4 md:table-cell'>";
                                    echo "<a href='#' class='relative img-container'>";
                                        echo "<img src='./img/icon/check-solid-green.svg' alt='selected' class='selected absolute hidden h=8 w-8 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2'>";
                                        echo "<img src='./admin/img/uploaded/$imageLocation' class='w-20 rounded' alt='Thumbnail'>";
                                    echo "</a>";
                                    echo "</td>";
                                    echo "<td>";    
                                    echo "<div>";
                                        echo "<p class='mb-2 md:ml-4'>$result[brand]</p>";
                                        echo "<div>";
                                        echo "<input type='hidden'>";
                                        echo "<div class='text-gray-700 md:ml-4 select-product' name='removetocart'>";
                                            echo "<small class=' text-green-500 hover:cursor-pointer'>Select item</small>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<form action='./cart.php' method='POST'>";    
                                        echo "<input type='hidden' name='id' value='$result[ID]'>";
                                        echo "<button type='submit' class='text-gray-700 md:ml-4' name='removetocart'>";
                                            echo "<small class=' text-red-700'>Remove item</small>";
                                        echo "</button>";
                                        echo "</form>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "<td class='justify-center md:justify-end md:flex mt-6'>";
                                    echo "<div class='w-20 h-10'>";
                                        echo "<div class='relative flex flex-row w-full h-8 shadow-md'>";
                                        echo "<input type='number' value='1' disabled min=0 class='quantity w-full font-semibold text-center text-gray-700 outline-none focus:outline-none hover:text-black focus:text-black' />";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "<td class='hidden text-right md:table-cell'>";
                                    echo "<span class='text-sm lg:text-base font-medium'>";
                                        echo "₱" . "<span class='unit-price'>" . $price . "</span>";
                                    echo "</span>";
                                    echo "</td>";
                                    echo "<td class='text-right'>";
                                    echo "<span class='text-sm lg:text-base font-medium'>";
                                    echo "₱" . "<span class='total-price'>$price</span>";
                                    echo "</span>";
                                    echo "</td>";
                                echo "</tr>"; 
                            }
                        ?>
                    </tbody>
                </table>
                <hr class="pb-6 mt-6">
                <div class="my-4 mt-6 -mx-2 lg:flex">
                    <div class="lg:px-2 lg:w-1/2">
                    <div class="p-4 rounded-full bg-gradient-to-tr from-slate-900 to-slate-700">
                        <h1 class="ml-2 font-bold uppercase text-white">Coupon Code</h1>
                    </div>
                    <div class="p-4">
                        <p class="mb-4 italic">Please enter coupon code in the box if you have to get some discount.</p>
                        <div class="justify-center md:flex">
                        <div>
                            <div class="flex items-center w-full h-13 pl-3 bg-white  border rounded-full shadow-md">
                                <input type="coupon" name="code" autocomplete="off" id="coupon" placeholder="Enter coupon" class="coupon-input w-full outline-none appearance-none focus:outline-none active:outline-none"/>
                                <div class=" w-4/5 px-2 bg-gradient-to-r from-red-600 to-pink-500 text-sm flex items-center justify-between py-1 text-white bg-gray-800 rounded-full outline-none md:px-4 hover:bg-gray-700 focus:outline-none active:outline-none">
                                    <svg aria-hidden="true" data-prefix="fas" data-icon="gift" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z"/></svg>
                                    <span class="font-medium text-center ">Coupon here</span>
                                </div>
                                <?php
                                    $id = $_SESSION['result']['ID'];
                                    $results = myCoupon($id);

                                    date_default_timezone_set('Asia/Manila');
                                    $date = date('Y-m-d');

                                    foreach($results as $result)
                                        echo "<input type='hidden' class='coupon' data-id='$result[ID]' data-code='$result[code]' data-quantity='$result[quantity]' data-percentage='$result[percentage]' data-expiration='$result[expired_at]' data-date-now='$date'>";
                                ?>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="lg:px-2 lg:w-1/2">
                    <div class="p-4 bg-gray-100 rounded-full bg-gradient-to-tr from-slate-900 to-slate-700">
                        <h1 class="ml-2 font-bold uppercase text-white">Order Details</h1>
                    </div>
                    <div class="p-4">
                        <p class="mb-6 italic">Proceed to checkout if your are ready.</p>
                        <div class="flex justify-between border-b">
                            <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                            Subtotal
                            </div>
                            <div class="flex lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                <span>₱</span>
                                <span class='subtotal'>0.00</span>
                            </div>
                        </div>
                            <div class="flex justify-between pt-4 border-b">
                            <div class="flex lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-gray-800">
                                <span>Coupon</span>&nbsp<span class="coupon-name"></span>
                            </div>
                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold flex text-center text-green-700">
                                <span>-₱</span><span class="coupon-total">0.00</span>
                            </div>
                            </div>
                            <div class="flex justify-between pt-4 border-b">
                            <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                Total
                            </div>
                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold flex text-center text-gray-900">
                                <span>₱</span>
                                <span class='grand-total'>0.00</span>
                            </div>
                            </div>
                        <div>
                            <button type="button" class="proceed-checkout bg-gradient-to-r from-green-600 to-cyan-500 flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                            <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/></svg>
                            <span class="ml-2 mt-5px">Procceed to checkout</span>
                            </button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
    <?php include "partials/footer.php";?>
</body>
</html>

<script>
    $(document).ready(()=>{
        convertTwoPlaces();
    });

    $('.quantity').on('change',(e)=>{
        let quantity = e.target.value;
        let row = e.target.parentElement.parentElement.parentElement.parentElement;
        let unitPrice = row.querySelector('.unit-price').innerText;
        let totalPrice = row.querySelector('.total-price');
        let img = row.querySelector('.selected');
        
        if(!img.classList.contains('hidden')){
            totalPrice.innerText = computeTotalPrice(quantity, unitPrice);
            $('.subtotal').text(computeSubtotal());
            $('.grand-total').text(computeNewSubtotal());
        }
    });

    $('.coupon-input').on('keyup',()=>{
        $('.coupon').each((index, element)=>{
            let dateNow = element.getAttribute('data-date-now');
            let dateExpiration = element.getAttribute('data-expiration');

            $('.coupon-name').text($('.coupon-input').val() == '' ? '' : `"${$('.coupon-input').val()}"`);
            if($('.coupon-input').val() == element.getAttribute('data-code') && element.getAttribute('data-quantity') != 0){
                let percentage = parseFloat(element.getAttribute('data-percentage'));
                let subtotal = parseFloat($('.subtotal').text());
                let coupontotal = (percentage/100) * subtotal;
                
                if(dateNow >= dateExpiration){
                    $('.coupon-total').text(`0.00(Expired)`);
                    return false;
                }
                $('.coupon-input').attr('data-id', element.getAttribute('data-id'));
                $('.coupon-total').text(coupontotal.toFixed(2));
                $('.grand-total').text(computeNewSubtotal());
                return false;
            }
            $('.coupon-total').text(`0.00`);
            $('.grand-total').text(computeNewSubtotal());
        })
    });
    $('.select-product').on('click', (e)=>{
        let row = e.target.parentElement.parentElement.parentElement.parentElement.parentElement;
        let quantity = row.querySelector('.quantity');
        let img = row.querySelector('.selected');
        let totalPrice = row.querySelector('.total-price');

        if(e.target.innerText == 'Select item'){
            img.classList.remove('hidden');
            row.classList.add('selected-row');
            row.setAttribute('data-selected', 'true');
            e.target.innerText = 'Deselect item';
            quantity.disabled = false;
        }else{
            img.classList.add('hidden');
            row.classList.remove('selected-row');
            e.target.innerText = 'Select item';
            row.setAttribute('data-selected', 'false');
            quantity.disabled = true;
        }
        $('.subtotal').text(computeSubtotal());
        $('.grand-total').text(computeNewSubtotal());
    });
    $('.proceed-checkout').on('click', ()=>{
        let package = {"data" : [], "subtotal" : $('.subtotal').text(), "couponID" : $('.coupon-input').attr('data-id'), "coupon" : $('.coupon-total').text(), "total" : $('.grand-total').text()};
        let valid = false;
        $('.selected-row').each((index, element)=>{
            let quantity = element.querySelector('.quantity').value;

            if(quantity > 0){
                package.data.push({"cartID" : element.getAttribute('data-id'), "productID" : element.getAttribute('data-product-id'), "productImg" : element.getAttribute('data-product'), "productName" : element.getAttribute('data-name'),  "productQuantity" : quantity, "productPrice" : element.getAttribute('data-price')});
                valid = true;
            }
        })
        if(valid)
            location.href = `checkout.php?package=${JSON.stringify(package)}`;  
    })
    
    function computeTotalPrice(quantity, unitPrice){
        return (quantity * unitPrice).toFixed(2);
    }

    function computeSubtotal(){
        let subtotal = 0;
        $('.total-price').each((index, value)=>{
            let select = value.parentElement.parentElement.parentElement;
            if(select.getAttribute('data-selected') == 'true'){
                subtotal += parseFloat(value.innerText);
            }
        });
        return subtotal.toFixed(2);
    }
    function computeNewSubtotal(){
        let subtotal = computeSubtotal();
        let couponTotal = parseFloat($('.coupon-total').text());

        return (subtotal - couponTotal).toFixed(2);
    }
    function convertTwoPlaces(){
        $('.unit-price').each((index, element)=>{
            element.innerHTML = parseFloat(element.innerHTML).toFixed(2);
        });
    }
</script>