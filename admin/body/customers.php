    <div class="w-full px-6 py-6 mx-auto min-h-screen">
        <div class="container w-full md:w-4/5 xl:w-full  mx-auto px-2">
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div class="flex justify-end mb-4">
                  <!-- <button class=" bg-green-400 hover:bg-green-600 rounded-md px-4 py-1 text-white capitalize font-bold flex items-center justify-between" onclick="showAddModal();">
                    <img src="./img/icon/circle-plus-solid-white.svg" alt="plus" class="h-4 w-4">
                    <span class="capitalize ml-2">add</span>
                  </button> -->
                </div>
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                  <thead> 
                        <tr>
                            <th data-priority="1">Image</th>
                            <th data-priority="2">Firstname</th>
                            <th data-priority="3">Lastname</th>
                            <th data-priority="4">Created at</th>
                            <th data-priority="5">Updated at</th>
                            <th data-priority="6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $results = allCustomers();
                          foreach($results as $result){
                            $imageLocation = $result['profile'] != '' ? "$result[profile]" : "default/no-image-user.png";
                            $status = checkCustomerStatus($result['ID']);
                            if($status == 1){
                                $img = 'toggle-on';
                                $txt = 'deactivate';
                                $color = 'green';
                            }else{
                                $img = 'toggle-off';
                                $txt = 'activate';
                                $color = 'red';
                            }
                            echo "<tr>";
                              echo "<td class='grid place-items-center'><img src='./../img/uploaded/$imageLocation' alt='profile' class='w-16 h-16'></td>";
                              echo "<td class='text-center'>$result[firstname]</td>";
                              echo "<td class='text-center'>$result[lastname]</td>";
                              echo "<td class='text-center'>$result[created_at]</td>";
                              echo "<td class='text-center'>$result[updated_at]</td>";
                              echo "<td>";
                                echo "<div class='flex flex-col items-center'>";
                                    echo "<div class='w-full flex justify-center'>";
                                        echo "<button data-id='$result[ID]' data-profile='$imageLocation' data-email='$result[email]' data-firstname='$result[firstname]' data-lastname='$result[lastname]' data-gender='$result[gender]' data-birthdate='$result[birthdate]' data-password='$result[password]' data-created='$result[created_at]' data-updated='$result[updated_at]' class='flex py-1 px-2 w-9/12 bg-yellow-400 items-center rounded-xl hover:rounded-full hover:bg-yellow-600 transition-all duration-300 text-white' onclick='showEditModal(this);'>";
                                        echo "<img src='./img/icon/eye-solid-white.svg' alt='edit' class='h-4 w-4'>";
                                        echo "<label class='ml-1 capitalize font-bold'>view</label>";  
                                        echo "</button>";
                                    echo "</div>";
                                  echo "<div class='w-full flex justify-center mt-1'>";
                                      echo "<button data-id='$result[ID]' class='flex py-1 px-2 w-9/12 bg-$color-400 items-center rounded-xl hover:rounded-full hover:bg-$color-600 transition-all duration-300 text-white' onclick='showActivateModal(this);'>";
                                        echo "<img src='./img/icon/$img-solid-white.svg' alt='edit' class='h-4 w-4'>";
                                        echo "<label class='ml-1 capitalize font-bold'>$txt</label>";  
                                      echo "</button>";
                                  echo "</div>";
                                //   echo "<div class='w-full flex justify-center'>";
                                //       echo "<button data-id='$result[ID]' data-profile='$result[profile]' class='flex py-1 px-2 w-9/12 items-center mt-1 bg-red-500 rounded-xl show-delete-modal hover:rounded-full hover:bg-red-600 transition-all duration-300 text-white' onclick='showDeleteModal(this);'>";
                                //         echo "<img src='./img/icon/trash-solid-white.svg' alt='delete' class='h-4 w-4'>";
                                //         echo "<label class='ml-1 capitalize font-bold'>deactivate</label>";    
                                //       echo "</button>";
                                //   echo "</div>";
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
    <!-- <div class="<?php echo isset($error) ? '' : 'hidden'?> error-modal absolute top-0 left-0 w-full h-full" style="z-index: 100;">
        <div class=" bg-white p-4 rounded-md fixed animate-drop top-8 left-1/2 -translate-x-1/2 w-96 flex flex-col items-center">
            <div class="flex justify-center items-center">
                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <img src="./../img/icon/triangle-exclamation-solid-red.svg" alt="check" class=" h-4 w-4">
                </div>
                <div class=" font-medium capitalize ml-1 text-lg">invalid</div>
            </div>
                
            <div class="text-sm text-gray-500 mt-4"><?php echo isset($error) ? $error : '';?></div>
            <div class=" mt-4 self-end">
                <button type="button" class="close-error-modal capitalize bg-red-600 text-white font-semibold py-1 px-8 rounded-md">close</button>
            </div>
        </div>
    </div> -->

    <!-- <form class="absolute hidden top-0 left-0 w-full h-screen delete-modal" method="post" style="z-index: 1000;" onsubmit="clearForm(this);">
        <div class=" bg-white p-4 rounded-md fixed animate-drop top-8 left-1/2 -translate-x-1/2 w-96 flex flex-col items-center">
            <div class="text-sm text-gray-500 mt-4">Are you sure you want to delete this?</div>
            <div class=" mt-4">
                <button type="button" class="hide-delete-modal bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-8 border border-gray-400 rounded shadow capitalize">no</button>
                <button type="submit" name="delete" class="submit-delete capitalize bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-8 rounded-md">yes</button>
            </div>
            <input type="hidden" name="id" class="delete-customer-id">
            <input type="hidden" name="profile" class="delete-customer-profile">
        </div>
    </form> -->

    <form class="absolute hidden top-0 left-0 w-full h-screen activate-modal" method="post" style="z-index: 1000;" onsubmit="clearForm(this);">
        <div class=" bg-white p-4 rounded-md fixed animate-drop top-8 left-1/2 -translate-x-1/2 w-96 flex flex-col items-center">
            <div class="text-sm text-gray-500 mt-4">Are you sure you want to activate this account?</div>
            <div class=" mt-4">
                <button type="button" class="hide-activate-modal bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-8 border border-gray-400 rounded shadow capitalize">no</button>
                <button type="submit" name="activate" class="submit-delete capitalize bg-green-600 hover:bg-green-700 text-white font-semibold py-1 px-8 rounded-md">yes</button>
            </div>
            <input type="hidden" name="id" class="activate-customer-id">
        </div>
    </form>

    <form class="absolute hidden top-0 left-0 w-full h-full edit-modal" method="post" enctype="multipart/form-data" style="z-index: 1000;">
        <div class=" h-full w-full">
          <div class="bg-white fixed animate-drop w-4/5 md:w-1/2 lg:w-1/3 edit-modal-scroll h-4/5 top-8 left-1/2 -translate-x-1/2 flex flex-col items-center" style="overflow: auto;">
              <div class="grid rounded-lg shadow-xl w-full">
                <div class="flex justify-center py-4"></div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col overflow-hidden border-4 border-dashed h-60 w-60 hover:bg-gray-100 hover:border-green-300 group'>
                            <div class='profile-container flex flex-col items-center justify-center h-full'>
                                <svg class="w-10 h-10  text-gray-400 group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class='lowercase text-sm text-gray-400 group-hover:text-green-400 pt-1 tracking-wider'>Select a photo</p>
                            </div>
                            <input type="hidden" name="id" class="edit-customer-id">
                            <input type="hidden" name="recent-profile" class="edit-customer-recent">
                            <input type='file' class="edit-customer-profile hidden image" accept="image/*" name="profile"/>
                            <img class="profile hidden h=60 w-60" src="" alt="profile-pic">
                        </label>
                    </div>
                </div>
                <label class="uppercase mt-4 text-center md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email:</label>
                    <input readonly class="edit-customer-email form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="email" placeholder="Enter email" name="email" required/>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">First Name:</label>
                    <input readonly class="edit-customer-firstname form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" placeholder="Enter First Name" name="firstname" required/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Last Name:</label>
                    <input readonly class="edit-customer-lastname form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" placeholder="Enter Last Name" name="lastname" required/>
                </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender:</label>
                <select disabled class="edit-customer-gender form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="gender" required>
                    <option>Male</option>
                    <option>Female</option>
                </select>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Birth Date:</label>
                    <input readonly class="edit-customer-birthdate form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="date" placeholder="Enter Birth Date" name="birthdate" required/>
                </div>

                <!-- <div class="mt-5 mx-7 flex items-center">
                    <input type="checkbox" class="show-change-password" name="check-password-change">
                    <label class="uppercase md:text-sm text-xs text-gray-500 ml-2 text-light font-semibold">Change Password:</label>
                </div> -->

                <div class="hidden change-password-container">
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Old Password:</label>
                        <div class="flex relative">
                            <input class="form-control password block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="password" placeholder="Enter Old Password" name="old" onkeyup="eyeVisibility(this);"/>
                            <img src="./../img/icon/eye-slash-solid.svg" alt="eye" class="eye hidden h-4 w-4 absolute right-0 z-50" style="top: 25%; right: .8em;"  onclick="passwordVisibility(this);">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">New Password:</label>
                        <div class="flex relative">
                            <input class="form-control password block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="password" placeholder="Enter New Password" name="new" onkeyup="eyeVisibility(this);"/>
                            <img src="./../img/icon/eye-slash-solid.svg" alt="eye" class="eye hidden h-4 w-4 absolute right-0 z-50" style="top: 25%; right: .8em;"  onclick="passwordVisibility(this);">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Re-enter Password:</label>
                        <div class="flex relative">
                            <input class="form-control password block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="password" placeholder="Re-enter Password" name="reenter" onkeyup="eyeVisibility(this);"/>
                            <img src="./../img/icon/eye-slash-solid.svg" alt="eye" class="eye hidden h-4 w-4 absolute right-0 z-50" style="top: 25%; right: .8em;"  onclick="passwordVisibility(this);">
                        </div>
                    </div>
                </div>
    
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" class="hide-edit-modal bg-white w-1/4 flex justify-center hover:bg-gray-100 text-gray-800 font-semibold py-1 px-8 border border-gray-400 rounded shadow capitalize">close</button>
                    <!-- <button type="submit" name="edit" class="submit-edit w-1/4 flex justify-center capitalize bg-yellow-500 hover:bg-yellow-700 text-white font-semibold py-1 px-8 rounded-md">update</button> -->
                </div>
            </div>
          </div>
        </div>
    </form>

    <!-- <form class="absolute hidden top-0 left-0 w-full h-full add-modal" method="post" enctype="multipart/form-data" style="z-index: 1000;">
        <div class=" h-full w-full">
          <div class=" bg-white w-4/5 md:w-1/2 lg:w-1/3 add-modal-scroll fixed animate-drop h-4/5 top-8 left-1/2 -translate-x-1/2 flex flex-col items-center" style="overflow: auto;">
              <div class="grid rounded-lg shadow-xl w-full">
                <div class="flex justify-center py-4"></div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col overflow-hidden border-4 border-dashed h-60 w-60 hover:bg-gray-100 hover:border-green-300 group'>
                            <div class='profile-container flex flex-col items-center justify-center h-full'>
                                <svg class="w-10 h-10  text-gray-400 group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class='lowercase text-sm text-gray-400 group-hover:text-green-400 pt-1 tracking-wider'>Select a photo</p>
                            </div>
                            <input type='file' class="hidden image" accept="image/*" name="profile"/>
                            <img class="profile hidden h=60 w-60" src="" alt="profile-pic">
                        </label>
                    </div>
                </div>
                <label class="uppercase mt-4 text-center md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email:</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="email" placeholder="Enter email" name="email" required/>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">First Name:</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" placeholder="Enter First Name" name="firstname" required/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Last Name:</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" placeholder="Enter Last Name" name="lastname" required/>
                </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender:</label>
                <select class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="gender" required>
                    <option>Male</option>
                    <option>Female</option>
                </select>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Birth Date:</label>
                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="date" placeholder="Enter Birth Date" name="birthdate" required/>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Password:</label>
                    <div class="flex relative">
                        <input class="form-control password block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="password" placeholder="Enter Password" name="password" required onkeyup="eyeVisibility(this);"/>
                        <img src="./../img/icon/eye-slash-solid.svg" alt="eye" class="eye hidden h-4 w-4 absolute right-0 z-50" style="top: 25%; right: .8em;"  onclick="passwordVisibility(this);">
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Re-enter Password:</label>
                    <div class="flex relative">
                        <input class="form-control password block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="password" placeholder="Re-enter Password" name="reenter" required onkeyup="eyeVisibility(this);"/>
                        <img src="./../img/icon/eye-slash-solid.svg" alt="eye" class="eye hidden h-4 w-4 absolute right-0 z-50" style="top: 25%; right: .8em;" onclick="passwordVisibility(this);">
                    </div>
                </div>
    
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" class="hide-add-modal w-1/4 bg-white flex justify-center hover:bg-gray-100 text-gray-800 font-semibold py-1 px-8 border border-gray-400 rounded shadow capitalize">cancel</button>
                    <button name="add" class="bg-green-400 hover:bg-green-600 add w-1/4 flex justify-center rounded-md px-8 py-1 text-white capitalize font-bold">add</button>
                </div>
            </div>
          </div>
        </div>
    </form> -->