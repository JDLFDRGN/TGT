<?php
    require('./partials/session.php');
    require('./db/connector.php');
    require('./functions/php/index.php');
?>

<!DOCTYPE html>
<html lang="en">    
<?php include "partials/header.php";?>

<body class="w-full relative">
    <?php include "partials/navbar.php";?>
    <section class="bg-white overflow-hidden relative z-10 min-h-screen">
        <div class="text-dark mt-40 flex justify-center font-bold text-[32px] sm:text-[40px] lg:text-[36px] xl:text-[40px]"> 
            <div class=" shadow-lg px-8 w-4/5 lg:w-1/3 pb-4 mb-10">
                <h1 class="capitalize text-center">about us</h1>
                <img src="./img/team.jpg" alt="team" class=" w-full mt-10">
                <p class=" text-sm font-normal mt-14">TGT is a simple and affordable furniture product, and all products are made of wood Gemilina, ratan, and native products.</p>
                <p class=" text-sm font-normal mt-4">TGT furniture shop, a mini furniture shop on Magsaysay Avenue, Corner Bañas, General Santos City. The TGT Furniture shop started its business in 2012-2022 and has another branch on Mabuhay Road.</p>
                <p class=" text-sm font-normal mt-4">They offer the best products of good quality, and they also offer customization upon the customer's request. </p>
            </div>
        </div>
    </section>
    <?php include "partials/footer.php";?>
</body>
</html>