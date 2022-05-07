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
           
            @if(session('status'))
            <div class="text-success">
            لم يتم الرسال لرجاء اعادة المحاوله
                   
        </div>
                
        @endif
            <form action="{{ route('password.update') }}" enctype="multipart/form-data"  method="POST">
                @csrf 
                
                <input id="token" type="hidden"  name="token" value="{{ $token }}">            
                <div class="user-box">
                    <input id="email" type="email" class="form-control" name="email" required >
                    
                    @if ($errors->has('email'))
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif 
                    <label>  ادخل ايميلك</label>
                    <!-- هنا ي سلمان تظهر  رسالة الخطا افتح التعليق -->

                  
                </div>
                <div class="user-box">
                    <input id="password" type="password" class="form-control " name="password" required >
                    
                    @if ($errors->has('password'))
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                @endif 
                    <label>كلمة السر الجديدة</label>
                    <!-- هنا ي سلمان تظهر  رسالة الخطا افتح التعليق -->

                </div>
                <div class="user-box">
                    <input type="password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
                  
                    @if ($errors->has('password_confirmation'))
                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                @endif 

                    <label> تاكيد كلمة السر</label>
                    <!-- هنا ي سلمان تظهر  رسالة الخطا افتح التعليق -->
                   
                </div>

                <div class='btn-cont'>
                    <button class='btn' type="submit">
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