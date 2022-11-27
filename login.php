<!-- ############################################# POST REQUEST ############################################# -->
<?php
    require('./db/connector.php');
    require('./partials/session.php');
    require('./functions/php/login.php');
    require('./functions/php/index.php');
    require('./functions/php/unset.php');

    if(isset($_POST['submit'])){
        $userType = 'user';
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(accountExists($userType, $email, md5($password))){
            $result = $_SESSION['result'];

            if(accountActivated($result['ID'])){
                header('Location: index.php');
            }else{
                header('Location: deactivated.php');
            }
            
        }else{
            $error = $_SESSION['error'];
            sessionUnset1('error');
        }
    }
?>

<!-- ######################################################################################################## -->

<!DOCTYPE html>
<html lang="en">
<?php include "partials/header.php";?>
<body class="w-full relative">
    <?php include "partials/navbar.php";?>
    
    <!-- Customer Login Form -->
    <section class=" min-h-screen gradient-form">
        <div class="container pt-40 pb-12 px-6 h-full">
            <div class="flex justify-center flex-wrap h-full g-6 text-gray-800">
            <div class="xl:w-10/12">
                <div class="block bg-white shadow-lg rounded-lg">
                <div class="lg:flex lg:flex-wrap g-0">
                    <div class="lg:w-6/12 px-4 md:px-0">
                    <div class="md:p-12 md:mx-6">
                        <div class="text-center">
                        <img
                            class="mx-auto w-40 mb-4"
                            src="./img/logo/logo.png"
                            alt="logo"
                        />
                        </div>
                        <form method="post">
                            <p class="mb-4">Please login to your account</p>
                            <div class="mb-4">
                                <input
                                type="email"
                                name="email"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlInput1"
                                placeholder="Email"
                                />
                            </div>
                            <div class="mb-4">
                                <input
                                type="password"
                                name="password"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlInput1"
                                placeholder="Password"
                                />
                            </div>
                            <div class="text-center pt-1 mb-12 pb-1">
                                <button
                                class="inline-block px-6 py-2.5 text-white bg-gradient-custom font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                                type="submit"
                                name="submit"
                                data-mdb-ripple="true"
                                data-mdb-ripple-color="light"
                                >
                                Log in
                                </button>
                                <a class="text-gray-500" href="#!">Forgot password?</a>
                            </div>
                        </form>
                    </div>
                    </div>
                    <div class="lg:w-6/12 flex items-center bg-gradient-custom lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none">
                    <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                        <h4 class="text-xl font-semibold mb-6">TGT FURNITURE SHOP</h4>
                        <p class="text-sm">
                        Greetings from TGT Furniture Shop! Welcome to our site. Here you will find a showcase of all our products.
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
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
    <?php include "partials/footer.php";?>
</body>
</html>

<!-- ################################################# JQUERY ################################################# -->

<script>
    $('.close-error-modal').on('click', ()=>{
        $('.error-modal').addClass('hidden');
    });
</script>