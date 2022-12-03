<!-- ############################################# POST REQUEST ############################################# -->

<?php
    require('./db/connector.php');
    require('./partials/session.php');
    require('./functions/php/index.php');
    require('./functions/php/signup.php');
    require('./functions/php/unset.php');

    if(isset($_POST['submit'])){
        $profile = $_REQUEST['profile'];
        $profile_temp = $_REQUEST['profile_temp'];
        $email = $_REQUEST['email'];
        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $gender = $_REQUEST['gender'];
        $birthdate = $_REQUEST['birthdate'];
        $password = $_REQUEST['password'];

        insertAccount($profile, $email, $firstname, $lastname, $gender, $birthdate, $password);
        $result = $_SESSION['result'];

        if($profile != '')
            move_uploaded_file($profile_temp, "./img/uploaded/".$profile);
        sessionUnset2('result', 'error');

        header('Location: ./success.php');
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
        <div class="w-full flex justify-center">
            <form method="post" class="otp-form flex flex-col items-center shadow-lg w-fit p-8 rounded-lg">
                <input type="hidden" name="email" class="email" value="<?php echo $_GET['email'];?>">
                <div class="flex flex-col items-center">
                    <h1 class="text-4xl font-semibold">Enter OTP</h1>
                    <h2 class=" font-medium">Please check your email for the OTP</h2>
                </div>
                <div class="mt-4">
                    <input type="OTP" name="otp" maxlength=6 class="otp form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput1" placeholder="Please enter the OTP"/>
                </div>
                <button type="submit" name="submit" class="mt-16 inline-block px-6 py-2.5 text-white bg-gradient-custom font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3">
                    confirm
                </button>
                <div class="timer-container">Expire in <span class="timer">500</span>s</div>
                <div class="resend hidden hover:cursor-pointer">Resend OTP</div>
            </form>
        </div>
    </section>
    <?php include "./partials/footer.php";?>
</body>
</html>

<!-- ################################################# JQUERY ################################################# -->

<script>
    var intervalId = null;
    var varCounter = 500;
    var varName = function(){
        if(varCounter > 0) {
            varCounter--;
            if(varCounter == 0){
                $('.resend').show();
                $('.timer-container').hide();
            }
            $('.timer').html(varCounter);
        } else {
            clearInterval(intervalId);
        }
    };

    $(document).ready(function(){
        intervalId = setInterval(varName, 1000);
        let otp = generateOTP();
        let form = new FormData();
        form.append('email', $('.email').val());
        form.append('otp', otp);

        fetch('./otp.php', {method: 'POST', body: form}).then(res=>res.text()).then(data=>{
            console.log(data);
        })

        $('.resend').on('click',()=>{
            varCounter = 500;
            intervalId = setInterval(varName, 1000);
            otp = generateOTP();
            form.append('email', $('.email').val());
            form.append('otp', otp);

            $('.resend').hide();
            $('.timer-container').show();

            fetch('./otp.php', {method: 'POST', body: form}).then(res=>res.text()).then(data=>{
                console.log(data);
            })
        })

        $('.otp-form').submit(e=>{
            if($('.otp').val() != otp || varCounter == 0){
                alert('Invalid OTP');
                e.preventDefault();
            }
        });
    });

    function generateOTP() {
          var digits = '0123456789';
          let OTP = '';
          for (let i = 0; i < 6; i++ ) {
              OTP += digits[Math.floor(Math.random() * 10)];
          }
          return OTP;
      }
</script>