    <aside class=" w-52 bg-white ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0  p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
      <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
          <img src="./../img/logo/logo.png" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
          <span class="ml-2 font-semibold transition-all duration-200 ease-nav-brand">TGT</span>
        </a>
      </div>
      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

      <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
          <li class=" mt-8 w-full">
            <a class=" py-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg <?php echo strpos($_SERVER['REQUEST_URI'], 'dashboard') ? 'bg-white shadow-xl' : '';?> px-4 font-semibold text-slate-700 transition-colors" href="./dashboard.php">
              <div class="<?php echo strpos($_SERVER['REQUEST_URI'], 'dashboard') ? 'bg-gradient-to-tr from-green-300 to-pink-500' : '';?> shadow-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <img src="./img/icon/store-solid-<?php echo strpos($_SERVER['REQUEST_URI'], 'dashboard') ? 'white' : 'navy';?>.svg" alt="dashboard">
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
            </a>
          </li>
          <li class="mt-2 w-full">
            <a class="py-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg <?php echo strpos($_SERVER['REQUEST_URI'], 'product') || strpos($_SERVER['REQUEST_URI'], 'categories') ? 'bg-white shadow-xl' : '';?> px-4 font-semibold text-slate-700 transition-colors" href="./products.php">
              <div class="<?php echo strpos($_SERVER['REQUEST_URI'], 'product') || strpos($_SERVER['REQUEST_URI'], 'categories') ? 'bg-gradient-to-tr from-green-300 to-pink-500' : '';?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <img src="./img/icon/box-open-solid-<?php echo strpos($_SERVER['REQUEST_URI'], 'products') || strpos($_SERVER['REQUEST_URI'], 'categories') ? 'white' : 'navy';?>.svg" alt="product">
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Products</span>
            </a>
          </li>
          <li class="mt-2 w-full">
            <a class="py-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg <?php echo strpos($_SERVER['REQUEST_URI'], 'customers') ? 'bg-white shadow-xl' : '';?> px-4 font-semibold text-slate-700 transition-colors" href="./customers.php">
              <div class="<?php echo strpos($_SERVER['REQUEST_URI'], 'customers') ? 'bg-gradient-to-tr from-green-300 to-pink-500' : '';?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <img src="./img/icon/users-solid-<?php echo strpos($_SERVER['REQUEST_URI'], 'customers') ? 'white' : 'navy';?>.svg" alt="customers">
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Customers</span>
            </a>
          </li>
          <li class="mt-2 w-full">
            <a class="py-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg <?php echo strpos($_SERVER['REQUEST_URI'], 'order') ? 'bg-white shadow-xl' : '';?> px-4 font-semibold text-slate-700 transition-colors" href="./order.php">
              <div class="<?php echo strpos($_SERVER['REQUEST_URI'], 'order') ? 'bg-gradient-to-tr from-green-300 to-pink-500' : '';?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <img src="./img/icon/money-bill-solid-<?php echo strpos($_SERVER['REQUEST_URI'], 'order') ? 'white' : 'navy';?>.svg" alt="customers">
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Transaction</span>
            </a>
          </li>
          <li class="mt-2 w-full">
            <a class="py-3 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg <?php echo strpos($_SERVER['REQUEST_URI'], 'loyalty') || strpos($_SERVER['REQUEST_URI'], 'seasonal') ? 'bg-white shadow-xl' : '';?> px-4 font-semibold text-slate-700 transition-colors" href="./loyalty.php">
              <div class="<?php echo strpos($_SERVER['REQUEST_URI'], 'loyalty') || strpos($_SERVER['REQUEST_URI'], 'seasonal') ? 'bg-gradient-to-tr from-green-300 to-pink-500' : '';?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <img src="./img/icon/handshake-solid-<?php echo strpos($_SERVER['REQUEST_URI'], 'loyalty') || strpos($_SERVER['REQUEST_URI'], 'seasonal') ? 'white' : 'navy';?>.svg" alt="promotion">
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Promotion</span>
            </a>
          </li>
          <!-- <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg <?php echo strpos($_SERVER['REQUEST_URI'], 'profile') ? 'bg-white shadow-soft-xl' : '';?> px-4 font-semibold text-slate-700 transition-colors" href="#">
              <div class="<?php echo strpos($_SERVER['REQUEST_URI'], 'profile') ? 'bg-gradient-to-tr from-green-300 to-pink-500' : '';?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <img src="./../../img/icon/user-tie-solid-navy.svg" alt="profile">
                  <title>shop</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(0.000000, 148.000000)">
                          <path
                            class="opacity-60"
                            d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                          ></path>
                          <path
                            class=""
                            d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"
                          ></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Profile</span>
            </a>
          </li> -->
        </ul>
      </div>
    </aside>  
