<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('auth_assets/css/style.css ')}}">



    <div class="loginContainer">

        <!-- @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
           
            @endif
     -->


        <div class=" img-squares"><img src="{{ asset('auth_assets/svg/enLogo.svg')}}" alt=""></div>
        <div class="login-box">
            <div class="logo-container">
                <div class="login_icon_box">
                    <img src="{{ asset('auth_assets/svg/logo.svg')}}" alt="">
                </div>
            </div>
            <h2>تغيير كلمة المرور
            </h2>
            <form method="POST" action="{{ route('update-password') }}">
                @csrf
                @if (session('status'))
                <small class="text-success">
                    {{ session('status') }}
                </small>
            @endif
                <div class="user-box">
                   
                    <input id="password" type="password"  name=" old_password" class="form-control " required autocomplete="new-password">

                    <label>  كلمة السرالقديمة</label>
                    @if (session('error'))
                    <small class="text-danger">
                            {{ session('error') }}
               
                    </small>
                @endif
                   

                </div>
                <div class="user-box">
                    <input id="password" type="password" class="form-control " name="new_password" required autocomplete="new-password">
                    <label>كلمة السر الجديدة</label>
                    <!-- هنا ي سلمان تظهر  رسالة الخطا افتح التعليق -->
                    @error('new_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                 
                </div>
                <div class="user-box">
                    <input type="password" id="password-confirm" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new-password">
                    <label> تاكيد كلمة السر</label>
                    <!-- هنا ي سلمان تظهر  رسالة الخطا افتح التعليق -->
                   
                </div>

                <div class='btn-cont'>
                    <button class='btn' href='#' type="submit">
                    تغيير كلة السر 
                    <span class='line-1'></span>
                    <span class='line-2'></span>
                    <span class='line-3'></span>
                    <span class='line-4'></span>
                </button>
                </div>

            </form>
            <div class="login_links">
                <a href="/register" class="btn from-top">تسجيل دخول</a>

            </div>
        </div>
    </div>

</body>

</html>