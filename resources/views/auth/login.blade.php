<link rel="stylesheet" href=' {{ asset('auth_assets/css/style.css') }} '>


<body>

    <div class="loginContainer">
        <div class=" img-squares"><img src="{{ asset('auth_assets/svg/enLogo.svg')}}" alt=""></div>
        <div class="login-box">
            <div class="logo-container">
                <div class="login_icon_box">
                    <img src=" {{ asset('auth_assets/svg/logo.svg')}}" alt="">
                </div>
            </div>
            <h2>تسجيل الدخول</h2>
         
            <form method="POST" action="{{ route('login.custom') }}">
                 @csrf 
               
            
   

    
                <div class="user-box">
                    <div class="inputContainer">
                        <input id="email" name="email" class="form-control">
                       
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <div class='dan_mesg_po'>{{ $message }}</div>
                            </span> 
                            @enderror 
                        <label>عنوان البريد الالكتروني</label>
                    </div>
                   

                </div>
                <div class="user-box">
                    <div class="inputContainer">

                        <input type="password" name="password" type="password" class="form-control ">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <div class='dan_mesg_po'>{{ $message }}</div>
                           <span class="invalid-feedback" role="alert"> 
                            @enderror 

                        <label>كلمة السر </label>
                    </div>
                    @if (session('status'))
                    <div class="text-success">
                      
                    </div>
                    @elseif(session('failed'))
                    <div class="invalid-feedback" style="color: rgb(247, 84, 84)">
                        <span class="invalid-feedback" role="alert">
تاكد من بريدك الالكتروني او كلمة السر                        </span> 

                    </div>
                    
                @endif
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
            <div class="login_links">
                <div>
                    {{-- @if (Route::has('password.request'))  --}}
                    <a class="btn from-top" href="{{ route('password.request') }}">
                            نسيت كلمة المرور
                        </a>
                     {{-- @endif  --}}
                </div>
                <a href="/register" class="btn from-top">إنشاء حساب</a>
            </div>

        </div>
</body>