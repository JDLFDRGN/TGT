        <section class=" min-h-screen">
          <div class="container mx-auto p-2">
              <div class="flex flex-col w-full px-0 mx-auto">
                  <div class="flex flex-col w-full ml-0 lg:ml-0 lg:w-2/5">
                      <div class="pt-12 md:pt-0 2xl:ps-4">
                          <h2 class="text-xl font-bold">Order #<?php echo $results['ID'];?>
                          </h2>
                          <?php  
                            foreach($data as $row){
                              $result = (array)$row;

                              echo "<div class='mt-8 row'>";
                                  echo "<div class='flex flex-col space-y-4'>";
                                      echo "<div class='flex space-x-4'>";
                                          echo "<div class='overflow-hidden'>";
                                              echo "<img src='./img/uploaded/$result[productImg]' alt='item' class='object-fill w-80 h-60'>";
                                          echo "</div>";
                                          echo "<div class='flex flex-col justify-center'>";
                                              echo "<h2 class=' text-lg font-bold'>$result[productName]</h2>";
                                              echo "<div class='flex items-center'>";
                                                  echo "<span>Price:</span>";
                                                  echo "<span class='ml-2'>₱<span class='price'>$result[productPrice]</span></span>";
                                              echo "</div>";
                                              echo "<div class='flex items-center'>";
                                                  echo "<span>Quantity:</span>";
                                                  echo "<span class='ml-2 quantity'>$result[productQuantity]</span>";
                                              echo "</div>";
                                          echo "</div>";
                                      echo "</div>";
                                  echo "</div>";
                              echo "</div>";
                            }
                          ?>
                          <div
                              class="flex items-center mt-8 w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                              Subtotal<span class="ml-2">₱<span class="subtotal"><?php echo $subtotal;?></span></span>
                          </div>
                          <div
                              class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                              Coupon<span class="ml-2">-₱<span class="coupon"><?php echo $coupon;?></span></span>
                          </div>
                          <div
                              class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                              Total<span class="ml-2">₱<span class="total"><?php echo $total;?></span></span>
                          </div>
                          <div
                              class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                              Shipping<span class="ml-2">₱<span class="shipping"><?php echo $results['payment'] == 'cop' ? '0.00' : $shipping;?></span></span>
                          </div>
                          <div
                              class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                              Overall<span class="ml-2">₱<span class="overall">0.00</span></span>
                          </div>
                      </div>
                  </div>
                  <div class="flex flex-col md:w-full mt-8">
                      <div class="flex justify-between">
                          <h2 class="mb-4 font-bold md:text-xl text-heading ">Customer Information</h2>
                      </div>
                      <form class="justify-center w-full mx-auto" method="post" action>
                          <div class="">
                              <div class="space-x-0 lg:flex lg:space-x-4">
                                  <div class="w-full lg:w-1/2">
                                      <label for="firstname" class="block mb-3 text-sm font-semibold text-gray-500">First
                                          Name</label>
                                      <input required readonly value="<?php echo $results['firstname']?>" name="firstname" type="text" placeholder="First Name"
                                          class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                  </div>
                                  <div class="w-full lg:w-1/2 ">
                                      <label for="lastname" class="block mb-3 text-sm font-semibold text-gray-500">Last
                                          Name</label>
                                      <input required readonly value="<?php echo $results['lastname']?>" name="lastname" type="text" placeholder="Last Name"
                                          class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                  </div>
                              </div>
                              <div class="mt-4">
                                  <div class="w-full">
                                      <label for="email"
                                          class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                                      <input required readonly value="<?php echo $results['email']?>" name="email" type="email" placeholder="Email"
                                          class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                  </div>
                              </div>
                              <div class="mt-4">
                                  <div class="w-full">
                                      <label for="number"
                                          class="block mb-3 text-sm font-semibold text-gray-500">Phone Number</label>
                                      <input required readonly value="<?php echo $results['number']?>" name="number" type="text" placeholder="Phone Number"
                                          class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                  </div>
                              </div>
                              <!-- <div class="mt-4">
                                  <div class="w-full">
                                      <label for="address"
                                          class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                                      <textarea required readonly
                                          class="w-full px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                          name="address" cols="20" rows="4" placeholder="Address"><?php echo $results['address']?></textarea>
                                  </div>
                              </div> -->

                            <div class="mt-4 address-container <?php echo $results['payment'] == 'cop' ? 'hidden' : '';?>">
                                <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
                                    <div class="w-full lg:w-1/2">
                                        <label for="firstname" class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                                        <select name="city" class="city w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">                    
                                            <option value="" class="city-select">--Cities--</option>
                                            <?php
                                                $cities = json_decode(file_get_contents("./../cities.json"));
                                                $array = [];
                                                foreach($cities as $city){
                                                    $city = (array)$city;
                                                    array_push($array, $city['city']);
                                                }
                                                sort($array);

                                                foreach($array as $city){
                                                    $selected = '';
                                                    if($results['city'] == $city)
                                                        $selected = 'selected';
                                                    echo "<option value='$city' $selected>$city</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="w-full lg:w-1/2 ">
                                        <label for="zipcode" class="block mb-3 text-sm font-semibold text-gray-500">Zip Code</label>
                                        <input readonly value="<?php echo $results['zipcode'];?>" maxlength="4" name="zipcode" type="text" placeholder="Zip Code"class="w-full zipcode px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    </div>
                                </div>
                                <div class="w-full mt-4">
                                    <label for="number" class="block mb-3 text-sm font-semibold text-gray-500">House Number or Street</label>
                                    <input readonly value="<?php echo $results['hnos'];?>" name="hnos" type="text" placeholder="House Number or Street" class="w-full px-4 py-3 hnos text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                                <div class="w-full mt-4">
                                    <label for="number" class="block mb-3 text-sm font-semibold text-gray-500">Barangay</label>
                                    <input readonly value="<?php echo $results['barangay'];?>" name="barangay" type="text" placeholder="Barangay" class="w-full px-4 py-3 hnos text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                                <div class="w-full mt-4">
                                    <label for="address" class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                                    <textarea readonly
                                        class="w-full address px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                        name="address" cols="20" rows="4" placeholder="Address"><?php echo $results['address'];?></textarea>
                                </div>
                            </div>




                              <div class="mt-4">
                                  <div class="w-full">
                                      <label for="number" class="block mb-3 text-sm font-semibold text-gray-500">Payment Method</label>
                                      <input required readonly value="<?php echo $results['payment']?>" name="payment" type="text" placeholder="Payment" class="payment w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                  </div>
                              </div>
                              <!-- Gcash -->
                              <!-- <div class="gcash-container <?php echo $results['payment'] == 'gcash' ? '' : 'hidden';?>">
                                  <div class="mt-4">
                                      <div class="w-full">
                                          <label for="gcash"
                                              class="block mb-3 text-sm font-semibold text-gray-500">Gcash Number</label>
                                          <input name="gcash" readonly value="<?php echo $results['gcash'];?>" type="text" placeholder="Gcash Number"
                                              class="gcash w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                      </div>
                                  </div>
                                  <div class="mt-4">
                                      <div class="w-full">
                                          <label for="mpin"
                                              class="block mb-3 text-sm font-semibold text-gray-500">MPIN</label>
                                          <input name="mpin" readonly  value="<?php echo $results['mpin'];?>" type="text" placeholder="MPIN"
                                              class="mpin w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                      </div>
                                  </div>
                              </div> -->
                              <!-- Cash on Pickup -->
                              <div class="cop-container <?php echo $results['payment'] == 'cop' ? '' : 'hidden';?>">
                                  <div class="mt-4">
                                      <div class="w-full">
                                          <label for="appointment"
                                              class="block mb-3 text-sm font-semibold text-gray-500">Pickup Appointment</label>
                                          <input name="appointment" readonly value="<?php echo $results['appointment'];?>" type="date" 
                                              class="appointment w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="pt-12 md:pt-0 2xl:ps-4">
                    <h2 class="text-xl font-bold mt-4">Order Status</h2>      
                  </div>
                  <form method="post">
                    <input type="hidden" class="gross" name="gross">
                    <input type="hidden" class="shipping-input" name="shipping-input">
                    <input type="hidden" class="net" name="net">    
                    <div class="flex flex-wrap w-full justify-evenly mt-8">
                        <div>
                            <input type="radio" class="status" id="new" name="status" value="New" <?php echo $results['status'] == 'New' ? 'checked' : '';?>>
                            <label for="new" class="capitalize">new</label>
                        </div>    
                        <div class="<?php echo $results['payment'] == 'cop' ? 'hidden' : '';?>">
                            <input type="radio" class="status" id="processing" name="status" value="Processing" <?php echo $results['status'] == 'Processing' ? 'checked' : '';?>>
                            <label for="new" class="capitalize">processing</label>
                        </div>    
                        <div class="<?php echo $results['payment'] == 'cop' ? 'hidden' : '';?>">
                            <input type="radio" class="status" id="in-transit" name="status" value="In Transit" <?php echo $results['status'] == 'In Transit' ? 'checked' : '';?>>
                            <label for="new" class="capitalize">in transit</label>
                        </div>    
                        <div class="<?php echo $results['payment'] == 'cop' ? 'hidden' : '';?>">
                            <input type="radio" class="status" id="out-for-delivery" name="status" value="Out For Delivery" <?php echo $results['status'] == 'Out For Delivery' ? 'checked' : '';?>>
                            <label for="new" class="capitalize">out for delivery</label>
                        </div>
                        <div>
                            <input type="radio" class="status" id="received" name="status" value="Received" <?php echo $results['status'] == 'Received' ? 'checked' : '';?>>
                            <label for="new" class="capitalize">received</label>
                        </div>  
                        <div>
                            <input type="radio" class="status" id="cancelled" name="status" value="Cancelled" <?php echo $results['status'] == 'Cancelled' ? 'checked' : '';?>>
                            <label for="new" class="capitalize">cancelled</label>
                        </div>  
                    </div>

                    <div class="mt-4">
                            <div class="w-full">
                                <input required type="submit" name="submit" class="w-full bg-gradient-to-r from-red-600 to-pink-500  text-white py-2 font-semibold rounded-lg my-12" value="Update Status">
                            </div>
                    </div>
                  </form>
              </div>
          </div>
        </section>