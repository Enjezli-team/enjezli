
<div>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>


  <style>
      @import url('https://fonts.googleapis.com/css2?family=Cairo&family=Tajawal:wght@200;400&display=swap');

      * {
          font-family: 'Tajawal', sans-serif;
      }

  </style>

  <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 ">
      <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
          class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>


      <div class="flex-1 flex flex-col overflow-hidden">
          <header class="flex justify-between items-center ">

            <div class="flex-1 flex flex-col overflow-hidden">
              <header class="absolute w-full  flex justify-between items-center py-4 px-6 bg-white border-b-4 border-[#186D80]">
               
      
                  <div class="flex items-center">
                      <div x-data="{ notificationOpen: false }" class="relative">
                          <button @click="notificationOpen = ! notificationOpen"
                              class="flex mx-4 text-gray-600 focus:outline-none">
                              <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                                      stroke="#186D80" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  </path>
                              </svg>
                          </button>
      
                          <div x-show="notificationOpen" @click="notificationOpen = false"
                              class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>
      
                          <div x-show="notificationOpen"
                              class="absolute left-0 mt-2 w-80 bg-white rounded-lg shadow-xl overflow-hidden z-10"
                              style="width: 20rem; display: none;">
                             
                              


                          {{-- <a href="#"
                          class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-[#186D80] -mx-2">
                          <p class="text-sm mx-2 text-right">
                            <p class="font-bold" href="#">محمد</span> ارسل شكوى <span
                                class="font-bold text-[#8ECAE6]" href="#">اسم المشروع</p>
                        </p>
                          <img class="h-8 w-8 rounded-full object-cover mx-1"
                              src="images/logo.png"
                              alt="avatar">
                        
                      </a> --}}
                    
                      
                  
                      <a>
                        <li class="nav-item dropdown ps-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer" aria-hidden="true"></i>
                                <span class="badge badge-pill badge-default badge-danger text-dark badge-default badge-up badge-glow   notif-count" data-count=" {{ $notifications->count()}}">
                                    {{ $notifications->count()}}
                                  </span>
                            </a>
                            <ul class="dropdown-menu  px-2 py-3 me-sm-n4" id="notify_body" aria-labelledby="dropdownMenuButton">
                                @forelse ($notifications as $item)
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="{{$item->body}}">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{asset('images/'.Auth::user()->image )}}" class="avatar avatar-sm  ms-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold"> {{ $item->message }} </span> {{Auth::user()->name }}
                                                </h6>
                                                <p class="text-xs text-secondary mb-0 ms-auto">
                                                    <i class="fa fa-clock me-1" aria-hidden="true"></i>
                                                    {{ $item->created_at }}                                            </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </li>
                    

                      </a>
                  
              
                      
                            
                          </div>
                      </div>
      
                      <div x-data="{ dropdownOpen: false }" class="relative">
                          <button @click="dropdownOpen = ! dropdownOpen"
                              class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                              <img class="h-full w-full object-cover shadow"
                                 {{-- src="/images/{{$admin->image}}" alt="Your avatar"> --}}
                                 src="/images/logo.png" alt="Your avatar">
                          </button>
      
                          <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                              style="display: none;"></div>
      
                          <div x-show="dropdownOpen"
                              class="absolute text-right left-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                              style="display: none;">
                              <a href="#"
                                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#186D80] -600 hover:text-white">تسجيل الخروج</a>
                           
                          </div>
                      </div>
                  </div>
              </header>
           
          </div>


              {{-- py-4 px-6 bg-white border-b-4 border-gray-900 --}}
              <div class="flex items-center">
                  <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                      <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                  </button>

                  <div class="relative mx-4 lg:mx-0">
                      {{-- <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                          <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                              <path
                                  d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              </path>
                          </svg>
                      </span> --}}

                      {{-- <input class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:border-indigo-600" type="text"
                          placeholder="Search"> --}}
                  </div>
              </div>
              {{-- <div class="flex items-center">
                  <div x-data="{ notificationOpen: false }" class="relative">
                      <button @click="notificationOpen = ! notificationOpen"
                          class="flex mx-4 text-gray-600 focus:outline-none">
                          <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              </path>
                          </svg>
                      </button>
  
                      <div x-show="notificationOpen" @click="notificationOpen = false"
                          class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>
  
                      <div x-show="notificationOpen"
                          class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl overflow-hidden z-10"
                          style="width: 20rem; display: none;">
                          <a href="#"
                              class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-[#186D80] -mx-2">
                              <img class="h-8 w-8 rounded-full object-cover mx-1"
                                  src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=334&amp;q=80"
                                  alt="avatar">
                              <p class="text-sm mx-2">
                                  <span class="font-bold" href="#">Sara Salah</span> replied on the <span
                                      class="font-bold text-indigo-400" href="#">Upload Image</span> artical . 2m
                              </p>
                          </a>
                          <a href="#"
                              class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-[#186D80] -mx-2">
                              <img class="h-8 w-8 rounded-full object-cover mx-1"
                                  src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80"
                                  alt="avatar">
                              <p class="text-sm mx-2">
                                  <span class="font-bold" href="#">Slick Net</span> start following you . 45m
                              </p>
                          </a>
                          <a href="#"
                              class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-[#186D80] -mx-2">
                              <img class="h-8 w-8 rounded-full object-cover mx-1"
                                  src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=334&amp;q=80"
                                  alt="avatar">
                              <p class="text-sm mx-2">
                                  <span class="font-bold" href="#">Jane Doe</span> Like Your reply on <span
                                      class="font-bold text-indigo-400" href="#">Test with TDD</span> artical . 1h
                              </p>
                          </a>
                          <a href="#"
                              class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-[#186D80] -mx-2">
                              <img class="h-8 w-8 rounded-full object-cover mx-1"
                                  src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=398&amp;q=80"
                                  alt="avatar">
                              <p class="text-sm mx-2">
                                  <span class="font-bold" href="#">Abigail Bennett</span> start following you . 3h
                              </p>
                          </a>
                      </div>
                  </div>
  
                  <div x-data="{ dropdownOpen: false }" class="relative">
                      <button @click="dropdownOpen = ! dropdownOpen"
                          class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                          <img class="h-full w-full object-cover"
                              src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=296&amp;q=80"
                              alt="Your avatar">
                      </button>
  
                      <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                          style="display: none;"></div>
  
                      <div x-show="dropdownOpen"
                          class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                          style="display: none;">
                          <a href="#"
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#186D80] -600 hover:text-white">Profile</a>
                          <a href="#"
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#186D80] -600 hover:text-white">Products</a>
                          <a href="/login"
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#186D80] -600 hover:text-white">Logout</a>
                      </div>
                  </div>
              </div> --}}
          </header>

  <main>
    <!-- Content Header (Page header) -->




    <div class="content-header mt-10">
                @yield('side')
                {{-- here --}}
    </div>




            </main>





            
        </div>
        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
            class="mostly-customized-scrollbar fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-[#186D80] overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex flex-col items-center">

                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40"
                        height="40" class="my-4 bg-white rounded p-2" viewBox="0 0 219.503 305.654" >
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



                <a class="{{ Route::currentRouteName() === 'index'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}"
                    href="{{ route('index') }}">

                    <span class="mx-3">الرئيسية</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23.986" viewBox="0 0 24 23.986">
                        <path id="home"
                            d="M23.121,9.069,15.536,1.483a5.008,5.008,0,0,0-7.072,0L.879,9.069A2.978,2.978,0,0,0,0,11.19v9.817a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V11.19A2.978,2.978,0,0,0,23.121,9.069ZM15,22.007H9V18.073a3,3,0,0,1,6,0Zm7-1a1,1,0,0,1-1,1H17V18.073a5,5,0,0,0-10,0v3.934H3a1,1,0,0,1-1-1V11.19a1.008,1.008,0,0,1,.293-.707L9.878,2.9a3.008,3.008,0,0,1,4.244,0l7.585,7.586a1.008,1.008,0,0,1,.293.7Z"
                            transform="translate(0 -0.021)" fill="#8ecae6" />
                    </svg>



                </a>

                <a class="{{ Route::currentRouteName() === 'admin/users'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}"
                    href="{{ url('admin/users') }}">

                    <span class="mx-3">المستخدمين</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="23.992" viewBox="0 0 22.5 23.992">
                        <path id="man-head"
                            d="M15.993,11.5a1.5,1.5,0,1,1-1.5-1.5,1.5,1.5,0,0,1,1.5,1.5Zm8,0a3.5,3.5,0,0,0-2.15-3.226A10,10,0,0,0,2.219,7.9L1.5,12s1.606,0,1.778-.013a12.19,12.19,0,0,0,4.9-1.191,1.484,1.484,0,0,0-.183.7A1.5,1.5,0,1,0,9.62,10.013c.025-.016.052-.03.077-.045A16.228,16.228,0,0,0,16.114,3.14a7.966,7.966,0,0,1,3.833,6.009l.078.746.738.133a1.5,1.5,0,0,1,1.23,1.472H22A1.5,1.5,0,0,1,20.5,13a1.606,1.606,0,0,1-.252-.027l-.835-.148-.282.8C18.215,16.221,15.13,19,12,19h0c-3.026,0-6.023-2.619-7.041-5.153A13.535,13.535,0,0,1,3,14H2.88c.062.181.106.3.12.339a10.894,10.894,0,0,0,5,5.6V24h8V19.954a11.037,11.037,0,0,0,4.732-4.962A3.5,3.5,0,0,0,24,11.5Z"
                            transform="translate(-1.5 -0.008)" fill="#8ecae6" />
                    </svg>


                </a>

                
                <a class="{{ Route::currentRouteName() === 'admin/user_status/3'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}"
                    href="{{ url('admin/user_status/3') }}">

                    <span class="mx-3">المنجزين</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="23.992" viewBox="0 0 22.5 23.992">
                        <path id="man-head"
                            d="M15.993,11.5a1.5,1.5,0,1,1-1.5-1.5,1.5,1.5,0,0,1,1.5,1.5Zm8,0a3.5,3.5,0,0,0-2.15-3.226A10,10,0,0,0,2.219,7.9L1.5,12s1.606,0,1.778-.013a12.19,12.19,0,0,0,4.9-1.191,1.484,1.484,0,0,0-.183.7A1.5,1.5,0,1,0,9.62,10.013c.025-.016.052-.03.077-.045A16.228,16.228,0,0,0,16.114,3.14a7.966,7.966,0,0,1,3.833,6.009l.078.746.738.133a1.5,1.5,0,0,1,1.23,1.472H22A1.5,1.5,0,0,1,20.5,13a1.606,1.606,0,0,1-.252-.027l-.835-.148-.282.8C18.215,16.221,15.13,19,12,19h0c-3.026,0-6.023-2.619-7.041-5.153A13.535,13.535,0,0,1,3,14H2.88c.062.181.106.3.12.339a10.894,10.894,0,0,0,5,5.6V24h8V19.954a11.037,11.037,0,0,0,4.732-4.962A3.5,3.5,0,0,0,24,11.5Z"
                            transform="translate(-1.5 -0.008)" fill="#8ecae6" />
                    </svg>


                </a>

                
                <a class="{{ Route::currentRouteName() === 'admin/user_status/2'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}"
                    href="{{ url('admin/user_status/2') }}">

                    <span class="mx-3">طالبي الخدمات</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="23.992" viewBox="0 0 22.5 23.992">
                        <path id="man-head"
                            d="M15.993,11.5a1.5,1.5,0,1,1-1.5-1.5,1.5,1.5,0,0,1,1.5,1.5Zm8,0a3.5,3.5,0,0,0-2.15-3.226A10,10,0,0,0,2.219,7.9L1.5,12s1.606,0,1.778-.013a12.19,12.19,0,0,0,4.9-1.191,1.484,1.484,0,0,0-.183.7A1.5,1.5,0,1,0,9.62,10.013c.025-.016.052-.03.077-.045A16.228,16.228,0,0,0,16.114,3.14a7.966,7.966,0,0,1,3.833,6.009l.078.746.738.133a1.5,1.5,0,0,1,1.23,1.472H22A1.5,1.5,0,0,1,20.5,13a1.606,1.606,0,0,1-.252-.027l-.835-.148-.282.8C18.215,16.221,15.13,19,12,19h0c-3.026,0-6.023-2.619-7.041-5.153A13.535,13.535,0,0,1,3,14H2.88c.062.181.106.3.12.339a10.894,10.894,0,0,0,5,5.6V24h8V19.954a11.037,11.037,0,0,0,4.732-4.962A3.5,3.5,0,0,0,24,11.5Z"
                            transform="translate(-1.5 -0.008)" fill="#8ecae6" />
                    </svg>


                </a>

                <a class="{{ Route::currentRouteName() === '/admin/skills'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}"
                    href={{ url('/admin/skills') }}>

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

         


            
            <div x-data="{ isActive: true, open: open }">
                <!-- active classes 'bg-blue-100 dark:bg-blue-600' -->
                <a
                class="{{ Route::currentRouteName() === '/admin/offer_status'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/offer_status') }}
                  @click="$event.preventDefault(); open = !open"
                
                  :class="{ 'bg-[#EFF2F4] dark:bg-gray-700 dark:bg-opacity-25': isActive || open }"
                  role="button"
                  aria-haspopup="true"
                  :aria-expanded="(open || isActive) ? 'true' : 'false'"
                >
                
                  

                  <span aria-hidden="true" class="mr-auto">
                    <!-- active class 'rotate-180' -->
                    <svg
                      class="w-4 h-4 transition-transform transform"
                      :class="{ 'rotate-180': open }"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </span>

                  
                  <span class="mx-3">المحفظة  </span>

                  <span aria-hidden="true">
                  
                <svg xmlns="http://www.w3.org/2000/svg" width="16.017" height="24" viewBox="0 0 16.017 24">
                    <path id="dollar" d="M18.5,9.5A1.5,1.5,0,0,0,20,8V7.313A5.32,5.32,0,0,0,14.687,2H13.5V1.5a1.5,1.5,0,1,0-3,0V2H9.313A5.313,5.313,0,0,0,7.772,12.4l2.728.746V19H9.313A2.316,2.316,0,0,1,7,16.687V16a1.5,1.5,0,1,0-3,0v.687A5.32,5.32,0,0,0,9.313,22H10.5v.5a1.5,1.5,0,0,0,3,0V22h1.187a5.313,5.313,0,0,0,1.541-10.4L13.5,10.856V5h1.187A2.316,2.316,0,0,1,17,7.313V8A1.5,1.5,0,0,0,18.5,9.5Zm-3.118,4.979a2.314,2.314,0,0,1-.7,4.521H13.5V13.965ZM10.5,10.035,8.618,9.521A2.314,2.314,0,0,1,9.313,5H10.5Z" transform="translate(-3.992)" fill="#8ecae6"/>
                  </svg>

                      
                  </span>
                </a>
                <div x-show="open" class="mt-2 space-y-2 px-7 text-right" role="menu" arial-label="Pages">
                  <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                  <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                  <a class="{{ Route::currentRouteName() === '/admin/transactions'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/transactions') }}>

                  <div class="mx-2">محفظتي  </div>
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
                  </a>
                  <a class="{{ Route::currentRouteName() === '/admin/usertransactions/'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('/admin/usertransactions') }}>

                    <div class="mx-2">الاجراءات  </div>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
                    </a>
              
               

              
                </div>
              </div>

                 {{-- <a class="{{(Route::currentRouteName()==='skills')?' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100' :'flex justify-end mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'}}"
                href={{ route('skills') }}>
                    
                    <span class="mx-3">المهارات</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="sparkles" d="M19.5,24a1,1,0,0,1-.929-.628l-.844-2.113-2.116-.891a1.007,1.007,0,0,1,.035-1.857l2.088-.791.837-2.092a1.008,1.008,0,0,1,1.858,0l.841,2.1,2.1.841a1.007,1.007,0,0,1,0,1.858l-2.1.841-.841,2.1A1,1,0,0,1,19.5,24ZM10,21a2,2,0,0,1-1.936-1.413L6.45,14.54,1.387,12.846a2.032,2.032,0,0,1,.052-3.871L6.462,7.441,8.154,2.387A1.956,1.956,0,0,1,10.108,1a2,2,0,0,1,1.917,1.439l1.532,5.015,5.03,1.61a2.042,2.042,0,0,1,0,3.872h0l-5.039,1.612-1.612,5.039A2,2,0,0,1,10,21Zm.112-17.977L8.2,8.564a1,1,0,0,1-.656.64L2.023,10.888,7.564,12.8a1,1,0,0,1,.636.643l1.77,5.53,1.83-5.53a1,1,0,0,1,.648-.648l5.53-1.769a.072.072,0,0,0,.02-.009L12.448,9.2a1,1,0,0,1-.652-.661Zm8.17,8.96ZM20.5,7a1,1,0,0,1-.97-.757l-.357-1.43L17.74,4.428a1,1,0,0,1,.034-1.94l1.4-.325L19.53.757a1,1,0,0,1,1.94,0l.354,1.418,1.418.355a1,1,0,0,1,0,1.94l-1.418.355L21.47,6.243A1,1,0,0,1,20.5,7Z" transform="translate(0.001 0)" fill="#8ecae6"/>
                      </svg>
                      
    
                </a>  --}}


                   <!-- Pages links -->
              <div x-data="{ isActive: true, open: open }">
                <!-- active classes 'bg-blue-100 dark:bg-blue-600' -->
                <a
                class="{{ Route::currentRouteName() === '/admin/project_status'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/project_status') }}
                  @click="$event.preventDefault(); open = !open"
                
                  :class="{ 'bg-[#EFF2F4] dark:bg-gray-700 dark:bg-opacity-25': isActive || open }"
                  role="button"
                  aria-haspopup="true"
                  :aria-expanded="(open || isActive) ? 'true' : 'false'"
                >
                
                  

                  <span aria-hidden="true" class="mr-auto">
                    <!-- active class 'rotate-180' -->
                    <svg
                      class="w-4 h-4 transition-transform transform"
                      :class="{ 'rotate-180': open }"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </span>

                  
                  <span class="mx-3">المشاريع </span>

                  <span aria-hidden="true">
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
                  </span>
                </a>
                <div x-show="open" class="mt-2 space-y-2 px-7 text-right" role="menu" arial-label="Pages">
                  <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                  <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                  <a class="{{ Route::currentRouteName() === '/admin/project_status/1'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/project_status/1') }}>

                  <div class="mx-2">مفتوح</div>
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                    
                  </a>
                  <a class="{{ Route::currentRouteName() === '/admin/project_status/0'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/project_status/0') }}>

                    <div class="mx-2">معلق</div>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
                    </a>
               
                    <a class="{{ Route::currentRouteName() === '/admin/project_status/2'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/project_status/2') }}>

                        <div class="mx-2">قيد التنفيذ</div>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>  </a>

                        <a class="{{ Route::currentRouteName() === '/admin/project_status/3'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/project_status/3') }}>

                            <div class="mx-2">قيد التسليم </div>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path></svg> </a>

                            <a class="{{ Route::currentRouteName() === '/admin/project_status/4'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/project_status/4') }}>

                                <div class="mx-2">لا يتلقى عروض </div>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                </a>

                                <a class="{{ Route::currentRouteName() === '/admin/project_status/5'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/project_status/5') }}>

                                    <div class="mx-2">مغلق</div>
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
                                    </a>

              
                </div>
              </div>


              <div x-data="{ isActive: true, open: open }">
                <!-- active classes 'bg-blue-100 dark:bg-blue-600' -->
                <a
                class="{{ Route::currentRouteName() === '/admin/offer_status'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/offer_status') }}
                  @click="$event.preventDefault(); open = !open"
                
                  :class="{ 'bg-[#EFF2F4] dark:bg-gray-700 dark:bg-opacity-25': isActive || open }"
                  role="button"
                  aria-haspopup="true"
                  :aria-expanded="(open || isActive) ? 'true' : 'false'"
                >
                
                  

                  <span aria-hidden="true" class="mr-auto">
                    <!-- active class 'rotate-180' -->
                    <svg
                      class="w-4 h-4 transition-transform transform"
                      :class="{ 'rotate-180': open }"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </span>

                  
                  <span class="mx-3">العروض  </span>

                  <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.017" height="24" viewBox="0 0 16.017 24">
                        <path id="dollar" d="M18.5,9.5A1.5,1.5,0,0,0,20,8V7.313A5.32,5.32,0,0,0,14.687,2H13.5V1.5a1.5,1.5,0,1,0-3,0V2H9.313A5.313,5.313,0,0,0,7.772,12.4l2.728.746V19H9.313A2.316,2.316,0,0,1,7,16.687V16a1.5,1.5,0,1,0-3,0v.687A5.32,5.32,0,0,0,9.313,22H10.5v.5a1.5,1.5,0,0,0,3,0V22h1.187a5.313,5.313,0,0,0,1.541-10.4L13.5,10.856V5h1.187A2.316,2.316,0,0,1,17,7.313V8A1.5,1.5,0,0,0,18.5,9.5Zm-3.118,4.979a2.314,2.314,0,0,1-.7,4.521H13.5V13.965ZM10.5,10.035,8.618,9.521A2.314,2.314,0,0,1,9.313,5H10.5Z" transform="translate(-3.992)" fill="#8ecae6"/>
                      </svg>
                      
                  </span>
                </a>
                <div x-show="open" class="mt-2 space-y-2 px-7 text-right" role="menu" arial-label="Pages">
                  <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                  <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                  <a class="{{ Route::currentRouteName() === '/admin/offer_status/1'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/offer_status/1') }}>

                  <div class="mx-2">تم اختيارها </div>
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
                  </a>
                  <a class="{{ Route::currentRouteName() === '/admin/offer_status/0'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('/admin/offer_status/0') }}>

                    <div class="mx-2">تم الالغاء</div>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
                    </a>
              
               

              
                </div>
              </div>


                {{-- <a class="{{ Route::currentRouteName() === 'comments'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}"
                    href={{ route('comments') }}>

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


                </a>  --}}


             {{-- <a class="{{(Route::currentRouteName()==='offers')?' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100' :'flex justify-end mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'}}"
            href={{ route('offers') }}>
            
            <span class="mx-3">العروض </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="16.017" height="24" viewBox="0 0 16.017 24">
                <path id="dollar" d="M18.5,9.5A1.5,1.5,0,0,0,20,8V7.313A5.32,5.32,0,0,0,14.687,2H13.5V1.5a1.5,1.5,0,1,0-3,0V2H9.313A5.313,5.313,0,0,0,7.772,12.4l2.728.746V19H9.313A2.316,2.316,0,0,1,7,16.687V16a1.5,1.5,0,1,0-3,0v.687A5.32,5.32,0,0,0,9.313,22H10.5v.5a1.5,1.5,0,0,0,3,0V22h1.187a5.313,5.313,0,0,0,1.541-10.4L13.5,10.856V5h1.187A2.316,2.316,0,0,1,17,7.313V8A1.5,1.5,0,0,0,18.5,9.5Zm-3.118,4.979a2.314,2.314,0,0,1-.7,4.521H13.5V13.965ZM10.5,10.035,8.618,9.521A2.314,2.314,0,0,1,9.313,5H10.5Z" transform="translate(-3.992)" fill="#8ecae6"/>
              </svg>
              

            </a>  --}}

            <div x-data="{ isActive: true, open: open }">
                <!-- active classes 'bg-blue-100 dark:bg-blue-600' -->
                <a
                class="{{ Route::currentRouteName() === '/admin/offer_status'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/offer_status') }}
                  @click="$event.preventDefault(); open = !open"
                
                  :class="{ 'bg-[#EFF2F4] dark:bg-gray-700 dark:bg-opacity-25': isActive || open }"
                  role="button"
                  aria-haspopup="true"
                  :aria-expanded="(open || isActive) ? 'true' : 'false'"
                >
                
                  

                  <span aria-hidden="true" class="mr-auto">
                    <!-- active class 'rotate-180' -->
                    <svg
                      class="w-4 h-4 transition-transform transform"
                      :class="{ 'rotate-180': open }"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </span>

                  
                  <span class="mx-3">الشكوى  </span>

                  <svg xmlns="http://www.w3.org/2000/svg" width="23.981" height="15.94" viewBox="0 0 23.981 15.94">
                    <path id="engine-warning"
                        d="M12,20a8.009,8.009,0,0,1-8-8C4.376,1.412,19.626,1.415,20,12a8.009,8.009,0,0,1-8,8ZM12,6c-7.929.252-7.928,11.749,0,12C19.929,17.748,19.928,6.251,12,6Zm1,2H11v5h2Zm0,6H11v2h2Zm11-2a12.026,12.026,0,0,0-2.743-7.637L19.714,5.637a10.052,10.052,0,0,1,0,12.726l1.543,1.274A12.026,12.026,0,0,0,24,12ZM4.286,18.363a10.052,10.052,0,0,1,0-12.726L2.744,4.363a12.065,12.065,0,0,0,0,15.274Z"
                        transform="translate(-0.019 -4.06)" fill="#8ecae6" />
                </svg>

                </a>
                <div x-show="open" class="mt-2 space-y-2 px-7 text-right" role="menu" arial-label="Pages">
                  <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                  <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                  <a class="{{ Route::currentRouteName() === 'admin/Complains/unsolved'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/Complains/unsolved') }}>

                  <div class="mx-2">غير محلولة </div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <g id="Group_60" data-name="Group 60" transform="translate(0 0)">
                      <path id="Path_110" data-name="Path 110" d="M22.707,22.707a1,1,0,0,1-1.414,0l-1.414-1.414-1.415,1.414a1,1,0,1,1-1.439-1.389l.025-.025,1.414-1.414L17.05,18.464a1,1,0,1,1,1.389-1.439l.025.025,1.415,1.414,1.414-1.414a1,1,0,0,1,1.439,1.389l-.025.025-1.414,1.415,1.414,1.414a1,1,0,0,1,.008,1.411A.007.007,0,0,1,22.707,22.707Z" fill="#8ecae6"/>
                      <path id="Path_111" data-name="Path 111" d="M14.035,20.015a5.968,5.968,0,0,1,9.524-4.8,12,12,0,1,0-8.35,8.351A5.951,5.951,0,0,1,14.035,20.015ZM13,12.022a1,1,0,0,1-.294.708L9.7,15.736a1,1,0,0,1-1.416-1.417L11,11.607V7.013a1,1,0,1,1,2,0Z" fill="#8ecae6"/>
                    </g>
                  </svg>
                   </a>
                  <a class="{{ Route::currentRouteName() === 'admin/Complains/solved'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href={{ url('admin/Complains/solved') }}>

                    <div class="mx-2">تم حلها  </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <g id="Group_59" data-name="Group 59" transform="translate(0 0)">
                          <path id="Path_108" data-name="Path 108" d="M18.951,23h-.033a1.872,1.872,0,0,1-1.344-.6l-1.918-1.881a1,1,0,0,1,.022-1.414l0,0a1,1,0,0,1,1.41.024l1.861,1.823,3.341-3.341a1,1,0,0,1,1.414,1.414l-3.421,3.421A1.87,1.87,0,0,1,18.951,23Z" fill="#8ecae6"/>
                          <path id="Path_109" data-name="Path 109" d="M14.035,20.015a5.968,5.968,0,0,1,9.524-4.8,12,12,0,1,0-8.35,8.351A5.951,5.951,0,0,1,14.035,20.015ZM13,12.022a1,1,0,0,1-.294.708L9.7,15.736a1,1,0,0,1-1.416-1.417L11,11.607V7.013a1,1,0,1,1,2,0Z" fill="#8ecae6"/>
                        </g>
                      </svg>
                         </a>
              
               

              
                </div>
              </div>




                <a class="{{ Route::currentRouteName() === '/logout'? ' flex justify-end mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-[#8ecae6]': 'flex justify-end mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}"
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


<style>


    /* Demonstrate a "mostly customized" scrollbar
     * (won't be visible otherwise if width/height is specified) */
     .mostly-customized-scrollbar::-webkit-scrollbar {
      width: 5px;
      height: 8px;
      direction: rtl;
      background-color: #fff; /* or add it to the track */
    }
    
    /* Add a thumb */
    .mostly-customized-scrollbar::-webkit-scrollbar-thumb {
      background: #3A9CB3;
    }
    
</style>



<script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        let user="{{{(Auth::user()) ? Auth::user()->id : 0 }}}";
        let src="{{asset('images/'.Auth::user()->image )}}";
        let user_name=  "{{Auth::user()->name }}";
    </script>
    <script src="{{ asset('js/realtime_notification.js') }}" ></script>
