<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enjezle</title>
    
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>

    <div class="hero_section">
        <nav>
            <div class="logo">
                <a href="{{ route('home') }}"> <img src="{{ asset('svg/logo.svg') }}" alt=""></a>
            </div>
            <div class="hamburger">
                <div class="bars1"></div>
                <div class="bars2"></div>
                <div class="bars3"></div>
            </div>
            <ul class="nav-links" >
                @auth
                <li class="dropdown dropdown-notification nav-item  dropdown-notifications">
                  <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                    <i class="fa fa-bell"> </i>
                    <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow   notif-count" data-count=" {{ $notifications->count()}}">
                      {{ $notifications->count()}}
                    </span>
                  </a>
                  <div id="counter_notify"></div>
                  <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right" id="notify_body" aria-labelledby="dropdown">
                    @forelse ($notifications as $item)
                    <li class="notification active">
    
                      <div class="media">
                        <div class="media-left">
                          <div class="media-object">
                            <h5><a href="readComment/" class="nav-link">
                                {{ $item->id }}</a></h5>
                          </div>
                        </div>
                        <div class="media-body">
                          <strong class="notification-title" id="messege">
                            {{ $item->body }}</strong>
                          <!--p class="notification-desc">Extra description can go here</p-->
                          <div class="notification-meta">
                            <small class="timestamp" id="id">
                              {{ $item->id }}</small>
                          </div>
                        </div>
                      </div>
                    </li>
                    @empty
    
                    @endforelse
    
    
                  </ul>
    
                </li>
                <div id="id"></div>
                <div id="message"></div>
    
                @endauth
                <li><a href="">بحث عن منجز</a></li>
                <li><a href="{{ route('projects.index') }}">تصفح المشاريع</a></li>
                <li><a href="{{ route('projects.create') }}">اضف مشروع</a></li>
                @auth

                    <li>
                        <div class=''><a href='{{ route('user_dashboard') }}' class='btn_img'>
                                <div class='img_profile'><img src='{{ asset('images/'.Auth::user()->image) }}'></div>
                            </a></div>
                    @endauth
                    @guest
                    <li><a href="{{ route('login') }}">تسجيل دخول</a></li>
                    <li><a href="{{ route('register') }}" class="login-button"> إنشاء حساب</a></button>
                    @endguest
                </li>
            </ul>
            </ul>
        </nav>

    </div>
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
    <script nomodule src="{{ asset('js/home.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        let user="{{{(Auth::user()) ? Auth::user()->id : 0 }}}";
        
    </script>
    <script src="{{ asset('js/realtime_notification.js') }}" ></script>
   
</body>

</html>
