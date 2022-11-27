<nav class="left-0 top-0 fixed w-full z-40">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl px-4 md:px-6 py-2.5">
            <a href="#" class="flex items-center">
                <img src="./img/logo/logo.png" class="mr-3 h-12 sm:h-14" alt="Flowbite Logo">
                <span class="self-center text-sm sm:text-xl font-semibold whitespace-nowrap dark:text-white">TGT Furniture Shop</span>
            </a>
            <div class="flex items-center">
                <a class="mr-4" href="./cart.php">
                    <img src="./img/icon/cart-shopping-solid.svg" alt="cart" class="h-6 w-6 <?php echo !isset($_SESSION['result']) ? 'hidden' : '';?>">
                </a>
                <a class="mr-4" href="./order.php">
                    <img src="./img/icon/order-solid.svg" alt="cart" class="h-6 w-6 <?php echo !isset($_SESSION['result']) ? 'hidden' : '';?>">
                </a>
                <div class="mr-4 show-notification relative">
                    <img src="./img/icon/bell-solid.svg" alt="cart" class="h-6 w-6 hover:cursor-pointer <?php echo !isset($_SESSION['result']) ? 'hidden' : '';?>">
                    <div data-show='0' class=" bg-white py-4 shadow-lg w-80 hidden notification-modal rounded-md h-60 overflow-auto fixed top-16 right-16 flex-col items-center p-2">
                        <?php
                            date_default_timezone_set('Asia/Manila');
                            $date = date('m-d-Y h:ia');

                            $results = myNotification($_SESSION['result']['ID']);
                            foreach($results as $result){
                                echo "<div class='flex mb-4'>";
                                    echo "<img src='./img/icon/ticket-solid-pink.svg' alt='none' class='w-20 h-20'>";
                                    echo "<div class='ml-2'>";
                                        echo "<div class='flex justify-end text-sm'>$result[created_at]</div>";
                                        echo "<div class='font-bold capitalize'>$result[title]</div>";
                                        echo "<div class=' text-sm'>$result[message]</div>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        ?>
                        <div class="<?php echo $results->num_rows > 0 ? 'hidden' : '';?> capitalize font-semibold text-xl text-center">no notification available</div>
                    </div>
                </div>
                <div class="<?php echo !isset($_SESSION['result']) ? 'hidden' : '';?> show-account-details hover:cursor-pointer rounded-full w-10 h-10 overflow-hidden">
                    <img src="./img/uploaded/<?php echo $_SESSION['result']['profile'] != '' ? $_SESSION['result']['profile'] : 'default/no-image-user.png';?>" alt="user" class=" w-10 h-10">
                    <div data-show='0' class=" bg-white py-4 shadow-lg hidden account-modal rounded-md fixed top-16 right-2 w-fit flex-col items-center">
                        <div class="px-16 flex flex-col justify-center items-center">
                            <div class="text-sm text-gray-500 mt-4 w-28 h-28 rounded-full overflow-hidden mx-auto">
                                <img src="./img/uploaded/<?php echo $_SESSION['result']['profile'] != '' ? $_SESSION['result']['profile'] : 'default/no-image-user.png';?>"" alt="user" class=" w-28 h-28">
                            </div>
                            <div class="mt-2 flex-col items-center text-center">
                                <div>Signed in as:</div>
                                <div class="font-semi-bold text-xl capitalize"><?php echo $_SESSION['result']['firstname'] . ' ' . $_SESSION['result']['lastname']?></div>
                            </div>
                            <ul class="mt-8 w-32 flex justify-center flex-col">
                                <li class="flex items-center justify-center border-b-2 px-2 shadow-md py-1">
                                    <a href="./account.php" class="capitalize flex items-center justify-between w-4/5">
                                        <img src="./img/icon/user-gear-solid.svg" alt="logout" class="h-4 w-4">
                                        <span class="capitalize ml-2">account</span>
                                    </a>
                                </li>    
                                <li class="flex items-center justify-center mt-1 border-b-2 px-2 shadow-md py-1">
                                    <a href="./partials/logout.php" class="capitalize flex items-center justify-between w-4/5">
                                        <img src="./img/icon/right-from-bracket-solid.svg" alt="logout" class="h-4 w-4">
                                        <span class="capitalize ml-2">sign out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="<?php echo isset($_SESSION['result']) ? 'hidden' : '';?>">
                <div class="flex items-center">
                    <a href="./signup.php" class="text-xs sm:text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">Sign Up</a>
                    &nbsp &nbsp
                    <a href="./login.php" class=" text-xs sm:text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">Log In</a>
                </div>
            </div>
            </div>
        </div>
    </nav>
    <nav class="bg-gray-50 dark:bg-gray-700">
        <div class="py-3 px-4 mx-auto max-w-screen-xl md:px-6">
            <div class="flex items-center">
                <ul class="flex flex-row mt-0 mr-6 space-x-8 text-sm font-medium">
                    <li>
                        <a href="./index.php" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="./contact.php" class="text-gray-900 dark:text-white hover:underline">Contact</a>
                    </li>
                    <li>
                        <a href="./about.php" class="text-gray-900 dark:text-white hover:underline">About</a>
                    </li>
                    <!-- <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline">Inquiries</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>  
</nav>

 <!-- Modal -->
 <!-- <form class="absolute hidden top-0 left-0 w-full bg-black h-screen account-modal" method="post" style="z-index: 1000;" onsubmit="clearForm(this);">

</form> -->

<script>
    $('.show-account-details').on('click', ()=>{
        let state = $('.account-modal').attr('data-show');
      
        if(state == '0'){
            $('.account-modal').show();
            $('.notification-modal').hide();
            $('.account-modal').attr('data-show', '1');
            $('.notification-modal').attr('data-show', '0');
        }else{
            $('.account-modal').hide();
            $('.account-modal').attr('data-show', '0');
        }
    });
    $('.show-notification').on('click', (e)=>{
        let state = $('.notification-modal').attr('data-show');
            
        if(state == '0'){
            $('.notification-modal').show();
            $('.account-modal').hide();
            $('.notification-modal').attr('data-show', '1');
            $('.account-modal').attr('data-show', '0');
        }else{
            $('.notification-modal').hide();
            $('.notification-modal').attr('data-show', '0');
        }
    })
</script>