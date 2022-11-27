<?php
    require('./db/connector.php');
    require('./partials/session.php');
    require('./functions/php/index.php');
    require('./functions/php/unset.php');

    unset($_SESSION['result']);
?>
<!DOCTYPE html>
<html lang="en">
<?php include "partials/header.php";?>
<body class="w-full relative">
    <?php include "partials/navbar.php";?>
    <section class=" min-h-screen flex justify-center items-center w-full">
        <div class="font-bold text-2xl rotate-45 w-96 shadow-lg text-center p-4 bg-red-600 text-white rounded-lg">
            Sorry, Your account has been disabled!
        </div>
    </section>
    <?php include "partials/footer.php";?>
</body>
</html>
