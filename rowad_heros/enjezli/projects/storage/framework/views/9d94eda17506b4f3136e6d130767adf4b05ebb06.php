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
                 <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
                <div class="user-box">
                    <div class="inputContainer">
                        <input id="email" name="email" class="form-control">
                        <?php if($errors->has('email')): ?> <small class="text-danger"><?php echo e($errors->first('email')); ?></small> <?php endif; ?> 

                        <label>عنوان البريد الالكتروني</label>
                    </div>
                    <!-- <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                            <div class='dan_mesg_po ' > * الأيميل خاطئ
                                
                          </div>

                            
                        </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> -->

                </div>
                <div class="user-box">
                    <div class="inputContainer">

                        <input type="password" name="password" type="password" class="form-control ">
                        <?php if($errors->has('password')): ?> <small class="text-danger"><?php echo e($errors->first('password')); ?></small> <?php endif; ?> 

                        <label>كلمة السر </label>
                    </div>
                    <!-- <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <div class='dan_mesg_po'>* كلمة المرور خاطئة</div>
                    </span>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> -->
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
                     
                    <a class="btn from-top" href="/conf">
                            نسيت كلمة المرور
                        </a>
                    
                </div>
                <a href="/register" class="btn from-top">إنشاء حساب</a>
            </div>

        </div>
</body><?php /**PATH C:\Users\DELL\Desktop\n\Enjezli-new\rowad_heros\enjezli\projects\resources\views/auth/login.blade.php ENDPATH**/ ?>