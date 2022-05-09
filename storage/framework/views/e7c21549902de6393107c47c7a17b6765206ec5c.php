<div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
        @import  url('https://fonts.googleapis.com/css2?family=Cairo&family=Tajawal:wght@200;400&display=swap');

        * {
            font-family: 'Tajawal', sans-serif;
        }

    </style>

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 ">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
            class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>


        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center ">

                <!-- Card -->
                <div class="grid col-span-4 w-full relative">
                    <a class="group shadow-lg hover:shadow-2xl duration-200 delay-75 w-full bg-white rounded-sm py-6 pr-6 pl-9"
                        href="">

                        <h3 class="text-gray-700 text-3xl font-medium text-right">مرحبا بك </h3>

                        

                    </a>
                </div>


                
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>

                    <div class="relative mx-4 lg:mx-0">
                        

                        
                    </div>
                </div>
                
            </header>


            <main>
                <?php echo $__env->yieldContent('side'); ?>
                
            </main>

        </div>
        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
            class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex flex-col items-center">

                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35"
                        height="35" class="my-4" viewBox="0 0 219.503 305.654">
                        <defs>
                            <linearGradient id="linear-gradient" x1="0.174" y1="0.584" x2="0.94" y2="0.263"
                                gradientUnits="objectBoundingBox">
                                <stop offset="0" stop-color="#219ebc" />
                                <stop offset="0.507" stop-color="#19768c" />
                                <stop offset="1" stop-color="#114f5e" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-2" x1="0.087" y1="0.636" x2="0.962" y2="0.41"
                                gradientUnits="objectBoundingBox">
                                <stop offset="0" stop-color="#219ebc" />
                                <stop offset="1" stop-color="#114f5e" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-3" x1="0.5" y1="0" x2="0.5" y2="1"
                                xlink:href="#linear-gradient-2" />
                        </defs>
                        <g id="Layer_2" data-name="Layer 2" transform="translate(-0.023)">
                            <g id="graphics">
                                <path id="Path_62" data-name="Path 62"
                                    d="M40.44,169.17C24.69,160.31,11,144.82,9,128.53c-3.63-29,14-50.82,36.45-60.88,26.84-12,8.93-3.41,111.61-31.94C206.37,22,209.53,9.21,208.42,0c13.33,9.21,17.43,59.41-5.68,74.51C179,90,131.65,93.25,72.16,111.09,19.86,126.77,27.6,155.67,40.44,169.17Z"
                                    fill="url(#linear-gradient)" />
                                <path id="Path_63" data-name="Path 63"
                                    d="M29.87,177.69a67.851,67.851,0,0,1,14.78-6.94c74.4-18,80.92-17.62,105.61-24,67.27-17.26,59.19-31.64,60.9-37.38,12.41,14,12.62,57.61-10.38,70.7C172.9,196,123.83,201.18,61.66,217.52c-20.23,5.32-32.07,11.66-40.92,19.17-9.83,8.34-12.52,20.53-5,30.76,6.58,8.94,24.19,7.48,43.7,4.61,34.61-5.09,78.49-15.7,90.81-19.31,55.36-16.19,59.19-31.64,60.9-37.38,12.41,14,12.62,57.61-10.38,70.71-18.22,10.38-35.53,16.35-73,18.73-27.47,1.74-77.37,3.38-101.8-23.42-2.38-2.6-21.39-17.8-25.32-44C-3,213.07,9.63,190.36,29.87,177.69Z"
                                    fill="url(#linear-gradient-2)" />
                                <path id="Path_64" data-name="Path 64"
                                    d="M88.43,160.46h0c-22.28,5.08-43.8,10.29-43.8,10.29l-1.1.38c-1.06-.63-2.1-1.28-3.12-2-12.83-13.5-20.56-42.4,31.73-58.08q5.41-1.62,10.69-3.09C68.19,114.26,47.49,148.19,88.43,160.46Z"
                                    fill="url(#linear-gradient-3)" />
                                <path id="Path_65" data-name="Path 65"
                                    d="M74.7,266.43a38.128,38.128,0,0,0,3.09,2.35c-6.25,1.28-12.43,2.41-18.34,3.28-19.51,2.87-37.12,4.33-43.7-4.61-7.53-10.23-4.84-22.42,5-30.76C37,222.89,58.06,218.23,79.47,213,63.82,220.54,50.69,246,74.7,266.43Z"
                                    fill="url(#linear-gradient-3)" />
                            </g>
                        </g>
                    </svg>

                    <span class="text-white text-2xl mx-2 font-semibold">انجز لي</span>

                </div>
            </div>

            <nav class="mt-10">



                <a class="<?php echo e(Route::currentRouteName() === 'admin'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'); ?>"
                    href="<?php echo e(route('admin')); ?>">

                    <span class="mx-3">الرئيسية</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23.986" viewBox="0 0 24 23.986">
                        <path id="home"
                            d="M23.121,9.069,15.536,1.483a5.008,5.008,0,0,0-7.072,0L.879,9.069A2.978,2.978,0,0,0,0,11.19v9.817a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V11.19A2.978,2.978,0,0,0,23.121,9.069ZM15,22.007H9V18.073a3,3,0,0,1,6,0Zm7-1a1,1,0,0,1-1,1H17V18.073a5,5,0,0,0-10,0v3.934H3a1,1,0,0,1-1-1V11.19a1.008,1.008,0,0,1,.293-.707L9.878,2.9a3.008,3.008,0,0,1,4.244,0l7.585,7.586a1.008,1.008,0,0,1,.293.7Z"
                            transform="translate(0 -0.021)" fill="#8ecae6" />
                    </svg>



                </a>

                <a class="<?php echo e(Route::currentRouteName() === 'admin_users'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'); ?>"
                    href="<?php echo e(route('admin_users')); ?>">

                    <span class="mx-3">المستخدمين</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="23.992" viewBox="0 0 22.5 23.992">
                        <path id="man-head"
                            d="M15.993,11.5a1.5,1.5,0,1,1-1.5-1.5,1.5,1.5,0,0,1,1.5,1.5Zm8,0a3.5,3.5,0,0,0-2.15-3.226A10,10,0,0,0,2.219,7.9L1.5,12s1.606,0,1.778-.013a12.19,12.19,0,0,0,4.9-1.191,1.484,1.484,0,0,0-.183.7A1.5,1.5,0,1,0,9.62,10.013c.025-.016.052-.03.077-.045A16.228,16.228,0,0,0,16.114,3.14a7.966,7.966,0,0,1,3.833,6.009l.078.746.738.133a1.5,1.5,0,0,1,1.23,1.472H22A1.5,1.5,0,0,1,20.5,13a1.606,1.606,0,0,1-.252-.027l-.835-.148-.282.8C18.215,16.221,15.13,19,12,19h0c-3.026,0-6.023-2.619-7.041-5.153A13.535,13.535,0,0,1,3,14H2.88c.062.181.106.3.12.339a10.894,10.894,0,0,0,5,5.6V24h8V19.954a11.037,11.037,0,0,0,4.732-4.962A3.5,3.5,0,0,0,24,11.5Z"
                            transform="translate(-1.5 -0.008)" fill="#8ecae6" />
                    </svg>


                </a>

                <a class="<?php echo e(Route::currentRouteName() === 'section'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'); ?>"
                    href=<?php echo e(route('section')); ?>>

                    <span class="mx-3">الاقسام</span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="19.947" height="19.947" viewBox="0 0 19.947 19.947">
                        <g id="Group_49" data-name="Group 49" transform="translate(-1.998 -2.055)">
                            <path id="Path_54" data-name="Path 54" d="M11,3.055A9,9,0,1,0,20.945,13H11Z" fill="none"
                                stroke="#8ecae6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            <path id="Path_55" data-name="Path 55" d="M20.488,9H15V3.512A9.025,9.025,0,0,1,20.488,9Z"
                                fill="none" stroke="#8ecae6" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" />
                        </g>
                    </svg>


                </a> 

                 

                <a class="<?php echo e(Route::currentRouteName() === 'Admin_projects'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'); ?>"
                    href=<?php echo e(route('Admin_projects')); ?>>

                    <span class="mx-3">المشاريع </span>

                    <svg id="edit-alt" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_70" data-name="Path 70"
                            d="M9.288,13.067c-2.317.446-3.465,3.026-3.963,4.634A1,1,0,0,0,6.281,19H10a3,3,0,0,0,2.988-3.274,3.107,3.107,0,0,0-3.7-2.659Z"
                            fill="#8ecae6" />
                        <path id="Path_71" data-name="Path 71"
                            d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2H16.042a1,1,0,1,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.966,4.966,0,0,0,3.535-1.464l2.658-2.658A4.966,4.966,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.464,21.122a3.022,3.022,0,0,1-1.464.8V18a1,1,0,0,1,1-1h3.925a3.022,3.022,0,0,1-.8,1.464Z"
                            fill="#8ecae6" />
                        <path id="Path_72" data-name="Path 72"
                            d="M14.566,14.17a1,1,0,0,1-.707-1.707L21.712,4.61a.943.943,0,0,0,0-1.335A.9.9,0,0,0,21.018,3a.933.933,0,0,0-.678.314l-7.6,8.407a1,1,0,0,1-1.484-1.341l7.6-8.4A2.949,2.949,0,0,1,20.963,1a2.985,2.985,0,0,1,2.163.862,2.947,2.947,0,0,1,0,4.163l-7.853,7.853a.993.993,0,0,1-.707.292Z"
                            fill="#8ecae6" />
                    </svg>


                </a>

                <a class="<?php echo e(Route::currentRouteName() === 'comments'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'); ?>"
                    href=<?php echo e(route('comments')); ?>>

                    <span class="mx-3">التعليقات </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24.001" height="24.024" viewBox="0 0 24.001 24.024">
                        <g id="comment" transform="translate(0.001 0.024)">
                            <path id="Path_66" data-name="Path 66"
                                d="M24,11.247A12.012,12.012,0,1,0,12.017,24H19a5.005,5.005,0,0,0,5-5ZM22,19a3,3,0,0,1-3,3H12.017a10.041,10.041,0,0,1-7.476-3.343,9.917,9.917,0,0,1-2.476-7.814,10.043,10.043,0,0,1,8.656-8.761A10.564,10.564,0,0,1,12.021,2,9.921,9.921,0,0,1,18.4,4.3,10.041,10.041,0,0,1,22,11.342Z"
                                fill="#8ecae6" />
                            <path id="Path_67" data-name="Path 67" d="M8,9h4a1,1,0,0,0,0-2H8A1,1,0,0,0,8,9Z"
                                fill="#8ecae6" />
                            <path id="Path_68" data-name="Path 68" d="M16,11H8a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2Z"
                                fill="#8ecae6" />
                            <path id="Path_69" data-name="Path 69" d="M16,15H8a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2Z"
                                fill="#8ecae6" />
                        </g>
                    </svg>


                </a> 
             

                <a class="<?php echo e(Route::currentRouteName() === 'complaint'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'); ?>"
                    href=<?php echo e(route('complaint')); ?>>

                    <span class="mx-3">الشكوى </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="23.981" height="15.94" viewBox="0 0 23.981 15.94">
                        <path id="engine-warning"
                            d="M12,20a8.009,8.009,0,0,1-8-8C4.376,1.412,19.626,1.415,20,12a8.009,8.009,0,0,1-8,8ZM12,6c-7.929.252-7.928,11.749,0,12C19.929,17.748,19.928,6.251,12,6Zm1,2H11v5h2Zm0,6H11v2h2Zm11-2a12.026,12.026,0,0,0-2.743-7.637L19.714,5.637a10.052,10.052,0,0,1,0,12.726l1.543,1.274A12.026,12.026,0,0,0,24,12ZM4.286,18.363a10.052,10.052,0,0,1,0-12.726L2.744,4.363a12.065,12.065,0,0,0,0,15.274Z"
                            transform="translate(-0.019 -4.06)" fill="#8ecae6" />
                    </svg>


                </a>
                <a class="<?php echo e(Route::currentRouteName() === 'logout'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'); ?>"
                href="/logout">

                <span class="mx-3">تسجيل الخروج </span>

                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M11.4927 2C13.9753 2 16 3.99 16 6.44V11.23H9.89535C9.45785 11.23 9.11192 11.57 9.11192 12C9.11192 12.42 9.45785 12.77 9.89535 12.77H16V17.55C16 20 13.9753 22 11.4724 22H6.51744C4.02471 22 2 20.01 2 17.56V6.45C2 3.99 4.03488 2 6.52762 2H11.4927ZM18.5402 8.5502C18.8402 8.2402 19.3302 8.2402 19.6302 8.5402L22.5502 11.4502C22.7002 11.6002 22.7802 11.7902 22.7802 12.0002C22.7802 12.2002 22.7002 12.4002 22.5502 12.5402L19.6302 15.4502C19.4802 15.6002 19.2802 15.6802 19.0902 15.6802C18.8902 15.6802 18.6902 15.6002 18.5402 15.4502C18.2402 15.1502 18.2402 14.6602 18.5402 14.3602L20.1402 12.7702H16.0002V11.2302H20.1402L18.5402 9.6402C18.2402 9.3402 18.2402 8.8502 18.5402 8.5502Z"
                      fill="#8ecae6" />
                  </svg>


            </a> 

            </nav>
        </div>
    </div>
</div>
<?php /**PATH E:\enjezli\enjezli\resources\views/Admin/layout/side.blade.php ENDPATH**/ ?>