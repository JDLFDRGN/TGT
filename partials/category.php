<img src="./img/icon/bars-solid.svg" alt="bars" class="h-8 w-8 md:hidden hover:cursor-pointer category-trigger">
<ul class="w-1/2 hidden md:block">
    <div class="flex flex-wrap">
        <li class="bg-slate-900 hover:cursor-pointer hover:bg-pink-500 text-white rounded-md w-24 py-1 font-semibold text-center capitalize mx-1 my-1"><a href="./search.php?category">all items</a></li>
        <?php
            $results = allCategories();
            foreach($results as $result)
                echo "<li class='bg-slate-900 hover:bg-pink-500 hover:cursor-pointer text-white rounded-md w-24 py-1 font-semibold text-center capitalize mx-1 my-1'><a href='./search.php?category=$result[ID]'>$result[category]</a></li>";
        ?>
    </div>
</ul>
<ul class="bg-slate-900 fixed p-2 category-container hidden top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full z-50 ">
<li class="flex justify-end hover:cursor-pointer category-close" ><img src="./img/icon/xmark-solid-white.svg" alt="xmark" class="h-8 w-8"></li>
<li class="bg-slate-900 hover:cursor-pointer w-full hover:bg-pink-500 text-white rounded-md md:w-24 mt-4 py-1 font-semibold text-center capitalize mx-1 my-1"><a href="./search.php?category">all items</a></li>
<?php
    $results = allCategories();
    foreach($results as $result)
        echo "<li class='bg-slate-900 w-full hover:bg-pink-500 hover:cursor-pointer text-white rounded-md md:w-24 py-1 font-semibold text-center capitalize mx-1 my-1'><a href='./search.php?category=$result[ID]'>$result[category]</a></li>";
?>
</ul>

<script>
    $('.category-trigger').on('click',()=>{
        $('.category-container').show();
    })
    $('.category-close').on('click', ()=>{
        $('.category-container').hide();
    })
</script>