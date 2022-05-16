<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

<!--<title>Dashboard Sidebar Menu</title>-->

<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <!--<img src="logo.png" alt="">-->
            </span>

            <div class="text logo-text">
                <div class='img_prrofile'><img src='{{ asset('img/1.png') }}'></div>
                <span class="person_name">ثريا عبدالمجيد </span>
            </div>
        </div>

        <i class=' toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">



            <ul class="menu-links">
                <li class="nav-link">
                    <a class="{{ Route::currentRouteName() === '/' ? 'activee  flex flex-align-center justify' : ' nav__menu  flex flex-align-center justify' }}"
                        href="{{ route('home') }}">
                        <i class='bx bx-home-alt icon'></i>


                        <span class="text nav-text">الرئيسية</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a class="{{ Route::currentRouteName() === '/user_dashboard' ? 'activee  flex flex-align-center justify' : ' nav__menu  flex flex-align-center justify' }}"
                        href="/profiles">
                        <i class='bx bx-user icon'></i>

                        <span class="text nav-text">ملفي الشخصي</span>
                    </a>
                </li>


                <li class="nav-link">



                    <a class="{{ Route::currentRouteName() === '/user-work' ? 'activee  flex flex-align-center justify' : ' nav__menu  flex flex-align-center justify' }}"
                        href="{{ route('user_work') }}">
                        <i class='bx bxs-spreadsheet icon'></i> <span class="text nav-text">اعمالي</span>

                    </a>

                </li>

                <li class="nav-link">
                    <a class="{{ Route::currentRouteName() === '/' ? 'activee  flex flex-align-center justify' : ' nav__menu  flex flex-align-center justify' }}"
                        href="{{ route('home') }}">
                        <i class='bx bx-bell icon'></i>
                        <span class="text nav-text">الاشعارات</span>
                    </a>
                </li>


                <li class="nav-link">
                    <a class="{{ Route::currentRouteName() === '/user_projects' ? 'activee  flex flex-align-center justify' : ' nav__menu  flex flex-align-center justify' }}"
                        href="{{ route('My_projects') }}">
                        <i class='bx bx-briefcase icon'></i>
                        <span class="text nav-text">مشاريعي</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a class="{{ Route::currentRouteName() === '/user_offer' ? 'activee  flex flex-align-center justify' : ' nav__menu  flex flex-align-center justify' }}"
                        href="{{ route('offers.index') }}">
                        <i class='bx bx-purchase-tag-alt icon'></i>
                        <span class="text nav-text">عروضي</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Route::currentRouteName() === '/user_dashboard' ? 'activee  flex flex-align-center justify' : ' nav__menu  flex flex-align-center justify' }}"
                        href="{{ route('user_dashboard') }}">

                        <i class='bx bx-wallet icon'></i>
                        <span class="text nav-text">المحفظة</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a class="{{ Route::currentRouteName() === '/logout' ? 'activee  flex flex-align-center justify' : ' nav__menu  flex flex-align-center justify' }}"
                    href="{{ route('logout') }}">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">تسجيل خروج</span>
                </a>
            </li>

            <!--li class="mode d_position">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text ">الوضع الليلي</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li-->

        </div>
    </div>

</nav>

<main>
    @yield('content')</main>

<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");


    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    })

    searchBtn.addEventListener("click", () => {
        sidebar.classList.remove("close");
    })

    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            modeText.innerText = "Light mode";
        } else {
            modeText.innerText = "Dark mode";

        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
