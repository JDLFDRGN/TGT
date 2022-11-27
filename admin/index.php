<!-- ############################################# POST REQUEST ############################################# -->

<?php
    require('./../db/connector.php');
    require('./partials/session.php');
    require('./../functions/php/unset.php');
    require('./../functions/php/login.php');

    if(isset($_POST['submit'])){
        $userType = 'admin';
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if(accountExists($userType, $username, $password)){
            $result = $_SESSION['result'];
            $_SESSION['ID'] = $result['ID'];
            sessionUnset2('result', 'error');
            header('Location: ./dashboard.php');
        }else{
            $error = $_SESSION['error'];
            sessionUnset2('result', 'error');
        }
    }
?>

<!-- ######################################################################################################## -->

<!DOCTYPE html>
<html lang="en">
<?php require('./partials/header.php');?>
<title>Login</title>
<body class="w-full relative">

<section class="flex flex-col md:flex-row h-screen items-center">

    <div class="bg-blue-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen relative">
        <img src="./img/card2-furniture.jpg" alt="image" class="w-full h-full object-cover absolute">
        <div class="absolute bg-gradient-to-r from-green-600 to-cyan-500 top-0 left-0 z-50 w-full h-full opacity-40"></div>
    </div>

    <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">

    <div class="w-full h-100 flex flex-col justify-between">
        <div>
            <h1 class="text-xl font-bold">Admin Login</h1>

            <form class="mt-6" method="post">
            <div>
                <label class="block text-gray-700">Username</label>
                <input type="text" name="username" placeholder="Enter Username" class="mt-2 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" autofocus autocomplete required>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" placeholder="Enter Password" minlength="6" class="mt-2 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" required>
            </div>

            <button type="submit" name="submit" class="w-full block bg-gradient-to-r from-red-600 to-pink-500 text-white font-semibold rounded-lg px-4 py-3 mt-6">Log In</button>
            </form>
        </div>
        <p class="text-sm text-gray-500 mt-12">&copy; 2022 TGT - All Rights Reserved.</p>
    </div>

    </div>

         <!-- Modal -->
         <div class="<?php echo isset($error) ? '' : 'hidden'?> z-50 backdrop-brightness-50 error-modal absolute top-0 left-0 w-full h-full">
            <div class=" bg-white p-4 rounded-md fixed animate-drop top-8 left-1/2 -translate-x-1/2 w-96 flex flex-col items-center">
                <div class="flex justify-center items-center">
                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                        </svg>
                    </div>
                    <div class=" font-medium capitalize ml-1 text-lg">invalid</div>
                </div>
                
                <div class="text-sm text-gray-500 mt-4"><?php echo isset($error) ? $error : '';?></div>
                <div class=" mt-4 self-end">
                    <button type="button" class="close-error-modal capitalize bg-red-600 text-white font-semibold py-1 px-8 rounded-md">close</button>
                </div>
            </div>
        </div>

</section>
    <!-- <?php include "partials/footer.php";?> -->
</body>
</html>

<!-- ################################################# JQUERY ################################################# -->

<script>
    $('.close-error-modal').on('click', ()=>{
        $('.error-modal').addClass('hidden');
    });
</script>