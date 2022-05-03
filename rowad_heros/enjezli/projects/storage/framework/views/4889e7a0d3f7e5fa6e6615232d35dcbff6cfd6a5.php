<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href='  <?php echo e(asset('auth_assets/css/style.css')); ?> '>



<div class="loginContainer sign-up-container">
    <div class=" img-squares"><img src="<?php echo e(asset('auth_assets/svg/enLogo.svg')); ?>" alt=""></div>

    <div class="login-box sign-up">
        <div class="logo-container">

            <div class="login_icon_box">
                <img src="<?php echo e(asset('auth_assets/svg/logo.svg')); ?>" alt="">
            </div>
        </div>
        <h2> إنشاء حساب
        </h2>
        <form method="POST" action="<?php echo e(route('register.custom')); ?>">

            <?php echo csrf_field(); ?>
             <!-- Way 1: Display All Error Messages -->
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
                <input id="name" name="name" type="text" class="form-control">
                <label> الاسم</label>
                 <?php $__errorArgs = ['name'];
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
                <span id='name-error' class="invalid-feedback dan_mesg_po" role="alert">
                   
                </span>

            </div>
            <div class="user-box">
                <input id="email" name="email" class="form-control">
                <label>عنوان البريد الالكتروني</label>
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
                <span style="display:none" id='email-error' class="invalid-feedback dan_mesg_po" role="alert">
                    
                </span>
            </div>
            <div class="user-box">
                <input id="password" name="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">
                <label>كلمة السر</label>
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
                <span style="display:none" id='password-error' class="invalid-feedback dan_mesg_po" role="alert">
                    
                </span>
            </div>
            <div class="user-box">
                <input type="password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <label> تاكيد كلمة السر</label>
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
</div><?php /**PATH C:\Users\DELL\Desktop\Road^_^\Enjezli-new\rowad_heros\enjezli\projects\resources\views/auth/register.blade.php ENDPATH**/ ?>