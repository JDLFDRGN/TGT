<!-- ############################################# POST REQUEST ############################################# -->
<?php
    require("./partials/session.php");
    require("./db/connector.php");
    require("./functions/php/account.php");
    require("./functions/php/index.php");

    if(isset($_POST['edit'])){
        $id = $_SESSION['result']['ID'];
        $profile = $_FILES['profile']['name'];
        $profile_temp = $_FILES['profile']['tmp_name'];
        $recent_profile = $_POST['recent-profile'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $old_password = $_POST['old'];
        $new_password = $_POST['new'];
        $reenter_password = $_POST['reenter'];

        if(isset($_POST['check-password-change'])){
            $valid = true;
            $oldPasswordValid = checkOldPassword($_SESSION['result']['ID'], md5($old_password));
            if(!$oldPasswordValid){
                $valid = false;
                $error = "Invalid Old Password";
            }else if($new_password != $reenter_password){
                $valid = false;
                $error = "Passwords don't match";
            }
            if($valid){
                if($profile != '')
                    move_uploaded_file($profile_temp, "./img/uploaded/".$profile);

                editAccountWithPassword($id, $profile, $email, $firstname, $lastname, $gender, $birthdate, md5($new_password));
            }
        }else{
            if($profile != '')
                move_uploaded_file($profile_temp, "./img/uploaded/".$profile);
            editAccount($id, $profile, $email, $firstname, $lastname, $gender, $birthdate);
        }
        updateSession($id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include "partials/header.php";?>
<title>Account</title>
<body class="w-full relative">
    <?php include "partials/navbar.php";?>
    <section class=" min-h-screen  pt-40 pb-12">
        <form class="flex items-center justify-center" method="post" enctype="multipart/form-data">
            <input type="hidden" name="recent-profile" class="edit-customer-recent" value="<?php echo $_SESSION['result']['profile'];?>">
            <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
                <div class="flex justify-center py-4"></div>

                <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">My Account</h1>
                </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col overflow-hidden border-4 border-dashed h-60 w-60 hover:bg-gray-100 hover:border-green-300 group'>
                            <div class='profile-container flex flex-col items-center justify-center h-full'>
                                <svg class="w-10 h-10  hidden text-gray-400 group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <input type='file' class="hidden image" accept="image/*" name="profile"/>
                            <img class="profile h=60 w-60" src="./img/uploaded/<?php echo $_SESSION['result']['profile'] != '' ? $_SESSION['result']['profile'] : 'default/no-image-user.png';?>" alt="profile-pic">
                        </label>
                    </div>
                </div>
                <label class="uppercase mt-4 text-center md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email:</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="email" placeholder="Enter email" name="email" value="<?php echo $_SESSION['result']['email'];?>" required/>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">First Name:</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" placeholder="Enter First Name" name="firstname" value="<?php echo $_SESSION['result']['firstname'];?>" required/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Last Name:</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" placeholder="Enter Last Name" name="lastname" value="<?php echo $_SESSION['result']['lastname'];?>" required/>
                </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender:</label>
                <select class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="gender" required>
                    <option <?php echo $_SESSION['result']['gender'] == 'Male' ? 'selected' : '';?>>Male</option>
                    <option <?php echo $_SESSION['result']['gender'] == 'Female' ? 'selected' : '';?>>Female</option>
                </select>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Birth Date:</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="date" placeholder="Enter Birth Date" name="birthdate" value="<?php echo $_SESSION['result']['birthdate'];?>" required/>
                </div>

                <div class="mt-5 mx-7 flex items-center">
                    <input type="checkbox" class="show-change-password" name="check-password-change">
                    <label class="uppercase md:text-sm text-xs text-gray-500 ml-2 text-light font-semibold">Change Password:</label>
                </div>

                <div class="hidden change-password-container">
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Old Password:</label>
                        <div class="flex relative">
                            <input class="form-control password block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="password" placeholder="Enter Old Password" name="old" onkeyup="eyeVisibility(this);"/>
                            <img src="./img/icon/eye-slash-solid.svg" alt="eye" class="eye hidden h-4 w-4 absolute right-0 z-50" style="top: 25%; right: .8em;"  onclick="passwordVisibility(this);">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">New Password:</label>
                        <div class="flex relative">
                            <input class="form-control password block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="password" placeholder="Enter New Password" name="new" onkeyup="eyeVisibility(this);"/>
                            <img src="./img/icon/eye-slash-solid.svg" alt="eye" class="eye hidden h-4 w-4 absolute right-0 z-50" style="top: 25%; right: .8em;"  onclick="passwordVisibility(this);">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Re-enter Password:</label>
                        <div class="flex relative">
                            <input class="form-control password block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="password" placeholder="Re-enter Password" name="reenter" onkeyup="eyeVisibility(this);"/>
                            <img src="./img/icon/eye-slash-solid.svg" alt="eye" class="eye hidden h-4 w-4 absolute right-0 z-50" style="top: 25%; right: .8em;"  onclick="passwordVisibility(this);">
                        </div>
                    </div>
                </div>
                
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="submit" name="edit" class='w-auto bg-gradient-custom hover:opacity-80 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Edit</button>
                </div>
            </div>
        </form>
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
    //Preview Image
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

    //Change Password
    $('.show-change-password').on('click', ()=>{
        if($('.show-change-password').is(':checked')){
            $('.change-password-container').show();
            $('.password').attr('required', 'true');
        }else{
            $('.change-password-container').hide();
            $('.password').removeAttr('required');
        }
    })
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