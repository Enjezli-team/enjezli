<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href='  {{ asset('auth_assets/css/style.css')}} '>



<div class="loginContainer sign-up-container">
    <div class=" img-squares"><img src="{{ asset('auth_assets/svg/enLogo.svg')}}" alt=""></div>

    <div class="login-box sign-up">
        <div class="logo-container">

            <div class="login_icon_box">
                <img src="{{ asset('auth_assets/svg/logo.svg')}}" alt="">
            </div>
        </div>
        <h2> إنشاء حساب
        </h2>
        <form method="POST" action="{{ route('register.custom') }}">

            @csrf
             <!-- Way 1: Display All Error Messages -->
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif  --}}
            
            <div class="user-box">
                <input id="name" name="name" type="text" class="form-control">
              
                @if ($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @endif 
                <label> الاسم</label>
                
               

            </div>
            <div class="user-box">
                <input id="email" name="email" class="form-control">
                @if ($errors->has('email'))
                 <small class="text-danger">{{ $errors->first('email') }}</small>
                  @endif 
                <label>عنوان البريد الالكتروني</label>
                 @error('email')
                <span class="invalid-feedback" role="alert">
                        <div class='dan_mesg_po'>{{ $message }}</div>
                    </span> 
                    @enderror 
                <span style="display:none" id='email-error' class="invalid-feedback dan_mesg_po" role="alert">
                    
                </span>
            </div>
            <div class="user-box">
                <input id="password" name="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                @if ($errors->has('password'))
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                @endif 
                <label>كلمة السر</label>
               
                <span style="display:none" id='password-error' class="invalid-feedback dan_mesg_po" role="alert">
                    
                </span>
            </div>
            <div class="user-box">
                <input type="password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                @if ($errors->has('password_confirmation'))
                 <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                  @endif 

                <label> تاكيد كلمة السر</label>
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                        <div class='dan_mesg_po'>{{ $message }}</div>
                    </span> @enderror
                <span style="display:none" id='confirm-error' class="invalid-feedback dan_mesg_po" role="alert">
                    
                </span>
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
            <a href="/login" class="btn from-top">تسجيل دخول</a>

        </div>
    </div>
</div>