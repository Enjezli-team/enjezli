
<?php $__env->startSection('content'); ?>
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<link id="pagestyle" href="<?php echo e(asset('user_dash_assets/css/soft-ui-dashboard.css')); ?>?v=1.0.3" rel="stylesheet" />


<div class="container-fluid py-4 mt-5">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('user_dash_assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class=" avatar-xl position-relative">
                    <img src=<?php echo e(asset("images/".$data->image)); ?> alt="profile_image" class="w-50 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        <?php echo e($data->name); ?>

                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        <?php echo e($data->sal_profile->Job_title); ?>

                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                        <li class="nav-item">
                            <a href="">
                                <span class="ms-1">تقييم</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>document</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(154.000000, 300.000000)">
                                                    <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                                    <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="ms-1">رسالة</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="border-0 ps-0 pb-0 ">

            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0 " href="  <?php echo e($data->sal_profile->facebook); ?>">
                <i class="fab fa-facebook fa-lg "></i>
            </a>
            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0 " href="  <?php echo e($data->sal_profile->tweeter); ?>">
                <i class="fab fa-twitter fa-lg "></i>
            </a>
            <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0 " href="  <?php echo e($data->sal_profile->github); ?>">
                <i class="fab fa-instagram fa-lg "></i>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-xl-4 ">
            <div class="card h-100 ">
                <div class="card-header pb-0 p-3 d-flex align-items-center justify-content-between ">
                    <h6 class="mb-0 ">المهارات</h6>
                </div>
                <div class="card-body p-3 ">
                    <ul class="list-group ">

                        <?php $__empty_1 = true; $__currentLoopData = $data->sal_skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="list-group-item border-0 d-flex  justify-content-between align-items-center mb-1">
                            <h6 class="mb-0 text-sm "><?php echo e($skill->sal_skill_u->title); ?></h6>

                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="list-group-item border-0 d-flex  justify-content-between align-items-center mb-2 ">
                            <h6 class="mb-0 text-sm ">لا يوجد</h6>

                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center justify-content-between">
                            <h6 class=" mb-0 ">المعلومات الشخصية</h6>
                        </div>
                        <div class="col-md-4 text-start ">

                        </div>
                    </div>
                </div>
                <div class="card-body p-3 p">
                    <p class="text-sm ">
                        وصف
                    </p>
                    <p class="text-sm ">

                        <?php echo e($data->sal_profile->description); ?>

                    </p>
                    <hr class="horizontal gray-light my-4 ">
                    <ul class="list-group ">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm "><strong class="text-dark ">الاسم:</strong> &nbsp;<?php echo e($data->name); ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm "><strong class="text-dark ">الجوال:</strong> &nbsp; <?php echo e($data->sal_profile->phone); ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm "><strong class="text-dark ">الايميل:</strong> &nbsp; <?php echo e($data->email); ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm "><strong class="text-dark ">الدولة:</strong> &nbsp; <?php echo e($data->sal_profile->country); ?></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4 ">
            <div class="card h-100 " style="max-height: 100%;
    overflow-y: scroll;">
                <div class="card-header pb-0 p-3 d-flex align-items-center justify-content-between ">
                    <h6 class="mb-0 ">المراجعات <?php echo e($data->sal_review_to->count()); ?> </h6>
                </div>
                <div class="card-body p-3 ">
                    <ul class="list-group ">

                        <?php $__empty_1 = true; $__currentLoopData = $data->sal_review_to; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 ">
                            <div class="d-flex align-items-start flex-column justify-content-center ">
                                <div class="avatar mr-1 mb-1 ">
                                    <img src=<?php echo e(asset("images/".$review->sal_project->sal_created_by->image)); ?> alt="kal " class="border-radius-lg shadow ">
                                </div>
                                <div class="ratings col d-flex">
                                    <?php for($i=0 ;$i<=$review->rate ; $i++): ?>
                                        <i class="fa fa-star rating-color text-primary"></i>
                                        <?php endfor; ?>

                                </div>
                                <h6 class="mb-0 text-sm "><?php echo e($review->sal_project->sal_created_by->name); ?></h6>
                                <p class="mb-0 text-xs "><?php echo e($review->created_at); ?></p>
                                <p class="mb-0 text-xs " style="    word-wrap: break-word;"><?php echo e($review->comment); ?></p>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 ">
                            <h6 class="mb-0 text-sm ">لا يوجد</h6>

                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4 ">
            <div class="card mb-4 ">
                <div class="card-header pb-0 p-3 ">
                    <h6 class="mb-1 ">معرض الاعمال</h6>
                </div>
                <div class="card-body p-3 ">
                    <div class="row ">

                        <?php $__empty_1 = true; $__currentLoopData = $data->sal_works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 ">
                            <div class="card card-blog card-plain ">

                                <div class="position-relative ">
                                    <a class="d-block shadow-xl border-radius-xl ">
                                        <img src=<?php echo e(asset("images/".$work->file)); ?> alt="img-blur-shadow " class="img-fluid shadow border-radius-xl ">
                                    </a>
                                </div>

                                <div class="card-body px-1 pb-0 ">
                                    <a href="/work_data/<?php echo e($work->id); ?> ">
                                        <h5>
                                            <?php echo e($work-> 	title); ?> </p>
                                        </h5>
                                    </a>
                                    <p class="mb-4 text-sm ">
                                        <?php echo e($work->description); ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 ">
                            <h6 class="mb-0 text-sm ">لا يوجد</h6>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\لااله ال الله\مجلد جديد\Enjezli-new\resources\views/website/users/profile/provider_details.blade.php ENDPATH**/ ?>