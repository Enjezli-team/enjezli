<link rel="stylesheet" href=' <?php echo e(asset('auth_assets/css/style.css')); ?> '>


<body>

    <div class="loginContainer">
        <div class=" img-squares"><img src="<?php echo e(asset('auth_assets/svg/enLogo.svg')); ?>" alt=""></div>
        <div class="login-box">
            <div class="logo-container">
                <div class="login_icon_box">
                    <img src=" <?php echo e(asset('auth_assets/svg/logo.svg')); ?>" alt="">
                </div>
            </div>
            <h2>تسجيل الدخول</h2>
       
         
            <form method="POST" action="<?php echo e(route('login.custom')); ?>">
                 <?php echo csrf_field(); ?> 
               
            
   

    
                <div class="user-box">
                    <div class="inputContainer">
                        <input id="email" name="email" class="form-control">
                        <?php if($errors->has('email')): ?>
                 <small class="text-danger" style="color: rgb(247, 84, 84)"><?php echo e($errors->first('email')); ?></small>
                  <?php endif; ?> 
                        <label>عنوان البريد الالكتروني</label>
                    </div>
                   

                </div>
                <div class="user-box">
                    <div class="inputContainer">

                        <input type="password" name="password" type="password" class="form-control ">
                    
                        <?php if($errors->has('password')): ?>
                        <small class="text-light" style="color: rgb(247, 84, 84);"><?php echo e($errors->first('password')); ?></small>
                         <?php endif; ?> 
                        <label>كلمة السر </label>
                    </div>
                   
                    <?php if(session('status')): ?>
                    <div class="text-success">
                      
                    </div>
                    <?php elseif(session('error')): ?>
                    <div class="invalid-feedback" style="color: rgb(247, 84, 84)">
                        <span class="invalid-feedback" role="alert">
                            <?php echo e(session('error')); ?> </span> 
        
                    </div>
                    
                    
                <?php endif; ?>
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
                    
                    <a class="btn from-top" href="<?php echo e(route('password.request')); ?>">
                            نسيت كلمة المرور
                        </a>
                     
                </div>
                <a href="/register" class="btn from-top">إنشاء حساب</a>
            </div>

        </div>
</body><?php /**PATH C:\Users\DELL\Desktop\Road\v3\Enjezli-new\resources\views/auth/login.blade.php ENDPATH**/ ?>