<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enjezle</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
</head>

<body>

    <div class="hero_section">
        <nav>
            <div class="logo">
                <a href="<?php echo e(route('home')); ?>"> <img src="<?php echo e(asset('svg/logo.svg')); ?>" alt=""></a>
            </div>
            <div class="hamburger">
                <div class="bars1"></div>
                <div class="bars2"></div>
                <div class="bars3"></div>
            </div>
            <ul class="nav-links">
                <li><a href="">بحث عن منجز</a></li>
                <li><a href="<?php echo e(route('projects.index')); ?>">تصفح المشاريع</a></li>
                <li><a href="<?php echo e(route('projects.create')); ?>">اضف مشروع</a></li>
                <?php if(auth()->guard()->check()): ?>

                    <li>
                        <div class=''><a href='<?php echo e(route('user_dashboard')); ?>' class='btn_img'>
                                <div class='img_profile'><img src='<?php echo e(asset('img/1.png')); ?>'></div>
                            </a></div>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>">تسجيل دخول</a></li>
                    <li><a href="<?php echo e(route('register')); ?>" class="login-button"> إنشاء حساب</a></button>
                    <?php endif; ?>
                </li>
            </ul>
            </ul>
        </nav>

    </div>
    <div class="svg-container">
        <div class="svg">

            <ion-icon class='social' name="logo-facebook"></ion-icon>

        </div>
        <div class="svg">
            <ion-icon class='social' name="logo-twitter"></ion-icon>

        </div>

        <div class="svg">
            <ion-icon class='social' name="logo-behance"></ion-icon>
        </div>

    </div>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <div class="pg-footer">
        <footer class="footer">

            <div class="footer_content">
                <div>
                    <h4>إنجزلي</h4>
                    <ul>
                        <li><a href="">عن إنجزلي
                            </a></li>
                        <li><a href=""> الأسئلة الشائعة

                            </a></li>
                        <li><a href="">ضمان حقوقك

                            </a></li>
                        <li><a href="">شروط الاستخدام

                            </a></li>
                        <li><a href=""> بيان الخصوصية


                            </a></li>
                    </ul>
                </div>
                <div>
                    <h4>مشاريع</h4>
                    <ul>
                        <li><a href="">
                                مشاريع أعمال

                            </a></li>
                        <li><a href="">
                                مشاريع تسويق

                            </a></li>
                        <li><a href="">
                                مشاريع تصميم

                            </a></li>
                        <li><a href="">
                                مشاريع هندسة وعمارة

                            </a></li>
                        <li><a href="">
                                مشاريع برمجة

                            </a></li>
                        <li><a href="">
                                مشاريع كتابة وترجمة

                            </a></li>
                        <li><a href="">
                                مشاريع دعم ومساعدة

                            </a></li>
                        <li><a href="">
                                مشاريع تدريب

                            </a></li>
                        <li><a href=""> التصنيفات


                            </a></li>
                    </ul>
                </div>
                <div>
                    <h4>روابط</h4>
                    <ul>

                        <li><a href="">
                                معرض الأعمال

                            </a></li>
                        <li><a href="">
                                مدونة مستقل

                            </a></li>
                        <li><a href="">
                                مركز المساعدة



                            </a></li>
                    </ul>
                </div>
                <div>
                    <div class='soc_container'>
                        <h4>تابعنا على:</h4>
                        <ul>

                            <div class="svg-container">
                                <div class="svg">

                                    <ion-icon class='social' name="logo-facebook"></ion-icon>

                                </div>
                                <div class="svg">
                                    <ion-icon class='social' name="logo-twitter"></ion-icon>

                                </div>

                                <div class="svg">
                                    <ion-icon class='social' name="logo-behance"></ion-icon>
                                </div>

                            </div>
                        </ul>
                    </div>
                    <div>
                        <h4>وسائل الدفع المتاحة</h4>
                        <ul>

                            <li><a href="">
                                    معرض الأعمال

                                </a></li>
                            <li><a href="">
                                    مدونة مستقل

                                </a></li>
                            <li><a href="">
                                    مركز المساعدة



                                </a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="footer_copy_right">
                <p>&copy;حقوق الطبع محفوظة
                    <Span>إنجزلي</Span>
                </p>
            </div>
        </footer>
    </div>


    <script data-optimized="1"
        src="https://multiwebpress.com/wp-content/litespeed/js/5780facee2c85b4f45eda135e587773d.js?ver=7773d"></script>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script nomodule src="<?php echo e(asset('js/home.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\Users\DELL\Desktop\newstrongEnergy\last\Enjezli-new\resources\views/website/layouts/master.blade.php ENDPATH**/ ?>