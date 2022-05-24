 <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('svg/logo.svg') }}">

    <title>Enjezle</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
{{--
<body>
    <nav class="nav_header">
        <div class="containe">
            <div>
                <div class="logo">
                    <a href="/"><img src="{{ asset('svg/logo.svg') }}" alt=""></a>
                </div>
            </div>
            <div class="main_list" id="mainListDiv">
                <ul class="nav-links">
                    <li><a href="{{ route('providers') }}">بحث عن منجز</a></li>
                    <li><a href="/projects">تصفح المشاريع</a></li>
                    <li><a href="{{ route('createProject') }}">اضف مشروع</a></li>

                    @auth

                        <li>
                            <div class=''><a href='/profiles/{{ Auth::user()->id }}' class='btn_img'>
                                    <div class='img_profile'><img src='{{ asset('img/1.png') }}'></div>
                                </a></div>
                        @endauth
                        @guest
                        <li><a href="{{ route('login') }}">تسجيل دخول</a></li>
                        <li><a href="{{ route('register') }}" class="login-button"> إنشاء حساب</a></button>
                        @endguest
                    </li>
                </ul>
            </div>
            <div class="media_button">
                <button class="main_media_button" id="mediaButton">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>



    <div class="svg-container">
        <div class="svg">

            <ion-icon class='social' name="logo-facebook"></ion-icon>

        </div>
        <div class="svg">
            <ion-icon class='social' name="logo-twitter"></ion-icon>

        </div>

        <div class="svg">
            <ion-icon class='social' name="logo-behance"></ion-icon>
        </div>

    </div>
    <main>
        @yield('content')
    </main>
    <div class="pg-footer">
        <footer class="footer">

            <div class="footer_content">
                <div>
                    <h4>إنجزلي</h4>
                    <ul>
                        <li><a href="">عن إنجزلي
                            </a></li>
                        <li><a href=""> الأسئلة الشائعة

                            </a></li>
                        <li><a href="">ضمان حقوقك

                            </a></li>
                        <li><a href="">شروط الاستخدام

                            </a></li>
                        <li><a href=""> بيان الخصوصية


                            </a></li>
                    </ul>
                </div>
                <div>
                    <h4>مشاريع</h4>
                    <ul>
                        <li><a href="">
                                مشاريع أعمال

                            </a></li>
                        <li><a href="">
                                مشاريع تسويق

                            </a></li>
                        <li><a href="">
                                مشاريع تصميم

                            </a></li>
                        <li><a href="">
                                مشاريع هندسة وعمارة

                            </a></li>
                        <li><a href="">
                                مشاريع برمجة

                            </a></li>
                        <li><a href="">
                                مشاريع كتابة وترجمة

                            </a></li>
                        <li><a href="">
                                مشاريع دعم ومساعدة

                            </a></li>
                        <li><a href="">
                                مشاريع تدريب

                            </a></li>
                        <li><a href=""> التصنيفات


                            </a></li>
                    </ul>
                </div>
                <div>
                    <h4>روابط</h4>
                    <ul>

                        <li><a href="">
                                معرض الأعمال

                            </a></li>
                        <li><a href="">
                                مدونة مستقل

                            </a></li>
                        <li><a href="">
                                مركز المساعدة



                            </a></li>
                    </ul>
                </div>
                <div>
                    <div class='soc_container'>
                        <h4>تابعنا على:</h4>
                        <ul>

                            <div class="svg-container">
                                <div class="svg">

                                    <ion-icon class='social' name="logo-facebook"></ion-icon>

                                </div>
                                <div class="svg">
                                    <ion-icon class='social' name="logo-twitter"></ion-icon>

                                </div>

                                <div class="svg">
                                    <ion-icon class='social' name="logo-behance"></ion-icon>
                                </div>

                            </div>
                        </ul>
                    </div>
                    <div>
                        <h4>وسائل الدفع المتاحة</h4>
                        <ul>

                            <li><a href="">
                                    معرض الأعمال

                                </a></li>
                            <li><a href="">
                                    مدونة مستقل

                                </a></li>
                            <li><a href="">
                                    مركز المساعدة



                                </a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="footer_copy_right">
                <p>&copy;حقوق الطبع محفوظة
                    <Span>إنجزلي</Span>
                </p>
            </div>
        </footer>
    </div>


    <script data-optimized="1"
        src="https://multiwebpress.com/wp-content/litespeed/js/5780facee2c85b4f45eda135e587773d.js?ver=7773d"></script>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js/home.js') }}">
        var mainListDiv = document.getElementById("mainListDiv"),
            mediaButton = document.getElementById("mediaButton");

        mediaButton.onclick = function() {

            "use strict";

            mainListDiv.classList.toggle("show_list");
            mediaButton.classList.toggle("active");

        };
    </script>
    <script src="{{ asset('js/search.js') }}"></script> --}}





    <!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"
></script>


<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css"
  rel="stylesheet"
/>
    <!-- Navbar -->
<nav class=" navbar navbar-expand-lg navbar-light" style="

