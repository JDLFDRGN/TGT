<?php
    require('./db/connector.php');
    require('./partials/session.php');
    require('./functions/php/index.php');
    require('./functions/php/unset.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include "partials/header.php";?>
<body class="w-full relative">
    <?php include "partials/navbar.php";?>
    <section class=" min-h-screen flex justify-center items-center w-full">
        <div class="font-bold flex items-center flex-col text-2xl w-96 shadow-lg text-center p-4  rounded-lg">
            <img src="./img/icon/check-solid-green.svg" class=" w-40" alt="check">
            Registered Successfully, you can now login to your account.
        </div>
    </section>
    <?php include "partials/footer.php";?>
</body>
</html>
