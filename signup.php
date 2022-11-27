<!-- ############################################# POST REQUEST ############################################# -->

<?php
    require('./db/connector.php');
    require('./partials/session.php');
    require('./functions/php/index.php');
    require('./functions/php/signup.php');
    require('./functions/php/unset.php');

    if(isset($_POST['submit'])){
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
        }else if(emailExists($email)){
            $error = "Email already exists";
        }else if(!emailExists($email)){
            header('Location: confirmation.php?profile='.$profile.'&profile_temp'.$profile_temp.'&email='.$email.'&firstname='.$firstname.'&lastname='.$lastname.'&gender='.$gender.'&birthdate='.$birthdate.'&password='.md5($password));
        }else{
            $error = $_SESSION['error'];
            sessionUnset2('result', 'error');
        }
    }
?>

<!-- ######################################################################################################## -->

<!DOCTYPE html>
<html lang="en">
<?php include "./partials/header.php";?>
<body class="w-full relative">
    <?php include "./partials/navbar.php";?>
    
    <!-- Customer Signup Form -->
    <section class=" min-h-screen gradient-form pt-40 pb-12">
        <form class="flex items-center justify-center" method="post" enctype="multipart/form-data">
            <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
                <div class="flex justify-center py-4"></div>

                <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Registration Form</h1>
                </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col overflow-hidden border-4 border-dashed h-60 w-60 hover:bg-gray-100 hover:border-green-300 group'>
                            <div class='profile-container flex flex-col items-center justify-center h-full'>
                                <svg class="w-10 h-10  text-gray-400 group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class='lowercase text-sm text-gray-400 group-hover:text-green-400 pt-1 tracking-wider'>Select a photo</p>
                            </div>
                            <input type='file' class="hidden image" accept="image/*" name="profile"/>
                            <img class="profile hidden h=60 w-60" src="" alt="profile-pic">
                        </label>
                    </div>
                </div>
                <label class="uppercase mt-4 text-center md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email*</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="email" placeholder="Enter email" name="email" required/>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">First Name*</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" placeholder="Enter First Name" name="firstname" required/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Last Name*</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" placeholder="Enter Last Name" name="lastname" required/>
                </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender*</label>
                <select class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="gender" required>
                    <option>Male</option>
                    <option>Female</option>
                </select>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Birth Date*</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="date" placeholder="Enter Birth Date" name="birthdate" required/>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Password*</label>
                    <div class="flex relative">
                        <input class="form-control password block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="password" placeholder="Enter Password" name="password" required onkeyup="eyeVisibility(this);"/>
                        <img src="./img/icon/eye-slash-solid.svg" alt="eye" class="eye hidden h-4 w-4 absolute right-0 z-50" style="top: 25%; right: .8em;"  onclick="passwordVisibility(this);">
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Re-enter Password*</label>
                    <div class="flex relative">
                        <input class="form-control password block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="password" placeholder="Re-enter Password" name="reenter" required onkeyup="eyeVisibility(this);"/>
                        <img src="./img/icon/eye-slash-solid.svg" alt="eye" class="eye hidden h-4 w-4 absolute right-0 z-50" style="top: 25%; right: .8em;" onclick="passwordVisibility(this);">
                    </div>
                </div>
    
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="submit" name="submit" class='w-auto bg-gradient-custom hover:opacity-80 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Create</button>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <div class="<?php echo isset($error) ? '' : 'hidden'?> z-50 backdrop-brightness-50 error-modal absolute top-0 left-0 w-full h-full">
            <div class=" bg-white p-4 rounded-md fixed animate-drop top-8 left-1/2 -translate-x-1/2 w-96 flex flex-col items-center">
                <div class="flex justify-center items-center">
                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <img src="./img/icon/triangle-exclamation-solid-red.svg" alt="check" class=" h-4 w-4">
                    </div>
                    <div class=" font-medium capitalize ml-1 text-lg">invalid</div>
                </div>
                
                <div class="text-sm text-gray-500 mt-4"><?php echo isset($error) ? $error : '';?></div>
                <div class=" mt-4 self-end">
                    <button type="button" class="close-error-modal capitalize bg-red-600 text-white font-semibold py-1 px-8 rounded-md">close</button>
                </div>
            </div>
        </div>

        <div class="<?php echo isset($result) ? '' : 'hidden'?> z-50 backdrop-brightness-50 error-modal absolute top-0 left-0 w-full h-full">
            <div class=" bg-white p-4 rounded-md fixed animate-drop top-8 left-1/2 -translate-x-1/2 w-96 flex flex-col items-center">
                <div class="flex justify-center items-center">
                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-200 sm:mx-0 sm:h-10 sm:w-10">
                        <img src="./img/icon/check-solid-green.svg" alt="check" class=" h-4 w-4">
                    </div>
                    <div class=" font-medium capitalize ml-1 text-lg">success</div>
                </div>
                
                <div class="text-sm text-gray-500 mt-4"><?php echo isset($result) ? $result : '';?></div>
                <div class=" mt-4 self-end">
                    <button type="button" class="close-error-modal capitalize bg-green-600 text-white font-semibold py-1 px-8 rounded-md">close</button>
                </div>
            </div>
        </div>
    </section>
    <?php include "./partials/footer.php";?>
</body>
</html>

<!-- ################################################# JQUERY ################################################# -->

<script>
    $('.image').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('.profile-container').addClass('hidden');
            $('.profile').attr('src', event.target.result);
            $('.profile').removeClass('hidden');
          }
          reader.readAsDataURL(file);
        }
    });
    $('.close-error-modal').on('click', ()=>{
        $('.error-modal').addClass('hidden');
    });
    function passwordVisibility(doc){
        let password = doc.parentElement.querySelector('.password');

        if(doc.getAttribute('src').includes('eye-slash')){
            doc.setAttribute('src', './img/icon/eye-solid.svg');
            password.type = 'text';
        }else{
            doc.setAttribute('src', './img/icon/eye-slash-solid.svg');
            password.type = 'password';
        }
    }
    function eyeVisibility(doc){
        let eye = doc.parentElement.querySelector('.eye');
        if(doc.value != ''){
            eye.classList.remove('hidden');
        }else{
            eye.classList.add('hidden');
        }
    }
</script>
