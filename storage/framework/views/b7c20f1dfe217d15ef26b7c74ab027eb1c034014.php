<?php $__env->startSection('content'); ?>
<style>
    /* complete content  */

    .profile-pic {
        color: transparent;
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        transition: all 0.3s ease;
    }

    .profile-pic input {
        display: none;
    }

    .profile-pic img {
        position: absolute;
        object-fit: cover;
        width: 77px;
        height: 77px;
        box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.35);
        border-radius: 100px;
        z-index: 0;
    }

    .profile-pic .-label {
        cursor: pointer;
        height: 77px;
        width: 77px;
    }

    .profile-pic:hover .-label {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 10000;
        color: #fafafa;
        transition: background-color 0.2s ease-in-out;
        border-radius: 100px;
        margin-bottom: 0;
    }

    .profile-pic span {
        display: inline-flex;
        padding: 0.2em;
        height: 2em;
    }
</style>
<!-- End Navbar -->
<div class="container-fluid ">
<div class="page-header min-height-300 border-radius-xl mt-4" style="min-height: 70px !important;
border-right: 4px solid #5ab1c5;
border-radius: 4px;background-color: white;
padding: 10px 10px;">
   <h6>معرض الاعمال</h6>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                <form action="/works/<?php echo e($data->id); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <div class="col-md-4 text-start d-flex justify-content-end align-items-baseline " style="width: 100%">

                                        <a class="btn btn-link pe-3 ps-0 mb-0  " href="/works/<?php echo e($data->id); ?>/edit">
                                            <i class="fa fa-edit  text_primary"></i>
                                        </a>
                                        <button class="btn btn-link pe-3 ps-0 mb-0  " type="submit">
                                            <i class="fa fa-trash  text_primary"></i>
                                        </button>
                                    </div>
                                </form>
                    <div class="row">
                        <div class="col-lg-6 mb-lg-0 mb-4 ">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold"> تفاصيل العمل</p>
                                <h5 class="font-weight-bolder"><?php echo e($data->title); ?></h5>
                                <p class="mb-5"><?php echo e($data->description); ?></p>
                                <a class="text-dark font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="<?php echo e($data->link); ?>">
                                   رابط العمل
                                    <i class="fas fa-arrow-left text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 me-auto ms-0 text-center">
                            <div class="bg-gradient-primary border-radius-lg min-height-200">
                                <div class="position-relative pt-5 pb-4">
                                    <img class="max-width-500 w-100 position-relative z-index-2" src=<?php echo e(asset('images/'.$data->file)); ?>>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-lg-0 mt-2">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $data->sal_work_attach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-lg-3 mb-lg-0 mb-4 ">
                            <a href="/images/<?php echo e($attach->file_name); ?>">
                            <h6 class="mb-0 text-sm">
                                <?php echo e($attach->file_type); ?>

                                <i class="fas fa-arrow-left text-sm ms-1" aria-hidden="true"></i>
                            </h6>
                            </a>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-lg-12 mb-lg-0 mb-4 ">
                            <h6 class="mb-0 text-sm">
                                لاتوجد ملفات توضيحيه
                            </h6>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.master_dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\laaaaaaaaaaaaaaaaaaast\Enjezli-new\resources\views/website/users/works/show.blade.php ENDPATH**/ ?>