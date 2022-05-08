<link rel="stylesheet" href=" <?php echo e(asset('auth_assets/css/style.css')); ?>">


<body>

    <div class="loginContainer">
        <div class=" img-squares"><img src=" <?php echo e(asset('auth_assets/svg/enLogo.svg')); ?>" alt=""></div>
        <div class="login-box ">
            <div class="logo-container rest-box ">
                <div class="login_icon_box">
                    <img src=" <?php echo e(asset('auth_assets/svg/logo.svg')); ?>" alt="">
                </div>
            </div>
            <?php if(session('status')): ?>
                <div class="text-success">
                تم الارسال بنجاح يرجى مراجعة ايميلك
                  
                </div>
                <?php elseif(session('email')): ?>
                <div class="text-success">
                لم يتم الرسال لرجاء اعادة المحاوله
                   
                </div>
                
            <?php endif; ?>
            <form class="p-3 mt-3" method="POST" action="<?php echo e(route('password.email')); ?>">
                <?php echo csrf_field(); ?> 
               
               
              
                <div class="user-box">
                    <input type="email" name="email" id="email" placeholder="">
                    <label> ادخل عنوان بريدك الالكتروني </label>
                    <!-- هنا ي سلمان تظهر  رسالة الخطا افتح التعليق -->
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
                  
                </div>

                <div class='btn-cont'>
                    <button class='btn'  type="submit">
                        ارسال
                        <span class='line-1'></span>
                        <span class='line-2'></span>
                        <span class='line-3'></span>
                        <span class='line-4'></span>
                    </button>
                </div>
            </form>


        </div>
</body><?php /**PATH C:\Users\DELL\Desktop\newstrongEnergy\last\Enjezli-new\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>