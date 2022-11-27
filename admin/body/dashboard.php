      <div class="w-full px-6 py-6 mx-auto">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans font-semibold leading-normal text-sm">Net Income</p>
                      <h5 class="mb-0 font-bold">
                        ₱
                        <?php
                          $results = netProfit()->fetch_assoc();
                          echo $results['net'];
                        ?>
                        <!-- <span class="leading-normal text-sm font-weight-bolder text-lime-500">+0%</span> -->
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="grid place-items-center w-12 h-12 text-center rounded-lg bg-gradient-to-tr from-green-300 to-pink-500">
                      <img src="./img/icon/coins-solid-white.svg" alt="none" class="w-6 h-6">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- card2 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans font-semibold leading-normal text-sm">Latest Users</p>
                      <h5 class="mb-0 font-bold">
                        <?php
                          $results = latestUsers();
                          echo $results->num_rows;
                        ?>
                        <!-- <span class="leading-normal text-sm font-weight-bolder text-lime-500">+0%</span> -->
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="grid place-items-center w-12 h-12 text-center rounded-lg bg-gradient-to-tr from-green-300 to-pink-500">
                      <img src="./img/icon/user-secret-solid-white.svg" alt="none" class="w-6 h-6">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- card3 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans font-semibold leading-normal text-sm">Latest Clients</p>
                      <h5 class="mb-0 font-bold">
                        <?php
                          $results = latestCustomers();
                          echo $results->num_rows;
                        ?>
                        <!-- <span class="leading-normal text-lime-500 text-sm font-weight-bolder">+0%</span> -->
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="grid place-items-center w-12 h-12 text-center rounded-lg bg-gradient-to-tr from-green-300 to-pink-500">
                      <img src="./img/icon/handshake-solid-white.svg" alt="none" class="w-6 h-6">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- card4 -->
          <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans font-semibold leading-normal text-sm">Sales</p>
                      <h5 class="mb-0 font-bold">
                        ₱
                        <?php
                          $results = salesTotal()->fetch_assoc();
                          echo $results['sum'];
                        ?>
                        <!-- <span class="leading-normal text-sm font-weight-bolder text-lime-500">+0%</span> -->
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="grid place-items-center w-12 h-12 text-center rounded-lg bg-gradient-to-tr from-green-300 to-pink-500">
                      <img src="./img/icon/cart-shopping-solid-white.svg" alt="none" class="w-6 h-6">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full px-3 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-wrap -mx-3">
                  <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                    <div class="flex flex-col h-full">
                      <h5 class="font-bold">TGT Furniture shop</h5>
                      <p class="mb-12">Our Furniture was built to serve people who are looking for high quality, beautiful and affordable furniture pieces!</p>
                      <a class="mt-auto mb-0 font-semibold leading-normal text-sm group text-slate-500" href="javascript:;">
                        Read More
                        <i class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                      </a>
                    </div>
                  </div>
                  <div class="max-w-full px-3 mt-12 ml-auto text-center lg:mt-0 lg:w-5/12 lg:flex-none">
                    <div class="h-full bg-gradient-to-tr from-green-300 to-pink-500 rounded-xl">
                      <img src="./img/waves-white.svg" class="absolute top-0 hidden w-1/2 h-full lg:block" alt="waves" />
                      <div class="relative flex items-center justify-center h-full">
                        <img class="relative z-20 w-full pt-6" src="./img/rocket-white.png" alt="rocket" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <div class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-4">
              <div class="relative h-full overflow-hidden bg-cover rounded-xl" style="background-image: url('./img/card2-furniture.jpg')">
                <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80"></span>
                <div class="relative z-10 flex flex-col flex-auto h-full p-4">
                  <h5 class="pt-2 mb-6 font-bold text-white">FURNITURE SHOP</h5>
                  <p class="text-white">We made the process of owning your dream furniture simpler and faster.</p>
                  <a class="mt-auto mb-0 font-semibold leading-normal text-white group text-sm" href="javascript:;">
                    Read More
                    <i class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- cards row 3 -->

        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-5/12 lg:flex-none">
            <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="flex-auto p-4">
                <div class="mb-4 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-xl p-4">
                  <div>
                    <canvas id="donut" height="170"></canvas>
                  </div>
                </div>
                <h6 class="mt-6 mb-0 ml-2">Top 3 Products</h6>
                <div class="mt-2 flex flex-col">
                  <div class='flex justify-between items-center'>
                    <div>
                      <span class=" bg-red-400 text-white font-bold w-4 h-4 px-2">1</span> 
                      <span class='top1'>Barnes</span>
                    </div>
                    <div class="flex">
                      <span class="top1-sold"></span>
                      <span class="ml-1">sold</span>
                    </div>
                  </div>
                  <div class='flex justify-between items-center'>
                    <div>
                      <span class=" bg-blue-400 text-white font-bold w-4 h-4 px-2">2</span> 
                      <span class='top2'>Barnes</span>
                    </div>
                    <div class="flex">
                      <span class="top2-sold"></span>
                      <span class="ml-1">sold</span>
                    </div>
                  </div>
                  <div class='flex justify-between items-center'>
                    <div>
                      <span class=" bg-yellow-400 text-white font-bold w-4 h-4 px-2">3</span> 
                      <span class='top3'>Barnes</span>
                    </div>
                    <div class="flex">
                      <span class="top3-sold"></span>
                      <span class="ml-1">sold</span>
                    </div>
                  </div>
  
                </div>
              </div>
            </div>
          </div>
          <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                <h6>Sales overview</h6>
                <p class="leading-normal text-sm">
                
                </p>
              </div>
              <div class="flex-auto p-4">
                <div>
                  <canvas id="line" width="400" height="220"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>