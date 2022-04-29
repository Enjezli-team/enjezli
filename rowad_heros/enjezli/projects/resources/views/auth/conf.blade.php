<link rel="stylesheet" href=" {{ asset('auth_assets/css/style.css')}}">


<body>

    <div class="loginContainer">
        <div class=" img-squares"><img src=" {{ asset('auth_assets/svg/enLogo.svg')}}" alt=""></div>
        <div class="login-box ">
            <div class="logo-container rest-box ">
                <div class="login_icon_box">
                    <img src=" {{ asset('auth_assets/svg/logo.svg')}}" alt="">
                </div>
            </div>
            <form class="p-3 mt-3" method="POST" action="">
                <!-- @csrf -->
                <div class="user-box">
                    <input type="email" name="email" id="email" placeholder="">
                    <label> ادخل عنوان بريدك الالكتروني </label>
                    <!-- هنا ي سلمان تظهر  رسالة الخطا افتح التعليق -->

                    <!-- @error('email')
                     <div class=" dan_mesg_po" role="alert">
                        {{ $message }}
                    </div>
                    @enderror -->
                </div>

                <div class='btn-cont'>
                    <button class='btn' href='#' type="submit">
                        تسجيل
                        <span class='line-1'></span>
                        <span class='line-2'></span>
                        <span class='line-3'></span>
                        <span class='line-4'></span>
                    </button>
                </div>
            </form>


        </div>
</body>