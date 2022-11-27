<?php include './http/categories.php';?>

<!DOCTYPE html>
<html lang="en">
<?php include './partials/header.php';?>
<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <?php require('./partials/sidenav.php');?>
    <div class="ease-soft-in-out xl:ml-64 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <?php require('./partials/navbar.php');?>
        <?php require('./body/categories.php');?>
        <?php require('./partials/footer.php');?>
    </div>
</body>
</html>

<?php include './functions/js/categories.php';?>

