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
    <link rel="stylesheet" href="<?php echo e(asset('auth_assets/css/style.css ')); ?>">



    <div class="loginContainer">

        <!-- <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
           
            <?php endif; ?>
     -->


        <div class=" img-squares"><img src="<?php echo e(asset('auth_assets/svg/enLogo.svg')); ?>" alt=""></div>
        <div class="login-box">
            <div class="logo-container">
                <div class="login_icon_box">
                    <img src="<?php echo e(asset('auth_assets/svg/logo.svg')); ?>" alt="">
                </div>
            </div>
            <h2>تغيير كلمة المرور
            </h2>
           
            <?php if(session('status')): ?>
            <div class="text-success">
            لم يتم الرسال لرجاء اعادة المحاوله
                   
        </div>
                
        <?php endif; ?>
            <form action="<?php echo e(route('password.update')); ?>" enctype="multipart/form-data"  method="POST">
                <?php echo csrf_field(); ?> 
                
                <input id="token" type="hidden"  name="token" value="<?php echo e($token); ?>">            
                <div class="user-box">
                    <input id="email" type="email" class="form-control" name="email" required >
                    <label>  ادخل ايميلك</label>
                    <!-- هنا ي سلمان تظهر  رسالة الخطا افتح التعليق -->

                  
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                        <div class='dan_mesg_po'><?php echo e($message); ?></div>
                    </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>
                <div class="user-box">
                    <input id="password" type="password" class="form-control " name="password" required >
                    <label>كلمة السر الجديدة</label>
                    <!-- هنا ي سلمان تظهر  رسالة الخطا افتح التعليق -->

                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                        <div class='dan_mesg_po'><?php echo e($message); ?></div>
                    </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>
                <div class="user-box">
                    <input type="password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
                    <label> تاكيد كلمة السر</label>
                    <!-- هنا ي سلمان تظهر  رسالة الخطا افتح التعليق -->
                   
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                        <div class='dan_mesg_po'><?php echo e($message); ?></div>
                    </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
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

</html><?php /**PATH C:\Users\DELL\Desktop\newstrongEnergy\last\Enjezli-new\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>