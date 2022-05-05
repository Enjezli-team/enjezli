<link rel="stylesheet" href="<?php echo e(asset('auth_assets/profile_assests/css/header.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('auth_assets/profile_assests/css/profile_show.css')); ?>">

<div class="profile">
    <div class="personal_info_container">

        <div class="profile_img"> <img src="<?php echo e(asset('images/'.$data->image)); ?>" alt=""></div>
        <div class="padding info_container ">
            <div class="personal_basic_info">
                <div class="profile_name"><?php echo e($data->name); ?></div>
                <div class="personal_information">
                    <div class="profile_phone"><?php echo e($data->sal_profile->phone); ?></div>
                    <ul class="social">
                        <li>
                            <a href="<?php echo e($data->sal_profile->facebook); ?>">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e($data->sal_profile->tweeter); ?>">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e($data->sal_profile->github); ?>">
                                <ion-icon name="mail-outline"></ion-icon>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>


            <div>

                <div class="desc" style=" overflow-wrap: break-word;
                    word-wrap: break-word;
                     : auto;"><?php echo e($data->sal_profile->description); ?></div>

            </div>

        </div>

        <div class="edit_pro_container">
            <button class="show_more " type='submit'> <a href="/profiles/<?php echo e($data->sal_profile->id); ?>/edit"
                    class="edit_pro button button-1">تعديل</a></button>

        </div>
    </div>



    <div class="d-grid">
        <div class="personal_info_container myworks">
            <header class="flex_between">
                <h3> احدث أعمالي </h3>

                <div>
                    <a href="/works" class="show_more show_more_1 ">
                        عرض كل الاعمال

                    </a>


                </div>

            </header>
            <div class='p-relative m_21'>

                <div class="hr">
                    <div class="count_project"> <?php echo e($data->sal_works->count()); ?>

                    </div>
                </div>

                <div class="jobs">
                   
                    <?php $__empty_1 = true; $__currentLoopData = $data->sal_works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                   
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name"><?php echo e($w->title); ?></h5>
                                <h6 class="project_date"><?php echo e($w->created_at); ?></h6>
                            </div>
                            <div class="operation">

                                <a href="/works/<?php echo e($w->id); ?>/edit"> <span>
                                        <ion-icon class="edit" name="create-outline"></ion-icon>
                                    </span></a>
                                <a href="/works/<?php echo e($w->id); ?>"> <span>
                                        <ion-icon class="delete" name="trash-outline"></ion-icon>
                                    </span></a>
                                <a href="/works/<?php echo e($w->id); ?>"> <span>
                                        <ion-icon class="more" name="ellipsis-vertical-circle-outline">
                                        </ion-icon>
                                    </span></a>
                            </div>
                        </div>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name"> لا يوجد عمل جديد</h5>
                            </div>
                        </div>
                    <?php endif; ?>
                  
                </div>

            </div>
        </div>
        <div class="personal_info_container myworks">
            <header class="flex_between">
                <h3>احدث مشاريعي</h3>

                <div>
                    <button class='show_more show_more_1 '><a href="/works">
                        عرض كل مشاريعي</a>


                    </button>


                </div>

            </header>
            <div class='p-relative m_21'>

                <div class="hr">
                    <div class="count_project"> <?php echo e($data->sal_projects_provider->count()); ?></div>
                </div>
            </div>
            <div class="jobs">
                <?php $__empty_1 = true; $__currentLoopData = $data->sal_projects_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name"><?php echo e($p->title); ?></h5>
                            <h6 class="project_date"><?php echo e($p->created_at); ?></h6>
                        </div>
                        <div class="operation">

                            <a href="/works/<?php echo e($p->id); ?>/edit"> <span>
                                    <ion-icon class="edit" name="create-outline"></ion-icon>
                                </span></a>
                            <a href="/works/<?php echo e($p->id); ?>"> <span>
                                    <ion-icon class="delete" name="trash-outline"></ion-icon>
                                </span></a>
                            <a href="/works/<?php echo e($p->id); ?>"> <span>
                                    <ion-icon class="more" name="ellipsis-vertical-circle-outline"></ion-icon>
                                </span></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name"> لا يوجد مشاريع جديدة</h5>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
        <div class="personal_info_container myworks">
            <header class="flex_between">
                <h3>العروض </h3>

                <div>
                    <button class='show_more show_more_1 '><a href="/offers">
                        عرض كل مشاريعي</a>


                    </button>


                </div>

            </header>
            <div class='p-relative m_21'>

                <div class=" hr">
                    <div class="count_project"> <?php echo e($data->sal_offers->count()); ?></div>
                </div>

                <div class="jobs">
                    <?php $__empty_1 = true; $__currentLoopData = $data->sal_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name"><?php echo e($o->title); ?></h5>
                                <h6 class="project_date"><?php echo e($o->created_at); ?></h6>
                            </div>
                            <div class="operation">

                                <a href="/offers/<?php echo e($o->id); ?>/edit"> <span>
                                        <ion-icon class="edit" name="create-outline"></ion-icon>
                                    </span></a>
                                <a href="/works/<?php echo e($o->id); ?>"> <span>
                                        <ion-icon class="delete" name="trash-outline"></ion-icon>
                                    </span></a>
                                <a href="/works/<?php echo e($o->id); ?>"> <span>
                                        <ion-icon class="more" name="ellipsis-vertical-circle-outline">
                                        </ion-icon>
                                    </span></a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name"> لا يوجد عروض جديدة</h5>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>



        </div>
        <div class="personal_info_container myworks">
            <header class="flex_between">
                <h3>مهارتي </h3>

                <div>
                    <button class="show_more show_more_1 ">
                        عرض مهارتي


                    </button>


                </div>

            </header>
            <div class='p-relative  m_21'>

                <div class="hr">
                    <div class="count_project"> <?php echo e($data->sal_skills->count()); ?></div>
                </div>

                <div class="jobs">
                    <?php $__empty_1 = true; $__currentLoopData = $data->sal_skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name"><?php echo e($s->title); ?></h5>
                                <h6 class="project_date"><?php echo e($s->created_at); ?></h6>
                            </div>
                            <div class="operation">


                                <a href="/works/<?php echo e($s->id); ?>"> <span>
                                        <ion-icon class="delete" name="trash-outline"></ion-icon>
                                    </span></a>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name"> لا يوجد مهارات جديدة</h5>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?php /**PATH D:\Road Project\Enjezli-new\rowad_heros\enjezli\projects\resources\views/website/users/profile/index.blade.php ENDPATH**/ ?>