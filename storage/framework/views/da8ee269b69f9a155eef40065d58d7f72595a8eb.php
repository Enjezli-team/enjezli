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
            <?php if(session('status')): ?>
                <div class="text-success">
                تم الارسال بنجاح يرجى مراجعة ايميلك
                  
                </div>
                <?php elseif(session('failed')): ?>
                <div class="text-success">
                لم يتم الرسال لرجاء اعادة المحاوله
                   
                </div>
                
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('login.custom')); ?>">
                 <?php echo csrf_field(); ?> 
               
            
   

    
                <div class="user-box">
                    <div class="inputContainer">
                        <input id="email" name="email" class="form-control">
                       
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                <div class='dan_mesg_po'><?php echo e($message); ?></div>
                            </span> 
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                        <label>عنوان البريد الالكتروني</label>
                    </div>
                   

                </div>
                <div class="user-box">
                    <div class="inputContainer">

                        <input type="password" name="password" type="password" class="form-control ">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                <div class='dan_mesg_po'><?php echo e($message); ?></div>
                            </span> 
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 

                        <label>كلمة السر </label>
                    </div>
                   
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
</body><?php /**PATH C:\Users\DELL\Desktop\newstrongEnergy\last\Enjezli-new\resources\views/auth/login.blade.php ENDPATH**/ ?>