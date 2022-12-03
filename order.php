<!-- ############################################# POST REQUEST ############################################# -->
<?php
    require('./db/connector.php');
    require('./partials/session.php');
    require('./functions/php/order.php');
    require('./functions/php/index.php');

    if(isset($_POST['submit'])){
        $orderID = $_POST['orderID'];
        $productID = $_POST['productID'];
        $star = $_POST['star'];
        $recommendation = $_POST['recommendation'];

        addRating($orderID, $_SESSION['result']['ID'], $productID, $star, $recommendation);
    }
    if(isset($_GET['delete-order'])){
        $id = $_GET['id'];

        deleteOrder($id);
        header('Location: ./order.php');
    }
?>

<!-- ######################################################################################################## -->

<!DOCTYPE html>
<html lang="en">
<?php include "partials/header.php";?>
<title>Log In</title>
<body class="w-full relative">
    <?php include "partials/navbar.php";?>
    <section class=" min-h-screen p-4">
        <?php
            $number = 0;
            $results = myOrder($_SESSION['result']['ID']);
            foreach($results as $result){
                
                if($result['status'] == 'New' || $result['status'] == 'Cancelled')
                    $percentage = '0';
                else if($result['status'] == 'Processing')
                    $percentage = '25';
                else if($result['status'] == 'In Transit')
                    $percentage = '50';
                else if($result['status'] == 'Out For Delivery')
                    $percentage = '75';
                else
                    $percentage = '100';        

                $number++;
                echo "<div class='mt-40 rounded-md shadow-md flex flex-wrap relative'>";
                    if($percentage == '100'){
                        echo "<a href='./order.php?delete-order=true&id=$result[ID]'><img src='./img/icon/xmark-solid.svg' alt='img' class='hover:cursor-pointer h-6 w-6 absolute right-4 top-4'></a>";
                    }    
                    echo "<div class='p-4 w-full md:w-3/5 xl:w-1/3'>";
                        echo "<h1 class='font-bold capitalize text-2xl mb-2'>Order #$number</h1>";

                        $json = json_decode($result['package']);
                        $datas = $json->data;
                        $subtotal = $json->subtotal;
                        $coupon = $json->coupon;
                        $total = $json->total;
                        $shipping = $json->shipping;

                        $cancelled = $result['status'] == 'New' || $result['status'] == 'Processing' ? '' : 'hidden';
                        $received = $result['status'] == 'Out For Delivery' ? '' : 'hidden';

                        foreach($datas as $data){
                            $row = (array)$data;
                            $imageLocation = $row['productImg'] != '' ? "$row[productImg]" : "default/no-image.png";

                            echo "<div class='flex p-2 rounded-md shadow-md mt-2 bg-gradient-to-tr from-slate-900 to-slate-700 relative'>";
                                echo "<div class='w-60 h-36 overflow-hidden'>";
                                    echo "<img src='./admin/img/uploaded/$imageLocation' alt='img' class=' w-60 h-36 object-fill'>";
                                echo "</div>";
                                echo "<div class='ml-4 pt-2'>";
                                    $exists = ratingExists($result['ID'], $_SESSION['result']['ID'], $row['productID']);

                                    if($percentage == '100' && !$exists)
                                        echo "<img src='./img/icon/comment-dots-solid-yellow.svg' alt='img' data-id='$row[productID]' data-order='$result[ID]' class='open-review-modal hover:cursor-pointer h-4 w-4 absolute right-2 top-2'>";

                                    echo "<div class='capitalize text-white font-bold'>$row[productName]</div>";
                                    echo "<div class='capitalize text-white'>price: $row[productPrice]</div>";
                                    echo "<div class='capitalize text-white'>quantity: $row[productQuantity]</div>";
                                echo "</div>";
                            echo "</div>";
                        }
                        
                    echo "</div>";
                    echo "<div class='p-2 mt-14 w-full md:w-2/5 xl:w-1/5'>";
                        echo "<h1 class='capitalize font-bold text-xl'>customer information</h1>";
                        echo "<div class='capitalize mt-1 text-slate-700'>name: $result[firstname] $result[lastname]</div>";
                        echo "<div class='mt-1 text-slate-700'>Email: $result[email]</div>";
                        echo "<div class='capitalize mt-1 text-slate-700'>number: $result[number]</div>";
                        echo "<div class='capitalize mt-1 text-slate-700'>address: $result[address]</div>";
                    echo "</div>";
                    echo "<div class='p-2 mt-14 w-full md:w-1/2 xl:w-1/5 flex xl:justify-center'>";
                        echo "<div class='w-fit computation'>";
                            echo "<h1 class='capitalize font-bold text-xl'>computation</h1>";
                            echo "<div class='flex justify-between capitalize mt-1 text-sm text-slate-700'>pay via: <span class='payment'>$result[payment]</span></div>";
                            echo "<div class='flex justify-between capitalize mt-1 text-sm text-slate-700'>subtotal: <span>₱<span class='subtotal'>$subtotal</span></span></div>";
                            echo "<div class='flex justify-between capitalize mt-1 text-sm text-slate-700'>coupon: <span>₱<span class='coupon'>$coupon</span></span></div>";
                            echo "<div class='flex justify-between capitalize mt-1 text-sm text-slate-700'>total: <span>₱<span class='total'>$total</span></span></div>";
                            echo "<div class='flex justify-between capitalize mt-1 text-sm text-slate-700'>shipping: <span>₱<span class='shipping'>$shipping</span></span></div>";
                            echo "<div class='flex justify-between capitalize mt-1 text-base text-slate-800'>overall: <span>₱<span class='overall'>0.00</span></span></div>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='p-2 mt-14 w-full md:w-1/2 xl:w-1/4 h-60'>";
                        echo "<h1 class='capitalize font-bold text-xl'>order status</h1>";
                        echo "<div class='grid place-items-center h-full xl:h-1/2'>";
                            include "./progress.php";
                        echo "</div>";
                        echo "<div class='$received received-order text-center mt-8 hover:cursor-pointer capitalize font-semibold text-green-500' onclick='receivedOrder($result[ID]);'>received order</div>";
                        echo "<div class='$cancelled cancel-order text-center mt-8 hover:cursor-pointer capitalize font-semibold text-red-600' onclick='cancelOrder($result[ID]);'>cancel order</div>";
                    echo "</div>";
                echo "</div>";
            }    
        ?>
        <!-- Modal -->
        
        <div class="z-50 hidden review-modal backdrop-brightness-50 error-modal absolute top-0 left-0 w-full h-full">
            <div class=" bg-white p-4 rounded-md fixed animate-drop top-8 left-1/2 -translate-x-1/2 w-96 flex flex-col items-center">
                <form method="post" class="grid place-items-center h-full xl:h-1/2 relative w-full">
                    <input type="hidden" name="productID" class="product-id">
                    <input type="hidden" name="orderID" class="order-id">
                    <img src="./img/icon/xmark-solid.svg" alt="xmark" class="close-review-modal w-4 h-4 absolute right-2 top-2 hover:cursor-pointer">
                    <?php
                        include "./partials/feedback.php";
                        include "./partials/recommendation.php";
                    ?>
                    <input type="submit" name="submit" value="Submit" class="hover:cursor-pointer mt-16 inline-block px-6 py-2.5 text-white bg-gradient-custom font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3">
                </form>
            </div>
        </div>
    </section>
    <?php include "partials/footer.php";?>
