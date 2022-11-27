<input type="hidden" name="star" value="0" class="star-equivalent">
<div class="mt-8 flex flex-col items-center">
    <div class="capitalize font-semibold">leave us a review</div>
    <div class="relative">
        <input type="hidden" id="star-selected">
        <div class="absolute z-0 top-1/2 right-1/2 translate-x-1/2 -translate-y-1/2 hover-reset" style="height: 200%; width: 200%;"></div>
        <div class="absolute w-full h-full flex z-20 left-0 top-0">
            <div style="width: 10%;" class="h-full hover-star " data-star="1"></div>
            <div style="width: 10%;" class="h-full hover-star " data-star="2"></div>
            <div style="width: 10%;" class="h-full hover-star " data-star="3"></div>
            <div style="width: 10%;" class="h-full hover-star " data-star="4"></div>
            <div style="width: 10%;" class="h-full hover-star " data-star="5"></div>
            <div style="width: 10%;" class="h-full hover-star " data-star="6"></div>
            <div style="width: 10%;" class="h-full hover-star " data-star="7"></div>
            <div style="width: 10%;" class="h-full hover-star " data-star="8"></div>
            <div style="width: 10%;" class="h-full hover-star " data-star="9"></div>
            <div style="width: 10%;" class="h-full hover-star " data-star="10"></div>
        </div>
        <div>
            <?php include "./partials/stars/star-all.php";?>
        </div>
    </div>
</div>