width: 100%;
    height: 43px;
    /* line-height: 65px; */
    text-align: center;
    z-index: 1111;
    position: fixed;
    padding:0;
    top: 0;
    ">
    <!-- Container wrapper -->
    <div class="container-fluid " style="
    background: linear-gradient(45deg,#166a7f, transparent)!important;">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="{{ asset('svg/logo.svg') }}"
            height=""
            alt="MDB Logo"
            loading="lazy"
          />
          
        </a>
        <!-- Left links -->
        <ul class="navbar-nav m-auto  mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('providers') }}">بحث عن منجز</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/projects">تصفح المشاريع</a>
          </li>
          <li class="nav-item">
              
            <a class="nav-link" href="@auth{{Auth::user()->id ==2 }}@endauth? ' {{route('createProject') }}: '{{route('home') }}' ">
                
                اضف مشروع

            </a>
            
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      @auth

    

              <div class="d-flex align-items-center">
                <!-- Icon -->
               
                <!-- Notifications -->
                <div class="dropdown">
                  <a
                    class="text-reset me-4 ms-4 dropdown-toggle hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <i class="fas fa-bell" style="font-size: 25px"></i>
                    <span class="badge rounded-pill  badge-notification bg-white text-black" style="padding:5px!important"><small>2</small></span>
                  </a>
                  <ul
                    class="dropdown-menu dropdown-menu-start m-auto"
                    aria-labelledby="navbarDropdownMenuLink"
                  >
                    <li>
                      <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                  </ul>
                </div>
                <!-- Avatar -->
                <div class="dropdown">
                  <a
                    class="dropdown-toggle d-flex me-4 ms-4 align-items-center hidden-arrow"
                    href="/profiles/{{ Auth::user()->id }}"
                    id="navbarDropdownMenuAvatar"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <img
                      src="{{ asset('img/1.png') }}"
                      class="rounded-circle"
                      height="35"
                      alt="Black and White Portrait of a Man"
                      loading="lazy"
                    />
                  </a>
                  <ul
                    class="dropdown-menu dropdown-menu-start"
                    aria-labelledby="navbarDropdownMenuAvatar"
                  >
                    <li>
                      <a class="dropdown-item" href="#">My profile</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Logout</a>
                    </li>
                  </ul>
                </div>
              </div>
      @endauth
      @guest
      <ul class="navbar-nav m-auto  mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">تسجيل دخول</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}"> إنشاء حساب </a>
          </li>
      </ul>
     
      @endguest
   
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>

  <main>
    @yield('content')
</main>
<div class="pg-footer">
    <footer class="footer">

        <div class="footer_content">
            <div>
                <h4>إنجزلي</h4>
                <ul>
                    <li><a href="">عن إنجزلي
                        </a></li>
                    <li><a href=""> الأسئلة الشائعة

                        </a></li>
                    <li><a href="">ضمان حقوقك

                        </a></li>
                    <li><a href="">شروط الاستخدام

                        </a></li>
                    <li><a href=""> بيان الخصوصية


                        </a></li>
                </ul>
            </div>
            <div>
                <h4>مشاريع</h4>
                <ul>
                    <li><a href="">
                            مشاريع أعمال

                        </a></li>
                    <li><a href="">
                            مشاريع تسويق

                        </a></li>
                    <li><a href="">
                            مشاريع تصميم

                        </a></li>
                    <li><a href="">
                            مشاريع هندسة وعمارة

                        </a></li>
                    <li><a href="">
                            مشاريع برمجة

                        </a></li>
                    <li><a href="">
                            مشاريع كتابة وترجمة

                        </a></li>
                    <li><a href="">
                            مشاريع دعم ومساعدة

                        </a></li>
                    <li><a href="">
                            مشاريع تدريب

                        </a></li>
                    <li><a href=""> التصنيفات


                        </a></li>
                </ul>
            </div>
            <div>
                <h4>روابط</h4>
                <ul>

                    <li><a href="">
                            معرض الأعمال

                        </a></li>
                    <li><a href="">
                            مدونة مستقل

                        </a></li>
                    <li><a href="">
                            مركز المساعدة



                        </a></li>
                </ul>
            </div>
            <div>
                <div class='soc_container'>
                    <h4>تابعنا على:</h4>
                    <ul>

                        <div class="svg-container">
                            <div class="svg">

                                <ion-icon class='social' name="logo-facebook"></ion-icon>

                            </div>
                            <div class="svg">
                                <ion-icon class='social' name="logo-twitter"></ion-icon>

                            </div>

                            <div class="svg">
                                <ion-icon class='social' name="logo-behance"></ion-icon>
                            </div>

                        </div>
                    </ul>
                </div>
                <div>
                    <h4>وسائل الدفع المتاحة</h4>
                    <ul>

                        <li><a href="">
                                معرض الأعمال

                            </a></li>
                        <li><a href="">
                                مدونة مستقل

                            </a></li>
                        <li><a href="">
                                مركز المساعدة



                            </a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="footer_copy_right">
            <p>&copy;حقوق الطبع محفوظة
                <Span>إنجزلي</Span>
            </p>
        </div>
    </footer>
</div>


<script data-optimized="1"
    src="https://multiwebpress.com/wp-content/litespeed/js/5780facee2c85b4f45eda135e587773d.js?ver=7773d"></script>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{ asset('js/home.js') }}">
    var mainListDiv = document.getElementById("mainListDiv"),
        mediaButton = document.getElementById("mediaButton");

    mediaButton.onclick = function() {

        "use strict";

        mainListDiv.classList.toggle("show_list");
        mediaButton.classList.toggle("active");

    };
</script>
<script src="{{ asset('js/search.js') }}"></script> 
  <!-- Navbar -->