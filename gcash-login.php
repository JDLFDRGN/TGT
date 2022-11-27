<?php
    if(isset($_POST['submit'])){
        $number = $_POST['number'];

        if(strlen($number) != 10 || !is_numeric($number))
            $error = "Please enter a valid number";
        else
            header('Location: ./order.php');
             
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include "partials/header.php";?>
<body>
    <section class=" min-h-screen relative">
        <div class="bg-blue-700 h-80 flex justify-center pt-4">
            <div class="flex justify-center items-center w-fit h-fit">
                <img src="img/gcash.png" alt="gcash" class=" h-20">
                <span class="text-white font-semibold text-5xl ml-2">GCash</span>
            </div>
        </div>
        <form method="post" class="absolute bg-white w-4/5 sm:w-3/5 lg:w-2/5 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-4 rounded-lg shadow-xl">
            <div>
                <div class="flex w-3/5 justify-between">
                    <div class="capitalize text-slate-400 w-1/2">merchant</div>
                    <div class=" w-1/2">
                        <div class="capitalize text-slate-700">TGT</div>
                    </div>
                </div>
                <div class="flex w-3/5 justify-between mt-2">
                    <div class="capitalize text-slate-400">amount due</div>
                    <div class=" w-1/2">
                        <div class="uppercase font-bold text-cyan-400">php 1000.00</div>
                    </div>
                </div>
            </div>
            <div class=" text-center my-4">
                <div class=" font-bold text-2xl">Login to pay with GCash</div>
                <div class="flex items-center border-b-2 border-slate-400">
                    <div class=" text-slate-600 text-2xl">+63</div>
                    <input type="text" name="number" required maxlength="10" class="text-2xl h-1/2 w-11/12 border-none focus:outline-none focus:ring-0">
                </div>
            </div>
            <div class=" mt-8 mb-4 flex flex-col justify-center items-center">
                <input type="submit" name="submit" value="Next" class=" bg-blue-500 text-white rounded-full w-full py-4 text-2xl hover:cursor-pointer">
                <a href="https://www.gcash.com/" class=" text-blue-500 mt-8">Create an account</a>
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
</body>
</html>

<script>
    $('.close-error-modal').on('click', ()=>{
        $('.error-modal').addClass('hidden');
    });
</script>