</body>
</html>

<!-- ################################################# JQUERY ################################################# -->

<script>
    $(document).ready(()=>{
        $('.computation').each((index, element)=>{
            let total = element.querySelector('.total');
            let shipping = element.querySelector('.shipping');
            let overall = element.querySelector('.overall');
            let payment = element.querySelector('.payment');

            if(payment.innerHTML == 'cop')
                shipping.innerHTML = '0.00';

            overall.innerHTML = parseFloat(total.innerHTML) + parseFloat(shipping.innerHTML);
        });
    });
    $('.hover').ready(()=>{
        $('.star-container:not(.star-0)').hide();
    });
    $('.hover-star').hover((e)=>{
        if($('#star-selected').val() == 'selected') 
            return false;

        let star = e.target.getAttribute('data-star');

        if(star > 0 && star < 11){
            $(`.star-container:not(.star-${star})`).hide();
            $(`.star-${star}`).show();
        }
    });
    $('.hover-star').on('click', (e)=>{
        let star = e.target.getAttribute('data-star');
        
        $('#star-selected').val('selected');

        if(star == 1)
            star = 10;
        else if(star == 2)
            star = 20;
        else if(star == 3)
            star = 30;
        else if(star == 4)
            star = 40;
        else if(star == 5)
            star = 50;
        else if(star == 6)
            star = 60;
        else if(star == 7)
            star = 70;
        else if(star == 8)
            star = 80;
        else if(star == 9)
            star = 90;
        else if(star == 10)
            star = 100;
        else
            star = '0';

        $('.star-equivalent').val(star);
    });
    $('.hover-reset').hover(()=>{
        if($('#star-selected').val() == 'selected') 
            return false;
        $(`.star-container:not(.star-0)`).hide();
        $('.star-0').show();
    });
    $('.open-review-modal').on('click', (e)=>{
        $('.review-modal').show();

        $('.review-modal').css('top', $('html').scrollTop());
        $('html').addClass('overflow-hidden');

        $('.product-id').val(e.target.getAttribute('data-id'));
        $('.order-id').val(e.target.getAttribute('data-order'));
    });
    $('.close-review-modal').on('click',()=>{
        $('.review-modal').hide();
        $('html').removeClass('overflow-hidden');
    });

    function cancelOrder(id){
        let form = new FormData();
        form.append('ID', id);
        
        fetch('./cancel-order.php', {method: 'post', body: form}).then(res=>res.text()).then(data=>{
            location.reload();
        })
    }
    
    function receivedOrder(id){
        let form = new FormData();
        form.append('ID', id);
        
        fetch('./received-order.php', {method: 'post', body: form}).then(res=>res.text()).then(data=>{
            location.reload();
        })
    }

</script>