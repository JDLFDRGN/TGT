<?php
    require('./partials/session.php');
    require('./db/connector.php');
    require('./functions/php/search.php');
    require('./functions/php/index.php');

    if(isset($_REQUEST['category'])){
        $category = $_REQUEST['category'];
        $filter = 'category';
    }
    if(isset($_REQUEST['keyword'])){
        $keyword = $_REQUEST['keyword'];
        $filter = 'search';
    }
    if(isset($_POST['searchSubmit'])){
        $search = $_POST['search'];

        header('Location: ./search.php?keyword=' . $search);
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php include "partials/header.php";?>

<body class="w-full relative">
    <?php include "partials/navbar.php";?>
    <section class="min-h-screen mx-auto p-5">
        <input type="hidden" class="session-checker" data-has-session="<?php echo isset($_SESSION['result']) ? 'true' : 'false';?>">
        <div class="container mx-auto p-5">    
        <div class="mt-20 flex justify-between items-center">
            <?php include './partials/category.php';?>
            <?php include './partials/search.php';?>
        </div>
    
        <div class="grid grid-flow-row mt-16 grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">

            <?php
                date_default_timezone_set('Asia/Manila');
                $date = date('Y-m-d');

                $results = $filter == 'category' ? allProductsWhereCategory($category) : allProductsWhere($keyword);
                foreach($results as $result){
                    $imageLocation = $result['product'] != '' ? "$result[product]" : "default/no-image.png";
                    echo "<div class='shadow-lg rounded-lg flex flex-col justify-between'>";
                        echo "<a href='#'>";
                            echo "<img src='./admin/img/uploaded/$imageLocation' class='rounded-tl-lg rounded-tr-lg' />";
                        echo "</a>";
                        echo "<div class='p-5'>";
                        echo "<h3><a href='#'>$result[brand]</a></h3>";

                        $discount = productDiscount($result['ID'])->fetch_assoc();

                        if(productDiscount($result['ID'])->num_rows > 0 && $date >= $discount['expired_at'])
                            $price = floatval($result['price']) * (floatval($discount['percentage'])/100);
                        else
                            $price = $result['price'];
                        
                        echo "<h5 style='color: #ee4d2d;'>";
                            echo $price == $result['price'] ? "<span>₱<span class='unit-price'>".$price."</span></span>" : "<span class=' line-through text-slate-600'>₱".$result['price']."</span>"."<span class='ml-4'>₱<span class='unit-price'>".$price."</span></span>";
                        echo"</h5>";

                        echo "<h5 class=' text-sm h-36 mt-2 overflow-auto text-slate-600'>$result[description]</h5>";
                        echo "<div class='flex flex-row xl:flex-col justify-between sm:flex-col'>";
                            echo "<div class='w-full sm:w-full bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-2 my-2 text-sm text-white hover:bg-pink-600 hover:from-pink-600 hover:to-pink-600 flex flex-row justify-center items-center hover:cursor-pointer' data-id='$result[ID]' onclick='checkSession(this);'>";
                                echo "<img src='./img/icon/cart-shopping-solid-white.svg' alt='cart' class='h-4 w-4'>";
                                echo "<span class='capitalize ml-1'>add to cart</span>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='flex justify-between items-center mt-2'>";
                            echo "<div class='flex items-center'>";
                            if(rating($result['ID'])->num_rows > 0){
                                $average = floatval(productAverage($result['ID'])['average']);
                                $reviewCount = rating($result['ID'])->num_rows;
                                
                                if($average == 0)
                                    $star = 'star-0.php';
                                else if($average > 0 && $average < 11)
                                    $star = 'star-1h.php';
                                else if($average > 10 && $average < 21)
                                    $star = 'star-1.php';
                                else if($average > 20 && $average < 31)
                                    $star = 'star-1-1h.php';
                                else if($average > 30 && $average < 41)
                                    $star = 'star-2.php';
                                else if($average > 40 && $average < 51)
                                    $star = 'star-2-1h.php';
                                else if($average > 50 && $average < 61)
                                    $star = 'star-3.php';
                                else if($average > 60 && $average < 71)
                                    $star = 'star-3-1h.php';
                                else if($average > 70 && $average < 81)
                                    $star = 'star-4.php';
                                else if($average > 80 && $average < 91)
                                    $star = 'star-4-1h.php';
                                else
                                    $star = 'star-5.php';
                                
                                include './partials/stars/'.$star;
                                echo "<span class='ml-2 text-xs text-slate-600'>$reviewCount reviews</span>";
                            }else{
                                include './partials/stars/star-0.php';
                                echo "<span class='ml-2 text-xs text-slate-600'>No reviews</span>";
                            }
                        echo "</div>";
                        $sold = productSold($result['ID']);
                        echo "<div class='ml-2 text-xs text-slate-600 flex items-center justify-center'>$sold[sold] sold</div>";
                        echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
            ?>

        </div>
        </div> 

        <!-- Modal -->
        <div class="hidden z-50 backdrop-brightness-50 login-modal absolute top-0 left-0 w-full h-full">
            <div class=" bg-white p-4 rounded-md fixed animate-drop login-container left-1/2 -translate-x-1/2 w-96 flex flex-col items-center">
                <div class="flex justify-center items-center">
                    <div class=" font-medium capitalize ml-1 text-lg">Please login to continue</div>
                </div>
                <div class=" mt-4 self-end flex">
                    <button type="button" class="close-login-modal bg-white flex justify-center hover:bg-gray-100 text-gray-800 font-semibold py-1 px-4 border border-gray-400 rounded shadow capitalize">cancel</button>
                    <button type="button" class="ml-2 bg-emerald-400 flex justify-center text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow capitalize" onclick="location.href='./login.php'">login</button>
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
    function checkSession(elem){
        if($('.session-checker').attr('data-has-session') == 'true'){
            id = elem.getAttribute('data-id');
            location.href = `./cart.php?id=${id}`;
            return;
        }
        $('.login-modal').removeClass('hidden');
        $('.login-container').css('top', parseFloat($('html').scrollTop()) + 100);
        $('html').addClass('overflow-hidden');
    }
    
    $('.close-login-modal').on('click', ()=>{
        $('.login-modal').addClass('hidden');
        $('html').removeClass('overflow-hidden');
    })
    function convertTwoPlaces(){
        $('.unit-price').each((index, element)=>{
            element.innerHTML = parseFloat(element.innerHTML).toFixed(2);
        });
    }
</script>
