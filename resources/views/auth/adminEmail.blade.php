<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href=" {{ asset('auth_assets/css/style.css')}}">

<div class="loginContainer verfy">
    <div class=" img-squares"><img src=" {{ asset('auth_assets/svg/enLogo.svg')}}" alt=""></div>
    <div class="login-box">
        <div class="logo-container">
            <div class="login_icon_box">
                <img src=" {{ asset('auth_assets/svg/logo.svg')}}" alt="">
            </div>
        </div>
        <h2>مرحبا{{$data['name']}}</h2>
        <p>هنا بيانات حسابك للدخول الي انجزلي
        </p>
        <p>email:{{$data['email']}}</p>
        <p>password:{{$data['password']}}</p>
    </div>
</div>
