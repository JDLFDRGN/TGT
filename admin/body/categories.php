<div class="w-full px-6 py-6 mx-auto min-h-screen">
        <div class="container w-full md:w-4/5 xl:w-full  mx-auto px-2">
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div class="flex justify-between mb-4">
                  <a href="./products.php" class="flex items-center">
                    <h1 class="capitalize font-bold text-lg underline text-orange-500">go to products</h1>
                  </a>
                  <button class=" bg-green-400 hover:bg-green-600 rounded-md px-4 py-1 text-white capitalize font-bold flex items-center justify-between" onclick="showAddModal();">
                    <img src="./img/icon/circle-plus-solid-white.svg" alt="plus" class="h-4 w-4">
                    <span class="capitalize ml-2">add</span>
                  </button>
                </div>
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                  <thead> 
                        <tr>
                            <th data-priority="1">Category</th>
                            <th data-priority="4">Created at</th>
                            <th data-priority="5">Updated at</th>
                            <th data-priority="6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $results = allCategories();
                          foreach($results as $result){
                            echo "<tr>";
                              echo "<td class='text-center'>$result[category]</td>";
                              echo "<td class='text-center'>$result[created_at]</td>";
                              echo "<td class='text-center'>$result[updated_at]</td>";
                              echo "<td>";
                                echo "<div class='flex items-center flex-col'>";
                                  echo "<div>";
                                      echo "<button data-id='$result[ID]' data-category='$result[category]' data-created='$result[created_at]' data-updated='$result[updated_at]' class='flex py-1 px-2 w-20 bg-yellow-400 items-center rounded-xl hover:rounded-full hover:bg-yellow-600 transition-all duration-300 text-white' onclick='showEditModal(this);'>";
                                        echo "<img src='./img/icon/eye-solid-white.svg' alt='edit' class='h-4 w-4'>";
                                        echo "<label class='ml-1 capitalize font-bold'>view</label>";
                                      echo "</button>";
                                  echo "</div>";
                                  echo "<div>";
                                      echo "<button data-id='$result[ID]' class='flex py-1 px-2 w-20 items-center mt-1 bg-red-500 rounded-xl show-delete-modal hover:rounded-full hover:bg-red-600 transition-all duration-300 text-white' onclick='showDeleteModal(this);'>";
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
    <form class="absolute hidden top-0 left-0 w-full h-screen delete-modal" method="post" style="z-index: 1000;" onsubmit="clearForm(this);">
        <div class=" bg-white p-4 rounded-md fixed animate-drop top-8 left-1/2 -translate-x-1/2 w-96 flex flex-col items-center">
            <div class="text-sm text-gray-500 mt-4">Are you sure you want to delete this?</div>
            <div class=" mt-4">
                <button type="button" class="hide-delete-modal bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-8 border border-gray-400 rounded shadow capitalize">no</button>
                <button type="submit" name="delete" class="submit-delete capitalize bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-8 rounded-md">yes</button>
            </div>
            <input type="hidden" name="id" class="delete-customer-id">
        </div>
    </form>

    <form class="absolute hidden top-0 left-0 w-full h-full edit-modal" method="post" enctype="multipart/form-data" style="z-index: 1000;">
        <div class=" h-full w-full">
          <div class=" bg-white w-4/5 md:w-1/2 lg:w-1/3 add-modal-scroll fixed animate-drop top-8 left-1/2 -translate-x-1/2 flex flex-col items-center" style="overflow: auto;">
              <div class="grid rounded-lg shadow-xl w-full">
                <input type="hidden" name="id" class="edit-category-id">
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Category:</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none edit-category" type="text" placeholder="Enter new category" name="category" required/>
                </div>
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" class="hide-edit-modal w-1/4 bg-white flex justify-center hover:bg-gray-100 text-gray-800 font-semibold py-1 px-8 border border-gray-400 rounded shadow capitalize">cancel</button>
                    <button name="edit" class="bg-yellow-400 hover:bg-yellow-600 add w-1/4 flex justify-center rounded-md px-8 py-1 text-white capitalize font-bold">edit</button>
                </div>
            </div>
          </div>
        </div>
    </form>

    <form class="absolute hidden top-0 left-0 w-full h-full add-modal" method="post" enctype="multipart/form-data" style="z-index: 1000;">
        <div class=" h-full w-full">
          <div class=" bg-white w-4/5 md:w-1/2 lg:w-1/3 add-modal-scroll fixed animate-drop top-8 left-1/2 -translate-x-1/2 flex flex-col items-center" style="overflow: auto;">
              <div class="grid rounded-lg shadow-xl w-full">
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Category:</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" placeholder="Enter new category" name="category" required/>
                </div>
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" class="hide-add-modal w-1/4 bg-white flex justify-center hover:bg-gray-100 text-gray-800 font-semibold py-1 px-8 border border-gray-400 rounded shadow capitalize">cancel</button>
                    <button name="add" class="bg-green-400 hover:bg-green-600 add w-1/4 flex justify-center rounded-md px-8 py-1 text-white capitalize font-bold">add</button>
                </div>
            </div>
          </div>
        </div>
    </form>
