    <div class="w-full px-6 py-6 mx-auto min-h-screen">
        <div class="container w-full md:w-4/5 xl:w-full  mx-auto px-2">
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div class="flex justify-between mb-4">
                  <a href="./categories.php" class="flex items-center">
                    <h1 class="capitalize font-bold text-lg underline text-orange-500">go to categories</h1>
                  </a>
                  <button class=" bg-green-400 hover:bg-green-600 rounded-md px-4 py-1 text-white capitalize font-bold flex items-center justify-between" onclick="showAddModal();">
                    <img src="./img/icon/circle-plus-solid-white.svg" alt="plus" class="h-4 w-4">
                    <span class="capitalize ml-2">add</span>
                  </button>
                </div>
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                  <thead> 
                        <tr>
                            <th data-priority="1">Image</th>
                            <th data-priority="2">Name</th>
                            <th data-priority="3">Category</th>
                            <th data-priority="4">Price</th>
                            <th data-priority="5">Created at</th>
                            <th data-priority="6">Updated at</th>
                            <th data-priority="7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $results = allProducts();
                          foreach($results as $result){
                            $imageLocation = $result['product'] != '' ? "$result[product]" : "default/no-image.png";
                            echo "<tr>";
                              echo "<td class='grid place-items-center'><img src='./img/uploaded/$imageLocation' alt='product' class='w-16 h-16'></td>";
                              echo "<td class='text-center'>$result[brand]</td>";
                              echo "<td class='text-center'>$result[category]</td>";
                              echo "<td class='text-center'>$result[price]</td>";
                              echo "<td class='text-center'>$result[created_at]</td>";
                              echo "<td class='text-center'>$result[updated_at]</td>";
                              echo "<td>";
                                echo "<div class='flex flex-col items-center'>";
                                  echo "<div>";
                                      echo "<button data-id='$result[ID]' data-product='$imageLocation' data-brand='$result[brand]' data-category-id='$result[categoryID]' data-category='$result[category]' data-description='$result[description]' data-quantity='$result[quantity]' data-price='$result[price]' data-created='$result[created_at]' data-updated='$result[updated_at]' class='flex py-1 px-2 bg-yellow-400 w-20 rounded-xl items-center hover:rounded-full hover:bg-yellow-600 transition-all duration-300 text-white' onclick='showEditModal(this);'>";
                                        echo "<img src='./img/icon/eye-solid-white.svg' alt='edit' class='h-4 w-4'>";
                                        echo "<label class='ml-1 capitalize font-bold'>view</label>";
                                      echo "</button>";
                                  echo "</div>";
                                  echo "<div>";
                                      echo "<button data-id='$result[ID]' data-product='$result[product]' class='flex py-1 px-2 bg-red-500 items-center rounded-xl show-delete-modal hover:rounded-full hover:bg-red-600 transition-all duration-300 text-white w-20 mt-1' onclick='showDeleteModal(this);'>";
                                        echo "<img src='./img/icon/trash-solid-white.svg' alt='delete' class='h-4 w-4'>";
                                        echo "<label class='ml-1 capitalize font-bold'>delete</label>";
                                    echo "</button>";
                                  echo "</div>";
                                echo "</div>";
                              echo "</td>";
                            echo "</tr>";
                          }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </main>
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

    <form class="absolute hidden top-0 left-0 w-full h-screen delete-modal" method="post" style="z-index: 1000;" onsubmit="clearForm(this);">
        <div class=" bg-white p-4 rounded-md fixed animate-drop top-8 left-1/2 -translate-x-1/2 w-96 flex flex-col items-center">
            <div class="text-sm text-gray-500 mt-4">Are you sure you want to delete this?</div>
            <div class=" mt-4">
                <button type="button" class="hide-delete-modal bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-8 border border-gray-400 rounded shadow capitalize">no</button>
                <button type="submit" name="delete" class="submit-delete capitalize bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-8 rounded-md">yes</button>
            </div>
            <input type="hidden" name="id" class="delete-product-id">
            <input type="hidden" name="product" class="delete-product">
        </div>
    </form>
    
    <form class="absolute hidden top-0 left-0 w-full h-full edit-modal" method="post" enctype="multipart/form-data" style="z-index: 1000;">
        <div class=" h-full w-full">
          <div class=" bg-white w-4/5 md:w-1/2 lg:w-1/3 edit-modal-scroll fixed animate-drop h-4/5 top-8 left-1/2 -translate-x-1/2 flex flex-col items-center" style="overflow: auto;">
              <div class="grid rounded-lg shadow-xl w-full">
                <div class="flex justify-center py-4"></div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col overflow-hidden border-4 border-dashed h-60 w-60 hover:bg-gray-100 hover:border-green-300 group'>
                            <div class='product-container flex flex-col items-center justify-center h-full'>
                                <svg class="w-10 h-10  text-gray-400 group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class='lowercase text-sm text-gray-400 group-hover:text-green-400 pt-1 tracking-wider'>Select a photo</p>
                            </div>
                            <input type="hidden" name="id" class="edit-product-id">
                            <input type="hidden" name="recent-product" class="edit-product-recent">
                            <input type='file' class="hidden image" accept="image/*" name="product"/>
                            <img class="product hidden h=60 w-60" src="" alt="product-pic">
                        </label>
                    </div>
                </div>
                <label class="uppercase mt-4 text-center md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Product Name:</label>
                    <input class="form-control block w-full px-3 edit-product-brand py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="brand" placeholder="Enter brand" name="brand" required/>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Category:</label>
                <select class="form-control edit-product-category block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="category" required>
                    <?php
                      $results = allCategories();
                      foreach($results as $result){
                        echo "<option value='$result[ID]'>$result[category]</option>";
                      }
                    ?>
                </select>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description:</label>
                    <textarea row="40" col="40" class="form-control edit-product-description resize-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Enter Description" name="description"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                  <div class="grid grid-cols-1">
                      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Quantity:</label>
                      <input class="form-control block w-full px-3 edit-product-quantity py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="number" min=0 placeholder="Enter Quantity" name="quantity" required/>
                  </div>
                  <div class="grid grid-cols-1">
                      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Price:</label>
                      <input class="form-control block w-full px-3 py-1.5 edit-product-price text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" placeholder="Enter Price" name="price" required/>
                  </div>
                </div>
                
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" class="hide-edit-modal w-1/4 bg-white flex justify-center hover:bg-gray-100 text-gray-800 font-semibold py-1 px-8 border border-gray-400 rounded shadow capitalize">cancel</button>
                    <button name="edit" class="bg-yellow-400 hover:bg-yellow-600 edit w-1/4 flex justify-center rounded-md px-8 py-1 text-white capitalize font-bold">save</button>
                </div>
            </div>
          </div>
        </div>
    </form>

    <form class="absolute hidden top-0 left-0 w-full h-full add-modal" method="post" enctype="multipart/form-data" style="z-index: 1000;">
        <div class=" h-full w-full">
          <div class=" bg-white w-4/5 md:w-1/2 lg:w-1/3 add-modal-scroll fixed animate-drop h-4/5 top-8 left-1/2 -translate-x-1/2 flex flex-col items-center" style="overflow: auto;">
              <div class="grid rounded-lg shadow-xl w-full">
                <div class="flex justify-center py-4"></div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col overflow-hidden border-4 border-dashed h-60 w-60 hover:bg-gray-100 hover:border-green-300 group'>
                            <div class='product-container flex flex-col items-center justify-center h-full'>
                                <svg class="w-10 h-10  text-gray-400 group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class='lowercase text-sm text-gray-400 group-hover:text-green-400 pt-1 tracking-wider'>Select a photo</p>
                            </div>
                            <input type='file' class="hidden image" accept="image/*" name="product"/>
                            <img class="product hidden h=60 w-60" src="" alt="product-pic">
                        </label>
                    </div>
                </div>
                <label class="uppercase mt-4 text-center md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Product Name:</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="brand" placeholder="Enter brand" name="brand" required/>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Category:</label>
                <select class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="category" required>
                    <?php
                      $results = allCategories();
                      foreach($results as $result)
                        echo "<option value='$result[ID]'>$result[category]</option>";
                    ?>
                </select>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description:</label>
                    <textarea row="40" col="40" class="form-control resize-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Enter Description" name="description"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                  <div class="grid grid-cols-1">
                      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Quantity:</label>
                      <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="number" min=0 placeholder="Enter Quantity" name="quantity" required/>
                  </div>
                  <div class="grid grid-cols-1">
                      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Price:</label>
                      <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" placeholder="Enter Price" name="price" required/>
                  </div>
                </div>
                
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" class="hide-add-modal w-1/4 bg-white flex justify-center hover:bg-gray-100 text-gray-800 font-semibold py-1 px-8 border border-gray-400 rounded shadow capitalize">cancel</button>
                    <button name="add" class="bg-green-400 hover:bg-green-600 add w-1/4 flex justify-center rounded-md px-8 py-1 text-white capitalize font-bold">add</button>
                </div>
            </div>
          </div>
        </div>
    </form>